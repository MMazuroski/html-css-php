<?php
    session_start();
    include_once ("conexao.php");

    $iditem = filter_input(INPUT_POST, 'iditem', FILTER_SANITIZE_NUMBER_INT);
    $nomeitem = filter_input(INPUT_POST, 'nomeitem', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);


    /*echo $iditem.'<br>';
    echo $nomeitem.'<br>';
    echo $descricao.'<br>';
    echo $categoria.'<br>';*/

    //$foto = $_FILES['foto']['name'];
    
    /*$_UP['pasta'] = 'fotos/';
    $_UP['tamanho'] = 1024*1024*100;
    $_UP['extensoes'] = array['png', 'jpg', 'jpeg', 'gif'];
    $_UP['renomeia'] = false;

    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
    $_UP['erros'][4] = 'Não foi feito o upload dos arquivos';*/
    
    $result_item = "UPDATE itens SET nomeitem='$nomeitem', descricao='$descricao', categoria='$categoria' WHERE id='$iditem' LIMIT 1";
    $resultado_item = mysqli_query($conn, $result_item);
    
    

    if (empty($nomeitem) || empty($descricao) || empty($categoria)) {
        $_SESSION['msg2'] = "<p style='text-align: center;'>Preencha todos os campos</p>";
        header("Location: alterar_item.php?iditem=$iditem");
    } elseif (mysqli_affected_rows($conn)) {
        $_SESSION['altitem'] = "<p style='text-align: center;'>Item alterado com sucesso!</p>";
        header("Location: dados.php");
    } else {
        $_SESSION['msg2'] = "<p style='text-align: center;'>Falha na alteração</p>";;
        header("Location: alterar_item.php?iditem=$iditem");
    }