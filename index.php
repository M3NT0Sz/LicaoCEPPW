<?php
    error_reporting(0);
    session_start();
    include_once("conexao.php");
    include_once("cep.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PW III</title>
</head>

<body>
    <form action="#" method="post">
        <div class="container">
            <div class="container-dentro">
                <div class="container-letras">
                    <input type="submit" value="Inicio" class="botaoletras" name="Inicio">
                </div>
                <div class="container-letras">
                    <input type="submit" value="Cadastrar" class="botaoletras" name="Cadastrar">
                </div>
            </div>
        </div>
    </form>
    <?php
        if($_POST['Inicio']){
            ?>
    Batata
    <?php
        }else if($_POST['Cadastrar']){
            ?>
    <form action="#" method="post">
        Nome:<input type="text" name="nome">
        Sobrenome:<input type="text" name="sobrenome">
        <input type="submit" value="Continuar" name="Continuar1">
    </form>
    <?php
        }else if($_POST['Continuar1']){
?>
    <form action="#" method="post">
        <h3>Digite o CEP para consultar: </h3>
        <div class="procura">
            <input type="text" class="cep" name="cep" placeholder="Digite um cep">
            <input type="submit" value="Procurar" name="Continuar1">
        </div>
        Rua:<input type="text" name="rua" value="<?php echo $resultado->logradouro;?>">
        Bairro:<input type="text" name="bairro" value="<?php echo $resultado->bairro; ?>">
        Cidade:<input type="text" name="cidade" value="<?php echo $resultado->localidade; ?>">
        Estado:<input type="text" name="estado" value="<?php echo $resultado->uf; ?>">
        <input type="submit" value="Continuar" name="Continuar2">
    </form>
    <?php
        }
    ?>
</body>

</html>