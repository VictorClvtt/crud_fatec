<?php
    include_once("db_config.php");

    // Check if all required fields are set
    if(isset($_POST["nome"], $_POST["ddd"], $_POST["telefone"], $_POST["email"], $_POST["password"])) {
        
        // Prepare data
        $nome = $_POST["nome"];
        $genero = $_POST["genero"];
        $ddd = $_POST["ddd"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];
        $senha = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // Prepare and execute insert query for usuario table
        $stmt_usuario = $conn->prepare("INSERT INTO usuario (nome, genero, email, senha) VALUES (?, ?, ?, ?)");
        $stmt_usuario->bind_param("ssss", $nome, $genero, $email, $senha);
        $stmt_usuario->execute();

        // Get the inserted user id
        $usuario_id = $stmt_usuario->insert_id;
        $stmt_usuario->close();

        // Prepare and execute insert query for telefone table
        $stmt_telefone = $conn->prepare("INSERT INTO telefone (num_ddd, num_tel, usuario_idusuario) VALUES (?, ?, ?)");
        $stmt_telefone->bind_param("ssi", $ddd, $telefone, $usuario_id);
        $stmt_telefone->execute();
        $stmt_telefone->close();

        // Redirect to index.php
        header("Location: index.php");
        exit;
    } else {
        // Handle missing fields
        echo "Missing required fields.";
    }

    // Close connection
    $conn->close();
?>