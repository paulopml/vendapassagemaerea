<?php
session_start();
require_once("./authSession.php");  
include_once("/modelos/cabecalho_bdcompleto.html");
?>

   <div class="container">

      <div class="starter-template">
        <h3 class="sub-header">Dados Pessoais</h3>
      </div>
        
		 <form role="form" method="post" action="./inserirContato.php">
			  <div class="form-group">
				<label for="InputNome">Nome:</label>
				<input type="text" class="form-control" id="InputNome" name="nomeContato" placeholder="Nome Completo" required autofocus>
			  </div>
			  <div class="form-group">
				<label for="InputEmail">E-mail:</label>
				<input type="email" class="form-control" id="InputEmail" name="emailContato" placeholder="e-mail">
			  </div>
			  
			  <div class="form-group">
				<label for="InputTel">Telefone:</label>
				<input type="text" class="form-control" id="InputTel" name="telContato" placeholder="Telefone">
			  </div>
			  
			  
			  <button type="submit" class="btn btn-default">Cadastrar</button>
		 </form>

	 </div>

	  
	  
    </div><!-- /.container -->

<?php
include_once("/modelos/rodape_bdcompleto.html");
?>