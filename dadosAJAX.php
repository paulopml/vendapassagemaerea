<?php
require_once("./authSession.php");
require_once("./conf/confBD.php");

header("Content-Type: application/xml; charset=utf-8");

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
	$resultados = $operacao->fetchAll();
	
	//libera a conexão (dados já foram capturados)
	$conexao=null;
	
	$XMLout = new XMLWriter();
	$XMLout->openMemory();
	$XMLout->startDocument('1.0', 'UTF-8');
	$XMLout->setIndent(true);
	$XMLout->startElement("agenda");
	
	
	foreach($resultados as $contatosEncontrados){		//para cada elemento do vetor de resultados...
		$XMLout->startElement("contato");
			$XMLout->writeElement("nome", ($contatosEncontrados['nomeContato']));
			$XMLout->writeElement("email", ($contatosEncontrados['emailContato']));
			$XMLout->writeElement("telefone", ($contatosEncontrados['telContato']));
		$XMLout->endElement();  //elemento contato
	}
	
	$XMLout->endElement(); //elemento agenda
	
	$XMLout->endDocument();
	echo $XMLout->outputMemory();
?>
