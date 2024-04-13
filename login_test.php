<?php
    session_start();
    include_once("db_config.php");

    if(isset($_POST["email"]) && !empty($_POST["email"]) &&
    isset($_POST["password"]) && !empty($_POST["password"])){

        $email = $_POST["email"];
        $senha = $_POST["password"];
    
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 1){
            $user = $result->fetch_assoc();
            if(password_verify($senha, $user['senha'])){
                session_start();
                $_SESSION["user_id"] = $user['idusuario'];
    
                header("Location: sistema_tarefas.php");
                exit;
            }else{
                $_SESSION["msg"] = "Email ou senha inválidos!";
    
                header("Location: index.php");
                exit;
            }
        }else{
            $_SESSION["msg"] = "Email ou senha inválidos!";
    
            header("Location: index.php");
            exit;
        }
    }else{
        $_SESSION["msg"] = "Por favor, preencha todos os campos.";
    
        header("Location: index.php");
        exit;
    }

    
?>