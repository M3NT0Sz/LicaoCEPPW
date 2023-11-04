<?php
error_reporting(0);
session_start();
include_once("conexao.php");
include_once("cep.php");
if ($_POST['Continuar1']) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
    $_SESSION['usu1'][] = array(
        'nome' => $nome,
        'sobrenome' => $sobrenome,
        'email' => $email,
        'senha' => $senha
    );
    unset($_SESSION['usu2']);
}
if ($_POST['Continuar1']) {
    $cep = $_POST['cep'];
    $find = " ";
    $replace = "";
    $cep = $_POST['cep'];
    $cep = str_replace($find, $replace, $cep);
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
                    <input type="submit" value="Entrar" class="botaoletras" name="Entrar">
                </div>
            </div>
        </div>
    </form>
    <?php
    if ($_POST['Inicio']) {
    ?>
        Batata
    <?php
    } else if ($_POST['Entrar'] || $_SESSION['TudoTudo'] == "Erro") {
        unset($_SESSION['TudoTudo']);
    ?>
        <div class="continuarcont">
            <div class="login">
                <h1>Login</h1>
                <form action="#" method="post">
                    <div class="nomecont1">
                        <h3>Email<input type="email" name="email"></h3>
                    </div>
                    <div class="nomecont1">
                        <h3>Senha<input type="password" name="senha"></h3>
                    </div>
                    <input type="submit" value="Entrar" name="Entrar2" class="btncont1">
                </form>
                <form action="#" method="post">
                    <input type="submit" value="Cadastrar" name="Cadastrar" class="btncont1">
                </form>
            </div>
        </div>
    <?php
    } else if ($_POST['Cadastrar']) {
    ?>
        <form action="#" method="post">
            <div class="continuarcont">
                <div class="continuar1">
                    <h1>Cadastrar</h1>
                    <div class="nomecont2">
                        <div class="nomecont1">
                            <h3>Email<input type="email" name="email" required></h3>
                        </div>
                        <div class="nomecont1">
                            <h3>Nome<input type="text" name="nome" required></h3>
                        </div>
                    </div>
                    <div class="nomecont2">
                        <div class="nomecont1">
                            <h3>Sobrenome<input type="text" name="sobrenome" required></h3>
                        </div>
                        <div class="nomecont1">
                            <h3>Senha<input type="password" name="senha" required></h3>
                        </div>
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
        $email = $_SESSION['usu1'][0]['email'];
        $senha = $_SESSION['usu1'][0]['senha'];
        $cep = $_SESSION['usu2'][0]['cep'];
        $sql = "insert into usuario (usu_nome, usu_sobrenome, usu_cep, usu_rua, usu_bairro, usu_cidade, usu_estado, usu_email, usu_senha) values ('$nome', '$sobrenome', '$cep', '$rua', '$bairro', '$cidade', '$estado', '$email', '$senha')";
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
    } else if ($_POST['Entrar2']) {
        $email = $_POST['email'];
        $senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
        $sql = "SELECT * FROM usuario WHERE usu_email = '$email' and usu_senha = '$senha'";
        $result = mysqli_query($conn, $sql);
        $row_usuario = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['codusu'] = $row_usuario['usu_cod'];
            $_SESSION['TudoTudo'] = "Perfil";
            $_SESSION['Usuario'] = "<center>" . $row_usuario['usu_nome'] . " " . $row_usuario['usu_sobrenome'] . "</center>";
            header("Location: index.php");
        } else {
            $_SESSION['TudoTudo'] = "Erro";
            header("Location: index.php");
        }
    } else if ($_POST['Editar']) {
        $cod = $_SESSION['codusu'];
        $usuar = "SELECT * FROM usuario WHERE usu_cod = '$cod'";
        $usucod = mysqli_query($conn, $usuar);
        while ($row = mysqli_fetch_array($usucod)) {
            $nome = $row['usu_nome'];
            $email = $row['usu_email'];
            $sobrenome = $row['usu_sobrenome'];
        ?>
            <form action="#" method="post">
                <div class="continuarcont">
                    <div class="continuar1">
                        <h1>Editar</h1>
                        <div class="nomecont2">
                            <div class="nomecont1">
                                <h3>Email<input type="email" name="email" value="<?php echo $email; ?>" required></h3>
                            </div>
                            <div class="nomecont1">
                                <h3>Nome<input type="text" name="nome" value="<?php echo $nome; ?>" required></h3>
                            </div>
                        </div>
                        <div class="nomecont2">
                            <div class="nomecont1">
                                <h3>Sobrenome<input type="text" name="sobrenome" value="<?php echo $sobrenome; ?>" required></h3>
                            </div>
                        </div>
                        <input type="submit" value="Continuar" name="Continuar1Edit" class="btncont1">
                    </div>
                </div>
            </form>
        <?php
        }
    } else if ($_POST['Continuar1Edit']) {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $cod = $_SESSION['codusu'];
        $sql = "UPDATE usuario SET usu_nome = '$nome', usu_sobrenome = '$sobrenome', usu_email = '$email' WHERE usu_cod = '$cod'";
        $comando = mysqli_query($conn, $sql);
        $cod = $_SESSION['codusu'];
        $usuar = "SELECT * FROM usuario WHERE usu_cod = '$cod'";
        $usucod = mysqli_query($conn, $usuar);
        while ($row = mysqli_fetch_array($usucod)) {
            $cep = $row['usu_cep'];
            $rua = $row['usu_rua'];
            $bairro = $row['usu_bairro'];
            $cidade = $row['usu_cidade'];
            $estado = $row['usu_estado'];
        ?>
            <div class="continuarcont">
                <div class="continuar2">
                    <form action="#" method="post">
                        <div class="nomecont2">
                            <div class="nomecont1">
                                <h3>CEP<input type="text" class="cep" name="cep" value="<?php echo $cep; ?>" placeholder="Digite um cep"></h3>
                            </div>
                        </div>
                        <div class="nomecont2">
                            <div class="nomecont1">
                                <h3>Rua<input type="text" name="rua" value="<?php echo $rua; ?>" required></h3>
                            </div>
                            <div class="nomecont1">
                                <h3>Bairro<input type="text" name="bairro" value="<?php echo $bairro; ?>" required></h3>
                            </div>
                        </div>
                        <div class="nomecont2">
                            <div class="nomecont1">
                                <h3>Cidade<input type="text" name="cidade" value="<?php echo $cidade; ?>" required></h3>
                            </div>
                            <div class="nomecont1">
                                <h3>Estado<input type="text" name="estado" value="<?php echo $estado; ?>" required></h3>
                            </div>
                        </div>
                        <input type="submit" value="Continuar" name="Continuar2Edit" class="btncont1">
                    </form>
                </div>
            </div>
        <?php
        }
    } else if ($_POST['Continuar2Edit']) {
        $cod = $_SESSION['codusu'];
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $sql = "UPDATE usuario SET usu_cep = '$cep', usu_rua = '$rua', usu_bairro = '$bairro', usu_cidade = '$cidade', usu_estado = '$estado' WHERE usu_cod = '$cod'";
        $comando = mysqli_query($conn, $sql);
        ?>

    <?php
    } else if ($_SESSION['TudoTudo'] == "Perfil") {
        echo $_SESSION['Usuario'];
    ?>
        <form action="#" method="post">
            <input type="submit" value="Editar" name="Editar" class="btncont1">
        </form>
    <?php
    }
    ?>
</body>

</html>