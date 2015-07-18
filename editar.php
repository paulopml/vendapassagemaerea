<?php
session_start();
require_once("./authSession.php");  
require_once("./conf/confBD.php");
include_once("/modelos/cabecalho_bdcompleto.html");
?>
<div class="container">
      <div class="starter-template">
        <h3 class="sub-header">Agenda Pessoal - Editar Contato</h3>    
      </div>
<?php

	// se n�o foram passados 3 par�metros na requisi��o, desvia para a mensagem de erro
	// "previne" acesso direto � p�gina
	if(count($_GET)!=1){
		header("Location:./erroEdicao.php");
		die();
	}        
	
	$nomeUsuario = utf8_encode(htmlspecialchars($_SESSION['nomeUsuario']));
	$nomeContato = utf8_encode(htmlspecialchars($_GET['contato']));
	
	$conexao = conn_mysql();
		

		// instru��o SQL b�sica (sem restri��o de nome)
		$SQLSelect = 'SELECT * FROM contatos WHERE nomeUsuario=? AND nomeContato=?';
		
		//prepara a execu��o da senten�a
		$operacao = $conexao->prepare($SQLSelect);					  
				
		//executa a senten�a SQL com o valor passado por par�metro
		$pesquisar = $operacao->execute(array($nomeUsuario, $nomeContato));
		
		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();
?>
		 <form role="form" method="post" action="./editarContato.php">
			  <div class="form-group">
				<label for="InputNome">Nome:</label>
				<input type="text" class="form-control" id="InputNome" name="nomeContato" required autofocus value="<?php echo utf8_decode($resultados[0]['nomeContato'])?>">
			  </div>
			  <div class="form-group">
				<label for="InputEmail">E-mail:</label>
				<input type="email" class="form-control" id="InputEmail" name="emailContato" value="<?php echo utf8_decode($resultados[0]['emailContato'])?>">
			  </div>
			  
			  <div class="form-group">
				<label for="InputTel">Telefone:</label>
				<input type="text" class="form-control" id="InputTel" name="telContato" value="<?php echo utf8_decode($resultados[0]['telContato'])?>">
			  </div>
			  
			  
			  <button type="submit" class="btn btn-default">Confirmar</button>
		 </form>

	 </div>

	  
	  
    </div><!-- /.container -->

<?php
include_once("/modelos/rodape_bdcompleto.html");
?>