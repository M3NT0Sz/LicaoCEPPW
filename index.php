<?php
error_reporting(0);
session_start();
include_once("conexao.php");
include_once("cep.php");
if ($_POST['Continuar1']) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cep = $_POST['cep'];
    $_SESSION['usu1'][] = array(
        'nome' => $nome,
        'sobrenome' => $sobrenome
    );
}
if ($_POST['Continuar1']) {
    $cep = $_POST['cep'];
    $_SESSION['usu2'][] = array(
        'cep' => $cep
    );
}
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
    if ($_POST['Inicio']) {
    ?>
        Batata
    <?php
    } else if ($_POST['Cadastrar']) {
    ?>
        <form action="#" method="post">
            <div class="continuarcont">
                <div class="continuar1">
                    <h1>Cadastrar</h1>
                    <div class="nomecont1">
                        <h3>Nome<input type="text" name="nome" required></h3>
                    </div>
                    <div class="nomecont1">
                        <h3>Sobrenome<input type="text" name="sobrenome" required></h3>
                    </div>
                    <input type="submit" value="Continuar" name="Continuar1" class="btncont1">
                </div>
            </div>
        </form>
    <?php
    } else if ($_POST['Continuar1']) {
    ?>
        <div class="continuarcont">
            <div class="continuar2">
                <form action="#" method="post">
                    <h3>Digite o CEP para consultar</h3>
                    <div class="nomecont1">
                        <h3><input type="text" class="cep" name="cep" placeholder="Digite um cep"></h3>
                        <input type="submit" value="Procurar" name="Continuar1" class="btncont1">
                    </div>
                </form>
                <form action="#" method="post">
                    <div class="nomecont2">
                        <div class="nomecont1">
                            <h3>Rua<input type="text" name="rua" value="<?php echo $resultado->logradouro; ?>" required></h3>
                        </div>
                        <div class="nomecont1">
                            <h3>Bairro<input type="text" name="bairro" value="<?php echo $resultado->bairro; ?>" required></h3>
                        </div>
                    </div>
                    <div class="nomecont2">
                        <div class="nomecont1">
                            <h3>Cidade<input type="text" name="cidade" value="<?php echo $resultado->localidade; ?>" required></h3>
                        </div>
                        <div class="nomecont1">
                            <h3>Estado<input type="text" name="estado" value="<?php echo $resultado->uf; ?>" required></h3>
                        </div>
                    </div>
                    <input type="submit" value="Continuar" name="Continuar2" class="btncont1">
                </form>
            </div>
        </div>
    <?php
    } else if ($_POST['Continuar2']) {
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $nome = $_SESSION['usu1'][0]['nome'];
        $sobrenome = $_SESSION['usu1'][0]['sobrenome'];
        $cep = $_SESSION['usu2'][0]['cep'];
        $sql = "insert into usuario (usu_nome, usu_sobrenome, usu_cep, usu_rua, usu_bairro, usu_cidade, usu_estado) values ('$nome', '$sobrenome', '$cep', '$rua', '$bairro', '$cidade', '$estado')";
        $comando = mysqli_query($conn, $sql);
        if (mysqli_insert_id($conn)) {
            unset($_SESSION['usu1']);
            unset($_SESSION['usu2']);
            header("Location: index.php");
        } else {
            unset($_SESSION['usu1']);
            unset($_SESSION['usu2']);
            header("Location: index.php");
        }
    }
    ?>
</body>

</html>