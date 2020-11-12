<?php
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:index.php');
    }
    if($_SESSION["tipo"] !="vendedor"){
        header('location:inicio.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Avaliação</title>
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
                <div class='col-md-6'>
                    <div class="card border border-success" style="width: 30rem;">
                        <div class="menu">
                            <h3 class="card-title text-center text-white">     
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"  style="fill: white;">
                                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                            Cadastrar Vendedor
                            </h3>
                        </div>
                        <div class="card-body text-left font-weight-bold">
                            <form name="vendedor" id="cadvendedor" action="cadvendedor.php" method="post">
                                <label >Nome</label> 
                                <input type="text" name="nome" placeholder="Digite o nome do vendedor" maxlength="30" autofocus required="required" class="form-control" />
                                <br/>
                                <label>CPF</label> 
                                <input type="text"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="cpf_pessoa" placeholder="Digite o CPF" maxlength="11" minlength="11"  required="required" class="form-control" />
                                <br/>
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="A">ATIVO</option>
                                    <option value="I">INATIVO</option>
                                </select>
                                <br/>
                                <label>Salario</label> 
                                <input type="text" name="salario" placeholder="Digite o salário" maxlength="30"  required="required" class="form-control" />
                                <br/>
                                <label>Login</label> 
                                <input type="text" name="login" placeholder="Digite o login/username do vendedor" maxlength="30"  required="required" class="form-control" />
                                <br/>
                                <label>Senha</label> 
                                <input type="password" name="senha" placeholder="Digite a senha do cliente" maxlength="30"  required="required" class="form-control" />
                                <br/>
                                <input type="submit" value="Cadastrar" class="btn btn-outline-success" />
                                <div class="input-group mb-3">
                            </form>
                        </div>
                    </div>
                </div>
            </div>


                    <div class='col-md-3'>
                    <div class="card  border border-success justify-content-center" style="width: 35rem;">
                    <div class="menu">
                        <h3 class="card-title text-center text-white">     
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="fill: white;">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                        Procurar Vendedor
                        </h3>
                    </div>
                    <div class="card-body text-left font-weight-bold">
                    <form name="procura" id="procura" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <label>Nome</label> 
                    <input type="text" name="procura" placeholder="Digite um nome ou uma letra" maxlength="30" autofocus class="form-control" />
                    <br/>
                    <input type="submit" value="Procurar" class="btn btn-success" />
                    <hr/>
                    <div>
                        <?php
                            include("conecta.php");
                            echo "<h3>Pesquisar por letra</h3>";
                            $letra = mysqli_query($conn, "SELECT DISTINCT LEFT(nome, 1) AS letra from view_vendedores ORDER BY letra");
                            while($letras = mysqli_fetch_array($letra)){
                                $inicial = strtoupper($letras['letra']);
                                echo '<button style="margin-top: 2%; margin-left: 2%" type="submit" class="btn btn-success" value="'.$inicial.'" name="letra"><b>'.$inicial.'</b></button>';
                            }

                        ?>
                    </div>   
        </div>
        </div>
        <br/>
                </div>
            </div>
        </div>
        <hr class="container"/>
    <div class="container">
        <?php
            if(!isset($_POST['procura']) && !isset($_POST['letra'])){
                echo "<h1>Faça a sua pesquisa!</h1>";
            } else{
                if(isset($_POST['letra'])){
                    $busca2 = trim($_POST['letra']);
                } else {
                    $busca2 = "";
                }
                $busca = trim($_POST['procura']);
                $cases = array($busca, $busca2);
                switch($cases){
                    case($cases[0] !=="" && $cases[1] == ""):
                        $sql = mysqli_query($conn, "SELECT * FROM view_vendedores WHERE nome LIKE '".$busca."%' ORDER BY nome") or die (mysqli_error($conn));
                    break;
                    case($cases[1] !== ""):
                        $sql = mysqli_query($conn, "SELECT * FROM view_vendedores WHERE nome LIKE '".$busca2."%' ORDER BY nome") or die (mysqli_error($conn));
                    break;
                    case($cases[0] =="" && $cases[1] == ""):
                        $sql = mysqli_query($conn, "SELECT * FROM view_vendedores ORDER BY nome") or die (mysqli_error($conn));
                    break;
                }
            echo "<h4>Vendedores Cadastrados</h4>";
            echo "<table class='table table-hover'>";
            echo "<tr>";
                echo "<th>Nome</th>";
                echo "<th>Cpf</th>";
                echo "<th>Status</th>";
                echo "<th>Salario</th>";
                echo "<th>Login</th>";
                echo "<th>Editar</th>";
                echo "<th>Excluir</th>";
            echo "</tr>";
            while($vendedor = mysqli_fetch_array($sql)){
            echo "<tr>";
                $id = $vendedor['idvendedor'];
                echo "<td>".$vendedor['nome']."</td>";
                echo "<td>".$vendedor['cpf']."</td>";
                echo "<td>".$vendedor['status_pessoas']."</td>";
                echo "<td>".$vendedor['salario']."</td>";
                echo "<td>".$vendedor['login']."</td>";
                echo "<td>
                <a href='editavendedor.php?id=$id'><svg width='2em' height='2em' viewBox='0 0 16 16' class='bi bi-pencil-square' fill='currentColor' xmlns='http://www.w3.org/2000/svg' style='fill: #f0db56;'>
                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                </svg></a>
                </td>
                <td>
                <a href='apagavendedor.php?id=$id'><svg width='2em' height='2em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor' xmlns='http://www.w3.org/2000/svg' style='fill:  #f74343;'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                </svg></a>
              </td>";   
            echo "</tr>";
            }
            echo "</table>";
            mysqli_close($conn);
        }
        ?>
        </div>
        </div>  
    </body>


</html>
