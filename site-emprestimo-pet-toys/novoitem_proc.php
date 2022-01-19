<?php
    session_start();
    include_once ("conexao.php");

    $nomeitem = filter_input(INPUT_POST, 'nomeitem', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
    $dono = $_SESSION['usuarioEmail'];
    $contatodono = $_SESSION['usuarioTelefone'];

    $foto = $_FILES['foto']['name'];
    $_UP['pasta'] = 'fotos/';
    /*$_UP['tamanho'] = 1024*1024*100;
    $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
    $_UP['renomeia'] = false;

    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'O arquivo é muito grande';
    $_UP['erros'][2] = 'O upload foi feito parcialmente';
    $_UP['erros'][3] = 'Não foi feito upload do arquivo';*/


    /*
    if($_FILES['foto']['error'] != 0) {
        die("Não foi possível fazer o upload: ".$_UP['erros'][$_FILES['foto']['error']]);
        exit;
    }

    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
	if(array_search($extensao, $_UP['extensoes'])=== false){		
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atp2/index.php'>
		<script type=\"text/javascript\">
			alert(\"A imagem não foi cadastrada, extensão inválida.\");
		</script>";
    }

    else if ($_UP['tamanho'] < $_FILES['foto']['size']){
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atp2/index.php'>
            <script type=\"text/javascript\">
                alert(\"Arquivo muito grande.\");
            </script>
        ";
    }*/

    if(move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'].$foto)) {
        $result_usuario = "INSERT INTO itens (nomeitem, descricao, categoria, foto,  situacao, dono, contatodono) VALUES ('$nomeitem', '$descricao', '$categoria', '$foto', 'Disponivel', '$dono', '$contatodono')";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
    }

    if (empty($nomeitem) || empty($descricao) || empty($categoria)) {
        $_SESSION['msg2'] = "<p style='text-align: center;'>Preencha todos os campos</p>";
        header("Location: novoitem.php");
    } elseif (mysqli_insert_id($conn)) {
        $_SESSION['cadastroitem'] = "<p style='text-align: center;'>Item cadastrado com sucesso!</p>";
 
        header("Location: dados.php");
    } else {
        $_SESSION['msg2'] = "<p style='text-align: center;'>Falha no cadastro</p>";;
        header("Location: novoitem.php");
    }