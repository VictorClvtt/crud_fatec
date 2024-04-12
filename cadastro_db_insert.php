<?php
    session_start();
    include_once("db_config.php");

    if (isset($_POST["nome"]) && !empty($_POST["nome"]) &&
        isset($_POST["genero"]) && !empty($_POST["genero"]) &&
        isset($_POST["ddd"]) && !empty($_POST["ddd"]) &&
        isset($_POST["telefone"]) && !empty($_POST["telefone"]) &&
        isset($_POST["email"]) && !empty($_POST["email"]) &&
        isset($_POST["password"]) && !empty($_POST["password"])) {

        $teste_email = $conn->prepare("SELECT * FROM usuario WHERE email = ?");
        $teste_email->bind_param("s", $_POST["email"]);
        $teste_email->execute();
        $result = $teste_email->get_result();

        if ($result->num_rows == 0) {
            $nome = $_POST["nome"];
            $genero = $_POST["genero"];
            $ddd = $_POST["ddd"];
            $telefone = $_POST["telefone"];
            $email = $_POST["email"];
            $senha = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $stmt_usuario = $conn->prepare("INSERT INTO usuario (nome, genero, email, senha) VALUES (?, ?, ?, ?)");
            $stmt_usuario->bind_param("ssss", $nome, $genero, $email, $senha);
            $stmt_usuario->execute();

            $usuario_id = $stmt_usuario->insert_id;
            $stmt_usuario->close();

            $stmt_telefone = $conn->prepare("INSERT INTO telefone (num_ddd, num_tel, usuario_idusuario) VALUES (?, ?, ?)");
            $stmt_telefone->bind_param("ssi", $ddd, $telefone, $usuario_id);
            $stmt_telefone->execute();
            $stmt_telefone->close();

            header("Location: index.php");
            exit;
        } else {
            $_SESSION["msg"] = "Email já cadastrado!";
            header("Location: cadastro.php");
            exit;
        }
    } else {
        $_SESSION["msg"] = "Por favor, preencha todos os campos.";
        header("Location: cadastro.php");
        exit;
    }

    $conn->close();
?>