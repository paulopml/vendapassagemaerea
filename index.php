<?php

if(isset($_COOKIE['loginAutomatico'])){
   header("Location: ./VerificarLogin.php");
}
else{ 
    if(isset($_COOKIE['loginAgenda']))
		$nomeUser = $_COOKIE['loginAgenda'];
	else
		$nomeUser="";
}
include_once("/modelos/cabecalho_assincrono.html");
?>

    <div class="container">
      <div class="starter-template">
        <div style="width: 500px; margin-right: 32px; margin-left: 10px;">
          <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="activeclass backBlack" style="border-top-left-radius: 6px;"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Voo</a></li>
                <li role="presentation" class="backBlack" style="border-top-right-radius: 7px;"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Hotéis</a></li>
              </ul>

          <!-- Tab panes -->
              <div class="tab-content " id="filter-date">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div id="cidOrigem">
                        <label for="InputCidOrigem" class="col-sm-2 control-label" style=" width: 140px;">Cidade Origem:</label>
                         <select name="nomeCidade" class="form-control" style="width: 200px;" id="InputCidade">
                             <option value="">Seleccione a origem</option>
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
                     <div id="cidDestino">
                        <label for="InputCidDestino" class="col-sm-2 control-label" style=" width: 140px;">Cidade Destino:</label>
                         <select name="nomeCidade" class="form-control" style="width: 200px;" id="InputCidade">
                             <option value="">Seleccione a origem</option>
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
                   <!--      <div id="data">
                         <label for="InputData" class="col-sm-2 control-label" style=" width: 140px;">Data:</label><input type="text" id="calendario" style="
                         margin-right: 184px;"/>
                    </div>-->
                    <button id="buscaVoo" type="button" class="btn btn-sm btn-default" onclick="return reqAgenda(document.getElementById('filtro'))">Buscar</button>
                 </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <div id="cidHotel">
                        <label for="InputCidOrigem" class="col-sm-2 control-label" style=" width: 146px;">Cidade do Hotel:</label>
                         <select name="nomeCidade" class="form-control" style="width: 200px;" id="InputCidade">
                             <option value="">Seleccione a origem</option>
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
     <!--                <div id="dataHotel">
                         <label for="InputData" class="col-sm-2 control-label" style=" width: 140px;">Data:</label><input type="text" id="calendarioHotel" style="
                         margin-right: 172px;"/>
                    </div>-->
                    <button type="button" id="buscaHotel" class="btn btn-sm btn-default" onclick="return reqAgenda(document.getElementById('filtro'))">Buscar</button>
                </div>
              </div>
         </div>
         <br>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="img/cidades/bh.jpg" alt="Chania" >
              </div>

              <div class="item">
                <img src="img/cidades/df.jpg" alt="Chania" >
              </div>

              <div class="item">
                <img src="img/cidades/rio_de_janeiro.jpg" alt="Flower" >
              </div>
              <div class="item">
                <img src="img/cidades/salvador.jpg" alt="Flower" >
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
       </div>
    </div>
    </div><!-- /.container -->

<?php
include_once("/modelos/rodape_login.html");
?>