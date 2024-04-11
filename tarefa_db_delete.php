<?php
    include_once("db_config.php");
    session_start();

    if($_GET["idusuario"] == $_SESSION["user_id"]){
        $delete_tarefa = $conn->prepare("DELETE FROM tarefa WHERE idtarefa = ? AND usuario_idusuario = ?;");
        $delete_tarefa->bind_param("ii", $_GET["idtarefa"], $_GET["idusuario"]);
        $delete_tarefa->execute();

        header("Location: sistema_tarefas.php");
        exit;
    };
?>