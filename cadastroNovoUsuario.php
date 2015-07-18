<?php
require_once("./conf/confBD.php");
include_once("/modelos/cabecalho_assincrono.html");

try
{
	// se não foram passados 4 parâmetros na requisição e não vier da página de cadastro
	//desvia para a mensagem de erro: 	// "previne" acesso direto à página
	$origem = basename($_SERVER['HTTP_REFERER']);
	if((count($_POST)!=4)&&($origem!='cadastroUsuario.php')){
		header("Location:./acessoNegado.php");
		die();
	}
	//se existem os parâmetros...
	else{
		//instancia objeto PDO, conectando-se ao mysql
		$conexao = conn_mysql();
		
		//captura valores do vetor POST
		//utf8_encode para manter consistência da codificação utf8 nas páginas e no banco
		$nome = utf8_encode(htmlspecialchars($_POST['nomeCompleto']));
        $cidade = utf8_encode(htmlspecialchars($_POST['nomeCidade']));
		$login = utf8_encode(htmlspecialchars($_POST['nomeUsuario']));
		$senha = utf8_encode(htmlspecialchars($_POST['passwd']));
		$senhaConf = utf8_encode(htmlspecialchars($_POST['passwd2']));
        $foto = $_FILES['fileName'];
        $caminho_imagem = "";
        $nome_imagem = "";
		if(($senha!=$senhaConf)||(strlen($senha)<4)||(strlen($senha)>8)){
		header("Location:./erroCadastro.php");
		die();
		}
        if (!empty($foto["name"])) {

            // Largura máxima em pixels
            $largura = 150;
            // Altura máxima em pixels
            $altura = 180;
            // Tamanho máximo do arquivo em bytes
            $tamanho = 1000;

            // Pega as dimensões da imagem
            $dimensoes = getimagesize($foto["tmp_name"]);

            // Verifica se a largura da imagem é maior que a largura permitida
            if ($dimensoes[0] > $largura) {
                $error[2] = "A largura da imagem não deve ultrapassar " . $largura . " pixels";
            }

            // Verifica se a altura da imagem é maior que a altura permitida
            if ($dimensoes[1] > $altura) {
                $error[3] = "Altura da imagem não deve ultrapassar " . $altura . " pixels";
            }

            // Verifica se o tamanho da imagem é maior que o tamanho permitido
            if ($foto["size"] > $tamanho) {
                $error[4] = "A imagem deve ter no máximo " . $tamanho . " bytes";
            }
            // Se não houver nenhum erro
            if (count($error) == 0) {

                // Pega extensão da imagem
                preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

                // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

                // Caminho de onde ficará a imagem
                $caminho_imagem = "fotos/" . $nome_imagem;

                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
            }
        }
            // cria instrução SQL parametrizada
		$SQLInsert = 'INSERT INTO clientes (cliente_Email, cliente_Senha, cliente_Cidade, cliente_Nome, cliente_Foto)
			  		  VALUES (?,MD5(?),?,?,?)';

		//prepara a execução
		$operacao = $conexao->prepare($SQLInsert);

		//executa a sentença SQL com os parâmetros passados por um vetor
		$inserir = $operacao->execute(array($login, $senha, $cidade, $nome, $caminho_imagem));

		// fecha a conexão ao banco
		$conexao = null;

		//verifica se o retorno da execução foi verdadeiro ou falso,
		//imprimindo mensagens ao cliente
		if ($inserir){
			 echo "<h1>Cadastro efetuado com sucesso.</h1>\n";
			 echo "<p class=\"lead\"><a href=\"./index.php\">Página principal</a></p>\n";
		}
		else {
			echo "<h1>Erro na operação.</h1>\n";
				$arr = $operacao->errorInfo();		//mensagem de erro retornada pelo SGBD
				$erro = utf8_decode($arr[2]);
				echo "<p>$erro</p>";							//deve ser melhor tratado em um caso real
			    echo "<p><a href=\"./cadastroUsuario.php\">Retornar</a></p>\n";
		}
    }
}
catch (PDOException $e)
{
    // caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}

include_once("/modelos/rodape_login.html");

?>
