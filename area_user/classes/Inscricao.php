<?php

class Inscricao
{
    public $id;
    public $idEvento;
    public $idSimposista;
    public $situacao;
    public $urlQrCode;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT * FROM inscricao WHERE idInscricao = :id";
        $conexao = ConexaoUser::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->idEvento = $linha['idEvento'];
        $this->idSimposista = $linha['idSimposista'];
        $this->situacao = $linha['situacao'];
        $this->urlQrCode = $linha['urlQrCode'];
    }

    public static function listar()
    {
        $query = "SELECT p.id, p.nome, preco, quantidade, categoria_id, c.nome as categoria_nome
                  FROM inscricao p
                  INNER JOIN categorias c ON p.categoria_id = c.id
                  ORDER BY p.nome ";
        $conexao = ConexaoUser::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarPorInscricao($idEvento, $idSimposista)
    {
        $query = "SELECT * FROM inscricao WHERE idEvento = :idEvento AND idSimposista = :idSimposista";
        $conexao = ConexaoUser::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idEvento', $idEvento);
        $stmt->bindValue(':idSimposista', $idSimposista);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function inserir($tipoSimposista)
    {
        $consultaInscricao = self::listarPorInscricao($this->idEvento, $this->idSimposista);

        $campoAtualizar = 'qtdInscritos';
        if($tipoSimposista == 2) {
            $campoAtualizar = 'qtdInscritosExternos';
        }

        if (count($consultaInscricao) == 0) {

            $resultadoInscritos = self::consultaQtdInscritos($this->idEvento);
            $haVagas = self::verificaVagas($resultadoInscritos, $tipoSimposista);

            if ($haVagas) {
                $query = "INSERT INTO inscricao (idEvento, idSimposista, situacao, urlQrCode)
                  VALUES (:idEvento, :idSimposista, :situacao, :urlQrCode)";
                $conexao = ConexaoUser::pegarConexao();
                $stmt = $conexao->prepare($query);
                $stmt->bindValue(':idEvento', $this->idEvento);
                $stmt->bindValue(':idSimposista', $this->idSimposista);
                $stmt->bindValue(':situacao', $this->situacao);
                $stmt->bindValue(':urlQrCode', $this->urlQrCode);
                $stmt->execute();

                $queryUpdate = "UPDATE evento SET $campoAtualizar = $campoAtualizar + 1 WHERE idEvento = :id";
//                $conexao = ConexaoUser::pegarConexao();
                $stmt = $conexao->prepare($queryUpdate);
                $stmt->bindValue(':id', $this->idEvento);
                $stmt->execute();

                return ['status' => 200, 'mensagem' => 'Inscrição foi relizada com sucesso!'];
            } else {
                return ['status' => 400, 'mensagem' => 'Não há vagas disponíveis para esse evento!'];
            }
        } else {

            $resultadoInscritos = self::consultaQtdInscritos($this->idEvento);
            $haVagas = self::verificaVagas($resultadoInscritos, $tipoSimposista);

            if ($haVagas) {
                $this->id = $consultaInscricao[0]["idInscricao"];
                $this->situcao = 1;
                self::atualizar();

                $queryUpdate = "UPDATE evento SET $campoAtualizar = $campoAtualizar + 1 WHERE idEvento = :id";
                $conexao = ConexaoUser::pegarConexao();
                $stmt = $conexao->prepare($queryUpdate);
                $stmt->bindValue(':id', $this->idEvento);
                $stmt->execute();

                return ['status' => 200, 'mensagem' => 'Inscrição foi relizada com sucesso!'];
            } else {
                return ['status' => 400, 'mensagem' => 'Não há vagas disponíveis para esse evento!'];
            }
        }
    }

    public function cancelaInscricao($tipoSimposista)
    {
        $consultaInscricao = self::listarPorInscricao($this->idEvento, $this->idSimposista);
        if (count($consultaInscricao) > 0) {
            $this->id = $consultaInscricao[0]["idInscricao"];
            $this->situcao = 2;
            $query = "UPDATE inscricao SET situacao = :situacao, urlQrCode = :urlQrCode WHERE idInscricao = :id";
            $conexao = ConexaoUser::pegarConexao();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':situacao', $this->situcao);
            $stmt->bindValue(':urlQrCode', $this->urlQrCode);
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();

            $campoAtualizar = 'qtdInscritos';
            if($tipoSimposista == 2) {
                $campoAtualizar = 'qtdInscritosExternos';
            }

            $queryUpdate = "UPDATE evento SET $campoAtualizar = $campoAtualizar - 1 WHERE idEvento = :id";
//            var_dump($queryUpdate, $this->idEvento);exit;
//            $conexao = ConexaoUser::pegarConexao();
            $stmt = $conexao->prepare($queryUpdate);
            $stmt->bindValue(':id', $this->idEvento);
            $stmt->execute();

            return true;
        } else {
            return false;
        }
    }

    public function atualizar()
    {
        self::consultaQtdInscritos($this->idEvento);
        $query = "UPDATE inscricao SET situacao = :situacao, urlQrCode = :urlQrCode WHERE idInscricao = :id";
        $conexao = ConexaoUser::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':situacao', $this->situcao);
        $stmt->bindValue(':urlQrCode', $this->urlQrCode);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM inscricao WHERE idInscricao = :id";
        $conexao = ConexaoUser::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue('id', $this->id);
        $stmt->execute();
    }

    public function consultaQtdInscritos($idEvento)
    {
        $query = "SELECT * FROM evento WHERE idEvento = :id";
        $conexao = ConexaoUser::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue('id', $idEvento);
        $stmt->execute();
        $dadosEvento = $stmt->fetch();

        $resultadoInscritos['qtdInscritos'] = $dadosEvento['qtdInscritos'];
        $resultadoInscritos['qtdTotal'] = $dadosEvento['qtdTotal'];
        $resultadoInscritos['qtdInscritosExternos'] = $dadosEvento['qtdInscritosExternos'];
        $resultadoInscritos['qtdTotalExternos'] = $dadosEvento['qtdTotalExternos'];

        return $resultadoInscritos;
    }

    public function verificaVagas($resultadoInscritos, $tipoSimposista)
    {
        $tipoCadastro = $tipoSimposista;
        $retorno = true;

        if ($tipoCadastro == 1) {
            if (($resultadoInscritos['qtdInscritos'] + 1) > $resultadoInscritos['qtdTotal']) {
                $retorno = false;
            }
        } elseif ($tipoCadastro == 2) {
            if (($resultadoInscritos['qtdInscritosExternos'] + 1) > $resultadoInscritos['qtdTotalExternos']) {
                $retorno = false;
            }
        }

        return $retorno;
    }

    public function retornaInscricao($idEvento, $idSimposista)
    {
        $query = "SELECT * FROM inscricao WHERE idEvento = :idEvento and idSimposista = :idSimposista";
        $conexao = ConexaoUser::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idEvento', $idEvento);
        $stmt->bindValue(':idSimposista', $idSimposista);
        $stmt->execute();
        $inscricao = $stmt->fetch();

        if (is_array($inscricao)) {
            $dadosInscricao['idInscricao'] = $inscricao['idInscricao'];
            $dadosInscricao['idEvento'] = $inscricao['idEvento'];
            $dadosInscricao['idSimposista'] = $inscricao['idSimposista'];
            $dadosInscricao['situacao'] = $inscricao['situacao'];
            $dadosInscricao['urlQrCode'] = $inscricao['urlQrCode'];
        } else {
            $dadosInscricao['idInscricao'] = null;
        }

        return $dadosInscricao;
    }
}