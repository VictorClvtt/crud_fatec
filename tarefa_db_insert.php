<?php
    include_once("db_config.php");
    session_start();

    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $tipo = $_POST["tipo"];
    $prazo = $_POST["prazo"];
    $importancia = $_POST["importancia"];

    $stmt_tarefa = $conn->prepare("INSERT INTO tarefa (titulo, descricao, usuario_idusuario) VALUES (?, ?, ?)");
    $stmt_tarefa->bind_param("sss", $titulo, $descricao, $_SESSION["user_id"]);
    $stmt_tarefa->execute();
?>