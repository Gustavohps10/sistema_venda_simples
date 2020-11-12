<?php
    session_start();
    if($_SESSION["tipo"] !="vendedor"){
        header('location:inicio.php');
    }
    include("conecta.php");
    $idvendedor = $_GET['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf_pessoa'];
    $status = $_POST['status'];
    $salario = $_POST['salario'];
    $senha = base64_encode($_POST['senha']);
    $login = $_POST['login'];


    $result = mysqli_query($conn, "SELECT * FROM view_vendedores  WHERE idvendedor = '$idvendedor'") or die(mysqli_connect_error());
    $cliente = mysqli_fetch_array($result);        
    $fk = $cliente['idpessoas'];

    $sql = "UPDATE pessoas SET nome='$nome', cpf=$cpf, status_pessoas='$status' WHERE idpessoas='$fk'";

    mysqli_query($conn,$sql);


    $sql2 =  "UPDATE vendedores SET salario='$salario', login='$login',  senha='$senha' WHERE idvendedor='$idvendedor'";

    if(mysqli_query($conn, $sql2)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Vendedor atualizado com sucesso!');
        window.location.href = 'vendedor.php';
        </script>";
    }
    else {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Vendedor não foi atualizado com sucesso!');
        window.location.href = 'vendedor.php';
        </script>";
    }
    mysqli_close($conn);
?>