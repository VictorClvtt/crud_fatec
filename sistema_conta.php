<?php
    include_once("db_config.php");
    session_start();

    if(isset($_SESSION["user_id"])){
        $id = $_SESSION["user_id"];

        $stmt = $conn->prepare("SELECT * FROM usuario WHERE idusuario = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $user = $result->fetch_assoc();
    }else{
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Sistema | Conta</title>
</head>
<body class="d-flex flex-column bg-dark-subtle vh-100 vw-100">
    <header class="d-flex align-content-center container-fluid bg-white border-bottom border-primary" style="height: 75px;">
        <a href="sistema_tarefas.php" class="navbar_element_1 h-100 d-flex border-bottom border-4 border-dark-subtle text-decoration-none fs-5 justify-content-center align-items-center align-content-center">Tarefas</a>
        <a href="sistema_conta.php" class="navbar_element_1 h-100 d-flex border-bottom border-4 fw-bold border-primary text-decoration-none fs-5 justify-content-center align-items-center align-content-center">Conta</a>
        <div class="w-100"></div>
        <div class="d-flex w-auto fs-5 col-1 justify-content-center align-items-center align-content-center">
            <div class="d-flex gap-2 justify-content-center align-content-center align-items-center bg-primary-subtle p-2 rounded-2">
                <p class="m-0">Bem vindo</p>
                <a href="" class="text-decoration-none text">
                    <?php echo $user["nome"]?>   
                </a>
                <p class="m-0">:)</p>   
            </div>
        </div>  
    </header>

    <main class="responsive_container_2 px-3 mt-5">
        
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>