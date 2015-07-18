<?php
require_once("./authSession.php");
require_once("./conf/confBD.php");

	$nomeUser = ($_SESSION['nomeUsuario']);

	try{
		$conexao = conn_mysql();
	}catch(PDOException $excep){
	    echo "Erro!: " . $excep->getMessage() . "\n";
		die();
	}

	$SQLSelect = 'SELECT * FROM contatos WHERE nomeUsuario=?';
	
	if(!empty($_POST['filtro'])){
	    $nomeBusca = (htmlspecialchars($_POST['filtro']));
		$nomeBusca = "%".$nomeBusca."%";
		$SQLSelect .= ' AND nomeContato like ?';
	}
		
	//prepara a execução da sentença
	$operacao = $conexao->prepare($SQLSelect);					  
	if(!empty($_POST['filtro'])){				
		//executa a sentença SQL com o valor passado por parâmetro
		$pesquisar = $operacao->execute(array($nomeUser, $nomeBusca));
	}
	else{
		$pesquisar = $operacao->execute(array($nomeUser));
	}
	//captura TODOS os resultados obtidos
	$resultados = $operacao->fetchAll(PDO::FETCH_ASSOC);
	
	//libera a conexão (dados já foram capturados)
	$conexao=null;
	
	$dados_result=array();
	
	foreach($resultados as $vetorInf){
		$dados_decodificados = array();
		foreach($vetorInf as $campo=>$vetorUTF){
			if($campo!="nomeUsuario")
			    $dados_decodificados[$campo]=$vetorUTF;
		}
		array_push($dados_result, $dados_decodificados);
	}
	
	$dados_result = json_encode($dados_result);
	echo $dados_result;
	
?>
