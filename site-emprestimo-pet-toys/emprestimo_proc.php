<?php
    session_start();
    include_once ("conexao.php");

    $dataemp = $_POST['dataemp'];
    $datadev = $_POST['datadev'];


    $id = $_SESSION['emp_id'];
    $emprestadopara = $_SESSION['usuarioEmail'];

    //echo $dataemp.'<br>'.$datadev.'<br>'.$iditem.'<br>'.$emprestadopara;
    
    if (empty($dataemp) || empty($datadev)) {
        $_SESSION['msg3'] = "<p style='text-align: center;'>Determine datas de empréstimo e devolução</p>";
        header("Location: emprestimo.php?id=$id");
    } else {
        $emp_item = "UPDATE `itens` SET `situacao` = 'Emprestado', `emprestadopara` = '$emprestadopara', `dataemp` = '$dataemp', `datadev` = '$datadev' WHERE `itens`.`id` = '$id'";
        $emprestimo_item = mysqli_query($conn, $emp_item);

        if (mysqli_affected_rows($conn)>0) {
            $_SESSION['emprestimoitem'] = "<p style='text-align: center;'>Empréstimo realizado com sucesso!</p>";
            header("Location: dados.php");
        } else {
            $_SESSION['msg3'] = "<p style='text-align: center;'>Falha no empréstimo</p>";
        header("Location: emprestimo.php?id=$id");
        }
    }
    
    
    
    /*
    if (mysqli_insert_id($conn)) {
        $emp_item = "UPDATE `itens` SET `situacao` = 'Emprestado', `emprestadopara` = '$emprestadopara', `dataemp` = '$dataemp', `datadev` = '$datadev' WHERE `itens`.`id` = '$iditem'";
        $emprestimo_item = mysqli_query($conn, $emp_item);
        $_SESSION['emprestimoitem'] = "<p style='text-align: center;'>Empréstimo realizado com sucesso!</p>";
        header("Location: dados.php");
    } else {
        $_SESSION['msg3'] = "<p style='text-align: center;'>Falha no empréstimo</p>";;
        header("Location: emprestimo.php?id=$id");
    }