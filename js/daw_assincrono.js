var objAjax = criarObj();

function criarObj(){
  if(window.XMLHttpRequest){
     var obj = new XMLHttpRequest();
     return obj;
  } 
  else 
	 return false;
}

function buscarDados(dest, objReq, objFonte){
   if(objReq){
     var campo = objFonte.name+"="+objFonte.value;
     objReq.open("POST", dest, true);
	 objReq.setRequestHeader("Content-type","application/x-www-form-urlencoded");
     objReq.send(campo);
   }
   else alert("Objeto de requisição AJAX inválido");
}

function limparResultados(elemento){
  while (elemento.childNodes.length > 0 ){
    elemento.removeChild(elemento.childNodes[0]);
 }
}

function reqAgenda(fonte){
   objAjax.onreadystatechange = atualizarTabela;
   buscarDados("dadosAJAX.php", objAjax, fonte);
   return false;
}

function reqAgendaJSON(fonte){
   objAjax.onreadystatechange = atualizarTabelaJSON;
   buscarDados("dadosJSON.php", objAjax, fonte);
   return false;
}
function atualizarTabela(){
        if(objAjax.readyState==4){
          if(objAjax.status==200){
		     var corpo = document.getElementById("tbCorpo");   
			 limparResultados(corpo);
             processarAgenda(objAjax.responseXML, corpo);
          }
          else alert("Erro na resposta dos dados");
        }
}

function atualizarTabelaJSON(){
        if(objAjax.readyState==4){
          if(objAjax.status==200){
		     var corpo = document.getElementById("tbCorpo");   
			 limparResultados(corpo);
             processarAgendaJSON(objAjax.responseText, corpo);
          }
          else alert("Erro na resposta dos dados");
        }
}

function processarAgenda(objXML, corpoDados){
  
 var contatos = objXML.getElementsByTagName("contato");
 
 var iniLinkApagar = "<a href='./apagarContato.php?contato=";
 var fimLinkApagar = "'><button type=\button\ class=\"btn btn-xs btn-danger\">Apagar</button></a>";
 
 var iniLinkEditar = "<a href='./editar.php?contato=";
 var fimLinkEditar = "'><button type=\button\ class=\"btn btn-xs btn-primary\">Editar</button></a>";
 
 for(var i=0; i<contatos.length; i++){
       var contatoAtual=contatos[i];
       var nomeContato = contatoAtual.getElementsByTagName("nome")[0].firstChild.nodeValue;
	   var emailContato = contatoAtual.getElementsByTagName("email")[0].firstChild.nodeValue;
	   var telContato = contatoAtual.getElementsByTagName("telefone")[0].firstChild.nodeValue;
       
   var linha=corpoDados.insertRow();
   var celula1=linha.insertCell(0);
   var celula2=linha.insertCell(1);
   var celula3=linha.insertCell(2);
   var celula4=linha.insertCell(3);
   celula1.innerHTML=nomeContato;
   celula2.innerHTML=emailContato;
   celula3.innerHTML=telContato;
   celula4.innerHTML=iniLinkApagar+nomeContato+fimLinkApagar+"&nbsp;&nbsp;"+iniLinkEditar+nomeContato+fimLinkEditar;
 }
 
}

function processarAgendaJSON(objDados, corpoDados){
  
 var contatos = eval('(' + objDados + ')');
 var iniLinkApagar = "<a href='./apagarContato.php?contato=";
 var fimLinkApagar = "'><button type=\button\ class=\"btn btn-xs btn-danger\">Apagar</button></a>";
 
 var iniLinkEditar = "<a href='./editar.php?contato=";
 var fimLinkEditar = "'><button type=\button\ class=\"btn btn-xs btn-primary\">Editar</button></a>";
 if(contatos.length>0){
   
   for(i=0; i<contatos.length; i++){
       nomeContato=((contatos[i].nomeContato));        
       emailContato=contatos[i].emailContato;
	   telContato=contatos[i].telContato;
	
		var linha=corpoDados.insertRow();
		var celula1=linha.insertCell(0);
		var celula2=linha.insertCell(1);
		var celula3=linha.insertCell(2);
		var celula4=linha.insertCell(3);
		celula1.innerHTML=nomeContato;
		celula2.innerHTML=emailContato;
		celula3.innerHTML=telContato;
		celula4.innerHTML=iniLinkApagar+nomeContato+fimLinkApagar+"&nbsp;&nbsp;"+iniLinkEditar+nomeContato+fimLinkEditar;
	}
  }
}

