<?php
    require_once("./authSession.php");
    require_once("./conf/confBD.php");
    include_once("/modelos/cabecalho_assincrono.html");
?>
<?
//MONTA O ARRAY DE PRODUTOS
$produto[1][CODIGO] = "1234";
$produto[1][ARTISTA] = "CPM22";
$produto[1][ALBUM] = "Chegou a Hora de Recomeçar";
$produto[1][PRECO] = "25,00";
$produto[1][IMAGEM] = "cpm22.jpg";

$produto[2][CODIGO] = "5678";
$produto[2][ARTISTA] = "Offspring";
$produto[2][ALBUM] = "Splinter";
$produto[2][PRECO] = "28,00";
$produto[2][IMAGEM] = "offspring.jpg";

?>
<html>
<head>
    <title>89º artigo PHP</title>
    <style type="text/css">
        <!–
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
        –>
    </style></head>

<body>
<table width="773" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td><img src="topo.gif" width="773" height="100"></td>
    </tr>
    <tr>
        <td><br>
            <br>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td align=’center’><font face=’Arial’ size=’4′><b>Carrinho de compras utilizando arrays e session</b></font></td>
                </tr>
            </table>
            <br>
            <br>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td><font face=’Arial’ size=’2′>Confira abaixo, os produtos dispon&iacute;veis no site:</font> </td>
                </tr>
            </table>
            <br><br>

            <form action="carrinho.php" method="post" name="frmcarrinho">

                <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <?
                        //PEGA A CHAVE DO ARRAY
                        $chave = array_keys($produto);

                        //EXIBE OS PRODUTOS
                        for($i=0; $i<sizeof($chave); $i++) {
                            $indice = $chave[$i];
                            $codigo = $produto[$indice][CODIGO];
                            $artista = $produto[$indice][ARTISTA];
                            $album = $produto[$indice][ALBUM];
                            $preco = $produto[$indice][PRECO];
                            $imagem = $produto[$indice][IMAGEM];
                            ?>

                            <td width="14%"><img src="<? echo $imagem; ?>" width="80" height="80" border="1"></td>
                            <td width="36%">
                                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td><font face=’Arial’ size=’2′><? echo $artista; ?></font></td>
                                    </tr>

                                    <tr>
                                        <td><font face=’Arial’ size=’2′><? echo $album; ?></font></td>
                                    </tr>

                                    <tr>
                                        <td><font face=’Arial’ size=’2′>R$ <? echo $preco; ?></font></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="hidden" name="txtprod[<? echo $indice;?>][CODIGO]" value="<? echo $codigo; ?>">
                                            <input type="hidden" name="txtprod[<? echo $indice;?>][ARTISTA]" value="<? echo $artista; ?>">
                                            <input type="hidden" name="txtprod[<? echo $indice;?>][ALBUM]" value="<? echo $album; ?>">
                                            <input type="hidden" name="txtprod[<? echo $indice;?>][PRECO]" value="<? echo $preco; ?>">
                                            <input type="text" name="txtprod[<? echo $indice;?>][QTDE]" size="2" maxlength="2">
                                            <input type="image" src="carrinho.gif" onClick="javascript: document.forms[0].submit();"></td>
                                    </tr>
                                </table></td>
                        <?
                        }//FEHA FOR ?>
                    </tr>
                </table>
            </form>
            <br></td>
    </tr>
    <tr>
        <td><img src="rodape.gif" width="773" height="20"></td>
    </tr>
</table>
</body>
</html>