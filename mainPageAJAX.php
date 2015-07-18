<?php
require_once("./authSession.php");
require_once("./conf/confBD.php");
include_once("/modelos/cabecalho_assincrono.html");
?>

    <div class="container">

      <div class="starter-template">
        <h3 class="sub-header">Agenda Pessoal - <?PHP echo ($_SESSION['nomeCompleto']);?></h3>    
      </div>
	  
	   <form class="navbar-form " role="form">
            <div class="form-group">
              Filtrar: <input type="text" placeholder="Nome" name="filtro" id ="filtro" class="form-control">
            </div>
            
            <button type="button" class="btn btn-sm btn-default" onclick="return reqAgenda(document.getElementById('filtro'))">Buscar</button>
	   </form>
	  
		<table class="table table-striped">	
		<thead><tr><th>Nome</th><th>e-mail</th><th>Telefone</th><th><a href="./inserir.php"> <button type="button" class="btn btn-xs btn-success">Novo</button></a></th></tr></thead>
		<tbody id="tbCorpo"> </tbody>
		
		</table>
	  
    </div><!-- /.container -->

<?php
include_once("/modelos/rodape_bdcompleto.html");
?>