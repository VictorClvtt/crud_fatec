<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Criar conta</title>
</head>
<body class="d-flex align-items-center justify-content-between bg-dark-subtle vh-100 vw-100 px-3">
    <form action="cadastro_db_insert.php" method="POST" class="d-flex flex-column border border-primary rounded-4 p-3 bg-light responsive_container_1">
        <h1 class="fs-3 border-bottom border-primary pb-1">Criar conta:</h1>
        <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label mb-1">Nome:</label>
            <input name="nome" type="text" class="form-control border border-primary" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-2">
            <label for="genero" class="form-label mb-1">Gênero:</label>
            <select name="genero" class="form-select border border-primary">
                <option selected value="Não informado">Não informar</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select> 
        </div>
        <div class="mb-2">
            <label for="" class="form-label mb-1">Telefone:</label>
            <div class="d-flex gap-2">
                <input name="ddd" placeholder="(DDD)" type="text" class="d-flex align-items-center justify-content-between form-control border border-primary" style="width: 72px;" id="exampleInputEmail1" aria-describedby="emailHelp">
                <input name="telefone" type="text" class="form-control border border-primary w-100" id="exampleInputEmail1" aria-describedby="emailHelp">    
            </div>
        </div>
        <div class="mb-2">
            <label for="email" class="form-label mb-1">Email:</label>
            <input name="email" type="email" class="form-control border border-primary" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-2">
            <label for="password" class="form-label mb-1">Senha:</label>
            <input name="password" type="password" class="form-control border border-primary" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary m-auto mt-1 container-fluid">Criar conta</button>
        <div id="emailHelp" class="d-flex form-text gap-1">Já tem uma conta? <a href="index.php" class="text-primary fw-bold m-0">Faça login</a></div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>