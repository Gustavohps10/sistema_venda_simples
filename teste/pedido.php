<?php 
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:index.php');
    }

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>AVALIAÇÃO</title>
        <meta charset = "UTF-8"/>
        <link rel="shortcut icon" href="imagens/icomush.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="estilo2.css"/>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php
        include("menu.php");
    ?>
    <div class="container">
        <div class='row justify-content-left'>
            <?php
                    include("conecta.php");
                    echo "<h4>Pedidos</h4>";
                    echo "<table class='table table-hover'>";
                    echo "<tr>";
                        echo "<th>N° do Pedido</th>";
                        echo "<th>Data</th>";
                        echo "<th>Valor</th>";
                        echo "<th>Status</th>";
                        echo "<th>APROVAR PEDIDO</th>";
                    echo "</tr>";
                    if($_SESSION["tipo"]=="cliente"){
                        $sql = mysqli_query($conn, "SELECT * FROM pedidos where fk_idcliente=$id") or die (mysqli_error($conn));
                        while($pedido = mysqli_fetch_array($sql)){
                            echo "<tr>";
                                $id = $pedido['idpedidos'];
                                echo "<td>".$pedido['idpedidos']."</td>";
                                echo "<td>".date('d/m/Y', strtotime($pedido['data_pedido']))."</td>";
                                echo "<td>".$pedido['valor']."</td>";
                                if($pedido['status_pedido'] == "A"){
                                    echo "<td>Em Espera</td>";
                                }
                                else{
                                    if($pedido['status_pedido'] == "I"){
                                        echo "<td>Aprovado</td>";
                                    }
                                }
                                echo "<td>
                                <a href='apagapedido.php?id=$id'><svg width='2em' height='2em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor' xmlns='http://www.w3.org/2000/svg' style='fill: #f74343;'>
                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                </svg></a>
                            </td>";  
                            echo "</tr>";
                            }
                            echo "</table>";
                    }
                    else{
                        if($_SESSION["tipo"] =="vendedor"){
                            $sql = mysqli_query($conn, "SELECT * FROM pedidos where status_pedido='A'") or die (mysqli_error($conn));
                            while($pedido = mysqli_fetch_array($sql)){
                                echo "<tr>";
                                    $idpedido = $pedido['idpedidos'];
                                    echo "<td>".$pedido['idpedidos']."</td>";
                                    echo "<td>".date('d/m/Y', strtotime($pedido['data_pedido']))."</td>";
                                    echo "<td>".$pedido['valor']."</td>";
                                    echo "<td>".$pedido['status_pedido']."</td>";
                                    echo "<td>
                                    <a href='aceitapedido.php?idpedido=$idpedido&idvendedor=$id'  style='color: #63ff47 ; text-decoration:none;'>Aprovar<svg width='2em' height='2em' viewBox='0 0 16 16' class='bi bi-check2-square' fill='currentColor' xmlns='http://www.w3.org/2000/svg' style='fill: #63ff47;'>
                                    <path fill-rule='evenodd' d='M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z'/>
                                    <path fill-rule='evenodd' d='M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z'/>
                                  </svg></a>
                                </td>";  
                                echo "</tr>";
                                }
                                echo "</table>";
                        }
                        else{
                            header('location:inicio.php');
                        }
                    }

                    mysqli_close($conn);
                ?>
        </div>
    </div>