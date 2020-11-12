<?php

    //Iniciar uma sessão
    session_start();
    include("conecta.php");
    $login = $_POST['username'];
    $senha = base64_encode($_POST['senha']);
    $logar = mysqli_query($conn, "SELECT * FROM view_clientes WHERE login = '$login' AND senha = '$senha'") or die(mysqli_connect_error());
    $logar2 = mysqli_query($conn, "SELECT * FROM view_vendedores WHERE login = '$login' AND senha = '$senha'") or die(mysqli_connect_error());
    if(mysqli_num_rows($logar)>0){
        $cliente = mysqli_fetch_array($logar);
        $_SESSION["user"] = $cliente['nome'];
        $_SESSION["status"] = "OK";
        $_SESSION["tipo"] = "cliente";
        $_SESSION["id"] = $cliente['idcliente'];
        echo "<script type='text/javascript'>
        location.href='inicio.php';
        </script>";
    }
    else{
        if(mysqli_num_rows($logar2)>0){
        $vendedor = mysqli_fetch_array($logar2);
        $_SESSION["user"] = $vendedor['nome'];
        $_SESSION["status"] = "OK";
        $_SESSION["tipo"] = "vendedor";
        $_SESSION["id"] = $vendedor['idvendedor'];
        echo "<script type='text/javascript'>
        location.href='inicio.php';
        </script>";
        }
        else {
        echo "<script type='text/javascript'>
        alert('Login ou senha incorretos! Tente novamente!');
        location.href='form_login.php';
        </script>";
        }
    }
    mysqli_close($conn);
?>