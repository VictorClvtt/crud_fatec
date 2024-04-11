<?php
    include_once("db_config.php");
    session_start();

    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $tipo = $_POST["tipo"];
    $prazo = $_POST["prazo"];
    $importancia = $_POST["importancia"];
    $idtarefa = $_POST["idtarefa"];

    $stmt_tarefa = $conn->prepare("UPDATE tarefa SET titulo=?, descricao=?, tipo=?, prazo=?, importancia=? WHERE idtarefa=?");
    $stmt_tarefa->bind_param("sssssi", $titulo, $descricao, $tipo, $prazo, $importancia, $_POST["idtarefa"]);
    $stmt_tarefa->execute();

    header("Location: sistema_tarefas.php");
    exit;
?>