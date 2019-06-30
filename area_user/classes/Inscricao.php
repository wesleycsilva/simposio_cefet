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

    public function inserir()
    {
        $consultaInscricao = self::listarPorInscricao($this->idEvento, $this->idSimposista);
        if (count($consultaInscricao) == 0) {
            $query = "INSERT INTO inscricao (idEvento, idSimposista, situacao, urlQrCode)
                  VALUES (:idEvento, :idSimposista, :situacao, :urlQrCode)";
            $conexao = ConexaoUser::pegarConexao();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':idEvento', $this->idEvento);
            $stmt->bindValue(':idSimposista', $this->idSimposista);
            $stmt->bindValue(':situacao', $this->situacao);
            $stmt->bindValue(':urlQrCode', $this->urlQrCode);
            $stmt->execute();
            return true;
        } else {
            $this->id = $consultaInscricao[0]["idInscricao"];
            $this->situcao = 1;
            self::atualizar();
            return false;
        }
    }

    public function cancelaInscricao()
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
            return true;
        } else {
            return false;
        }
    }

    public function atualizar()
    {
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
}