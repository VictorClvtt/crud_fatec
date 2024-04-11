<?php
    include_once("db_config.php");
    session_start();

    $delete_tarefas = $conn->prepare("DELETE FROM tarefa WHERE usuario_idusuario = ?;");
    $delete_tarefas->bind_param("i", $_SESSION["user_id"]);
    $delete_tarefas->execute();

    $delete_telefone = $conn->prepare("DELETE FROM telefone WHERE usuario_idusuario = ?;");
    $delete_telefone->bind_param("i", $_SESSION["user_id"]);
    $delete_telefone->execute();

    $delete_usuario = $conn->prepare("DELETE FROM usuario WHERE idusuario = ?;");
    $delete_usuario->bind_param("i", $_SESSION["user_id"]);
    $delete_usuario->execute();

    header("Location: index.php");
    exit;
?>