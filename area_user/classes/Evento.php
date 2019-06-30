<?php


class Evento
{
    public $id;
    public $idSimposio;
    public $titulo;
    public $descricao;
    public $data;
    public $informacoes;
    public $local;
    public $qtdInscritos;
    public $qtdTotal;
    public $dataHoraInicio;
    public $dataHoraFinal;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public static function listar()
    {
        $query = "SELECT * FROM evento ORDER BY idEvento ASC";
        $conexao = ConexaoUser::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        $query = "SELECT * FROM evento WHERE idEvento = :id";
        $conexao = ConexaoUser::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->id = $linha['idEvento'];
        $this->idSimposio = $linha['idSimposio'];
        $this->titulo = $linha['titulo'];
        $this->descricao = $linha['descricao'];
        $this->data = $linha['data'];
        $this->informacoes = $linha['informacoes'];
        $this->local = $linha['local'];
        $this->qtdInscritos = $linha['qtdInscritos'];
        $this->qtdTotal = $linha['qtdTotal'];
        $this->dataHoraInicio = $linha['dataHoraInicio'];;
        $this->dataHoraFinal = $linha['$dataHoraFinal'];
    }
}