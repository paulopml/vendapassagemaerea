<?php
include_once("/modelos/cabecalho_assincrono.html");
?>

    <div class="container">

      <div>
		 <form role="form" method="post" action="./cadastroNovoUsuario.php" enctype="multipart/form-data" class="form-signin">
		 <h3 class="form-signin-heading"><br> Cadastro de Usuário</h3>
			  <div class="form-group">
				<label for="InputNome">Nome Completo:</label>
				<input type="text" class="form-control" id="InputNome" name="nomeCompleto" placeholder="Nome completo" required autofocus>
			  </div>
             <div class="form-group">
                 <label for="InputNome">Cidade:</label>
                 <select name="nomeCidade" class="form-control" id="InputCidade">
                     <option value="">Seleccione a cidade</option>
                     <option value="1">Belém</option>
                     <option value="2">Belo Horizonte</option>
                     <option value="3">Brasília</option>
                     <option value="4">Fortaleza</option>
                     <option value="5">Porto Alegre</option>
                     <option value="6">Recife</option>
                     <option value="7">Rio de Janeiro</option>
                     <option value="8">Salvador</option>
                     <option value="9">São Paulo</option>
                 </select>
             </div>
			  <div class="form-group">
			  <label for="InputLogin">Email para login:</label>
				<input type="text" class="form-control" id="InputLogin" name="nomeUsuario" placeholder="Login desejado" required>
			  </div>
			  <div class="form-group">
				<label for="InputSenha">Senha:</label>
				<input type="password" class="form-control" id="InputSenha" name="passwd" placeholder="Senha (4 a 8 caracteres)">
			  </div>
			  <div class="form-group">
				<label for="InputSenhaConf">Confirmação de Senha:</label>
				<input type="password" class="form-control" id="InputSenhaConf" name="passwd2" placeholder="Confirme a senha">
			  </div>
             <div class="form-group">
                 <input type="hidden" name="MAX_FILE_SIZE" value="200000" >
                 <label for="fileName">Escolha um arquivo: </label>
                 <input type="file" name="fileName" id="fileName" placeholder="Escolha um arquivo">
             </div>

			  <button type="submit" class="btn btn-primary">Cadastrar</button>
		 </form>

	 </div>

	  
	  
    </div><!-- /.container -->

<?php
include_once("/modelos/rodape_bdsimples.html");
?>