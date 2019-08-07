<?php 
require_once 'global.php';
require_once("area_user/classes/Inscricao.php");
$inscricao = new Inscricao();

try 
{
	$idEvento = $_GET['idEvento'];
	$idSimposista = $_GET['idSimposista'];
	$idInscricao = $_GET['idInscricao'];
	$situacao = $_GET['situacao'];
	// 1 = Cadastrado 2 = Cancelado 3 = Presente 4 = Ausente 5 = Inativo

	switch ($situacao) {
		case '1':
			$inscricao->idEvento = $idEvento;
		    $inscricao->idSimposista = $idSimposista;
		    $inscricao->situacao = 3;
		    $inscricao->urlQrCode = null;
			
			$retorno = $inscricao->confirmaSituacao($idInscricao, $idEvento, $idSimposista, $situacao, $urlQrCode));

			if ($retorno['status'] == 200) 
			{
	        	echo $retorno['status'];
	    	} else 
	    	{
	    		echo "Erro na atualização da inscrição";
	    	}
			break;

		case '2':
			echo "Usuário CANCELADO";
			break;
		case '3':
			echo "Usuário PRESENTE, não podendo ser mais cadastrado no sistema";
			break;
		case '4':
			echo "Usuário AUSENTE";
			break;
		case '5':
			echo "Usuário INATIVO";
			break;

	}	
	
} catch (Exception $e) {
    Erro::trataErro($e);
}

?>