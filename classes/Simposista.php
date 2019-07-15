<?php

class Simposista
{
    private $pdo;
    public $msgErro = "";
    public $id;
    public $nome;
    public $matricula;
    public $email;
    public $dataNascimento;
    public $cpf;
    public $rg;
    public $telefone;
    public $senha;
    public $instituicao;
    public $cidade;
    public $tipoSimposista;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
            //$this->setar();
        }
    }

    public function carregar()
    {
        $query = "SELECT nome, matricula, email, dataNascimento, cpf, rg, telefone, senha, instituicao, cidade, tipoSimposista FROM simposista WHERE id = :id";
        $conexao = ConexaoUser::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->nome = $linha['nome'];
        $this->matricula = $linha['matricula'];
        $this->email = $linha['email'];
        $this->dataNascimento = $linha['dataNascimento'];
        $this->cpf = $linha['cpf'];
        $this->rg = $linha['rg'];
        $this->telefone = $linha['telefone'];
        $this->senha = $linha['senha'];
        $this->instituicao = $linha['instituicao'];
        $this->cidade = $linha['cidade'];
        $this->tipoSimposista = $linha['tipoSimposista'];
    }

    public static function listar()
    {
        $query = "SELECT * FROM simposista ORDER BY nome";
        $conexao = ConexaoUser::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarPorSimposista($simposista_id)
    {
        $query = "SELECT id, nome, matricula, email, dataNascimento, cpf, rg, telefone, senha, instituicao, cidade, tipoSimposista FROM simposista WHERE simposista_id = :simposista_id";
        $conexao = ConexaoUser::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':simposista_id', $simposista_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function verificarCpf($cpf)
    {
        $query = "SELECT idSimposista FROM simposista WHERE cpf = :cpf";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function verificarMatricula($matricula)
    {
        $query = "SELECT idSimposista FROM simposista WHERE matricula = :matricula";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':matricula', $matricula);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function inserir()
    {
        $verificaMatricula = self::verificarMatricula($this->matricula);

        if ($this->tipoSimposista == 1) {
            if (!$verificaMatricula) {
                return ['status' => '400', 'mensagem' => 'Matrícula já cadastrada no sistema!'];
            }
        }

        $verificaCpf = self::verificarCpf($this->cpf);

        if (!$verificaCpf) {
            return ['status' => '400', 'mensagem' => 'CPF já cadastrado no sistema!'];
        }

        $query = "INSERT INTO simposista (nome, matricula, email, dataNascimento, cpf, rg, telefone, senha, instituicao, cidade, tipoSimposista)
                VALUES (:nome, :matricula, :email, :dataNascimento, :cpf, :rg, :telefone, :senha, :instituicao, :cidade, :tipoSimposista)";
        try {
            $conexao = Conexao::pegarConexao();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':nome', $this->nome);
            $stmt->bindValue(':matricula', $this->matricula);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':dataNascimento', $this->dataNascimento);
            $stmt->bindValue(':cpf', $this->cpf);
            $stmt->bindValue(':rg', $this->rg);
            $stmt->bindValue(':telefone', $this->telefone);
            $stmt->bindValue(':senha', sha1($this->senha));
            $stmt->bindValue(':instituicao', $this->instituicao);
            $stmt->bindValue(':cidade', $this->cidade);
            $stmt->bindValue(':tipoSimposista', $this->tipoSimposista);
            $stmt->execute();

            return ['status' => '200', 'mensagem' => 'Matrícula realizada com sucesso!'];
        } catch (Exception $e) {
            return ['status' => '400', 'mensagem' => 'Matrícula já cadastrada no sistema!'];
        }
    }

    public function atualizar($id)
    {
        $query = "UPDATE simposista SET nome = :nome, matricula = :matricula, email = :email, dataNascimento = :dataNascimento, cpf = :cpf, rg = :rg, telefone = :telefone, senha = :senha, instituicao = :instituicao, cidade = :cidade, tipoSimposista = :tipoSimposista WHERE idSimposista = :id";
        $conexao = ConexaoUser::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':matricula', $this->matricula);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':dataNascimento', $this->dataNascimento);
        $stmt->bindValue(':cpf', $this->cpf);
        $stmt->bindValue(':rg', $this->rg);
        $stmt->bindValue(':telefone', $this->telefone);
        $stmt->bindValue(':senha', sha1($this->senha));
        $stmt->bindValue(':instituicao', $this->instituicao);
        $stmt->bindValue(':cidade', $this->cidade);
        $stmt->bindValue(':tipoSimposista', $this->tipoSimposista);
        $stmt->execute();
        return $stmt;
    }

    public function excluir()
    {
        $query = "DELETE FROM simposista WHERE idSimposista = :id";
        $conexao = ConexaoUser::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue('id', $this->id);
        $stmt->execute();
        return $stmt;
    }

    public function logar($email, $senha)
    {
        //verificar se o email e senha estão cadastrado
        $query = "SELECT * FROM simposista WHERE email = :e AND senha = :s";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", sha1($senha));
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            //entrar no sistema(sessão)
            $dados = $stmt->fetch();

            session_start();
            $_SESSION['idSimposista'] = $dados['idSimposista'];
            $_SESSION['email'] = $dados['email'];
            $_SESSION['nome'] = $dados['nome'];
            $_SESSION['controle'] = $dados['senha'];
            $_SESSION['tipoSimposista'] = $dados['tipoSimposista'];

            return true;
        } else {
            return false;
        }
    }

    public function lembrarSenha($email)
    {
        //verificar se o email está cadastrado
        $query = "SELECT idSimposista FROM simposista WHERE email = :e";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":e", $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            $newPassword = Funcao::generatePassword(8);

            $query = "UPDATE simposista SET senha = :senha WHERE idSimposista = :id";
            $conexao = ConexaoUser::pegarConexao();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':senha', sha1($newPassword));
            $stmt->execute();
            $dadosRetorno = [
                'newPassword' => $newPassword,
                'retorno' => true
            ];
        } else {
            $dadosRetorno = [
                'retorno' => false
            ];
        }
        return $dadosRetorno;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function setRg($rg)
    {
        $this->rg = $rg;
        return $this;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = md5($senha);
        return $this;
    }
}