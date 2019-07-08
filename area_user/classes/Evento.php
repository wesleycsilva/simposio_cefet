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
//        $query = "SELECT ev.idEvento AS idEvento, ev.idSimposio AS idSimposio, ev.titulo AS titulo,
//                    ev.descricao AS descricao, ev.data AS data, ev.informacoes AS informacoes, ev.local AS local,
//                    ev.qtdInscritos AS qtdInscritos, ev.qtdTotal AS qtdTotal, ev.dataHoraInicio AS dataHoraInicio,
//                    ev.dataHoraFinal AS dataHoraFinal, ins.idInscricao AS idInscricao, ins.situacao AS situacao
//                FROM
//                    simposio.evento ev
//                        LEFT JOIN
//                    simposio.inscricao ins ON (ev.idEvento = ins.idEvento
//                        AND ins.idSimposista = 1)
//                ORDER BY ev.idEvento ASC";

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