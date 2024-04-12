<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Logar</title>
</head>
<body class="d-flex align-items-center justify-content-between bg-dark-subtle vh-100 vw-100 px-3">
    <form action="login_test.php" method="POST" style="transition: height 0.3s ease-in-out;" class="d-flex flex-column border border-primary rounded-4 p-3 bg-light responsive_container_1">
        <h1 class="fs-3 border-bottom border-primary pb-1">Logar na sua conta:</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email:</label>
            <input name="email" type="email" class="form-control border border-primary" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Senha:</label>
            <input name="password" type="password" class="form-control border border-primary" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary m-auto container-fluid">Login</button>
        
        <?php
            session_start();

            if(isset($_SESSION["msg"])){
                echo "<p class='m-0 mx-auto text-danger fw-bold fs-5' style='padding-top: 1rem; padding-bottom: 0.5rem; height: 54px;' id='msg'>" . $_SESSION["msg"] . "</p>";
                unset($_SESSION["msg"]);    
            }
            
        ?>

        <div id="emailHelp" class="d-flex form-text gap-1">Ainda não tem uma conta? <a href="cadastro.php" class="text-primary fw-bold m-0">Cadastre-se</a></div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/index_script.js"></script>
</body>
</html>