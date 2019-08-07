<?php 
require_once 'global.php';
require_once("area_user/classes/Inscricao.php");
$inscricao = new Inscricao();

require_once("area_user/classes/Evento.php");
$evento = new Evento();

require_once("area_user/classes/SimposistaUser.php");
$simposista = new SimposistaUser();

try {
	$idEventoQr = $_GET['idEvento'];
	$idSimposistaQr = $_GET['idSimposista'];
	$idInscricaoQr = $_GET['idInscricao'];

    $verificarinscricao = $inscricao->consultaInscricao($idInscricaoQr);

    if ($verificarinscricao == true)	 //array do DB
	{	

		echo " Usuário Inscrito! <br>";
		
		$dadosinscricao = $inscricao->pesquisarInscricao($idInscricaoQr);
		print_r($dadosinscricao);
		echo "<br>";
		
		$idinscricao =  $dadosinscricao['idInscricao'];		
		echo "<br> Inscrição : $idinscricao <br>";

		$idevento =  $dadosinscricao['idEvento'];
		$eventolista = $evento->pesquisarEvento($idevento);
		echo "<br> Evento : <br>";
		print_r($eventolista);
		echo "<br>";

		$idsimposista =  $dadosinscricao['idSimposista'];
		$simposistalista = $simposista->pesquisarSimposista($idsimposista);
		echo "<br> Simposista : <br>";
		print_r($simposistalista);
		echo "<br>";

		$situacao = $dadosinscricao['situacao'];
		echo "<br> Situação : $situacao <br>";
		// 1 = Cadastrado 2 = Cancelado 3 = Presente 4 = Ausente 5 = Inativo 

	} else 
	{
		echo "Usuário não inscrito! <br> ";
	}

} catch (Exception $e) {
    Erro::trataErro($e);
}

?>