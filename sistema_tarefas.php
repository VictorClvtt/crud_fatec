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
    <title>Sistema | Tarefas</title>
</head>
<body class="d-flex flex-column bg-dark-subtle vh-100 vw-100">
    <header class="d-flex align-content-center container-fluid bg-white border-bottom border-primary" style="height: 75px;">
        <a href="sistema_tarefas.php" class="navbar_element_1 h-100 d-flex border-bottom border-4 fw-bold border-primary text-decoration-none fs-5 justify-content-center align-items-center align-content-center">Tarefas</a>
        <a href="sistema_conta.php" class="navbar_element_1 h-100 d-flex border-bottom border-4 border-dark-subtle text-decoration-none fs-5 justify-content-center align-items-center align-content-center">Conta</a>
        <div class="w-100"></div>
        <div class="d-flex w-auto fs-5 justify-content-center align-items-center align-content-center">
            <div class="d-flex justify-content-center align-content-center align-items-center border border-dark-subtle bg-primary-subtle rounded rounded-2">
                <p class="text-nowrap m-0 ps-3">
                    <?php
                        if($user["genero"] == "Masculino"){
                            echo "Bem vindo";
                        }elseif($user["genero"] == "Feminino"){
                            echo "Bem vinda";
                        }else{
                            echo "Olá";
                        }
                    ?>
                </p>
                <p class="text-decoration-none text-info-emphasis my-0 mx-2">
                    <?php echo $user["nome"]?>   
                </p>
                <p class="m-0 pe-3">:)</p>    
                
                <a href="logout.php" title="Sair" class="d-flex border-start border-dark-subtle bg-primary-subtle rounded-start-0 rounded-end rounded-2 p-2"><img src="exit-svgrepo-com.svg" alt="Sair" style="height: 27px;"></a>
            </div>
            
        </div>  
    </header>

    <main class="responsive_container_2 px-3 mt-5">
        <div class="d-flex gap-2 pb-1 align-items-center border-bottom border-dark-subtle">
            <h1 class="fs-2 m-0">Suas Tarefas</h1>
            <button type="button" data-bs-toggle="modal" data-bs-target="#inserirTarefa" class="btn btn-primary rounded-5 py-1 px-3">+ Nova Tarefa</button>
            
            <div class="modal fade" id="inserirTarefa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Preencha os dados da tarefa:</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="tarefa_db_insert.php" method="POST">
                            <div class="d-flex flex-column gap-2">
                                <div class="d-flex flex-column">
                                    <label for="titulo" class="mb-0 form-label">Título:</label>
                                    <input required type="text" name="titulo" class="form-control border border-primary">    
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="descricao" class="mb-0 form-label">Descrição:</label>
                                    <input required type="text" name="descricao" class="form-control border border-primary">    
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="tipo" class="mb-0 form-label">Tipo:</label>
                                    <input required type="text" name="tipo" class="form-control border border-primary">    
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="prazo" class="mb-0 form-label">Prazo:</label>
                                    <input required type="date" min="0" name="prazo" class="form-control border border-primary">    
                                </div> 
                                <div class="d-flex flex-column">
                                    <label for="importancia" class="mb-0 form-label">Importância:</label>
                                    <select required name="importancia" id="" class="form-select border border-primary">
                                        <option selected value="">Defina a importância da tarefa</option>
                                        <option value="Pouca">Pouca</option>
                                        <option value="Média">Média</option>
                                        <option value="Muita">Muita</option>
                                    </select>  
                                </div>  
                            </div>              
                            
                            <div class="d-flex justify-content-end gap-2 pt-3 mt-3 border-top border-dark-subtle">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <input type="submit" type="button" value="Criar Tarefa" class="btn btn-primary">
                            </div> 
                            </form>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>

        <?php
            $stmt = $conn->prepare("SELECT * FROM tarefa WHERE usuario_idusuario = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($tarefa = $result->fetch_assoc()) {
                $i += 1;

                echo '<div class="d-flex border-bottom border-dark-subtle align-content-center align-items-center px-4 py-1 bg-light task_container">
                <p class="bg-dark-subtle border border-dark-subtle m-0 px-2 py-1 rounded-4">' . $i . '</p>
                <div class="container-fluid">
                    <p class="m-0 fw-bold">' . $tarefa["titulo"] . '</p>
                    <p class="m-0 text-dark-emphasis">' . $tarefa["descricao"] . '</p>
                </div>
                <div class="px-2 border-end border-start border-dark-subtle">
                    <p class="m-0 fw-bold">Tipo:</p>
                    <p class="m-0 text-nowrap">' . $tarefa["tipo"] . '</p>
                </div>
                <div class="px-2 border-end border-dark-subtle">
                    <p class="m-0 fw-bold">Prazo:</p>
                    <p class="m-0 text-nowrap">' . $tarefa["prazo"] . '</p>
                </div>
                <div class="px-2 me-4 border-end border-dark-subtle">
                    <p class="m-0 fw-bold">Importância:</p>
                    <p class="m-0 text-nowrap">' . $tarefa["importancia"] . '</p>
                </div>

                <button onclick="insertId(' . $tarefa["idtarefa"] . ')" type="button" data-bs-toggle="modal" data-bs-target="#editarTarefa" class="bg-info-subtle text-black border border-info rounded-3 me-2 px-1 text-decoration-none">Editar</button>
                <a href="tarefa_db_delete.php?idusuario=' . $tarefa["usuario_idusuario"] . '&idtarefa=' . $tarefa["idtarefa"] . '" class="bg-danger text-white border border-danger-subtle rounded-3 px-1 text-decoration-none">Deletar</a>
            </div>';
            }
        ?>

        <div  class="modal fade" id="editarTarefa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar tarefa:</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="tarefa_db_edit.php" method="POST">
                        <input type="hidden" name="idtarefa" value="" id="idtarefa">
                        <div class="d-flex flex-column gap-2">
                            <div class="d-flex flex-column">
                                <label for="titulo" class="mb-0 form-label">Título:</label>
                                <input required type="text" name="titulo" class="form-control border border-primary">    
                            </div>
                            <div class="d-flex flex-column">
                                <label for="descricao" class="mb-0 form-label">Descrição:</label>
                                <input required type="text" name="descricao" class="form-control border border-primary">    
                            </div>
                            <div class="d-flex flex-column">
                                <label for="tipo" class="mb-0 form-label">Tipo:</label>
                                <input required type="text" name="tipo" class="form-control border border-primary">    
                            </div>
                            <div class="d-flex flex-column">
                                <label for="prazo" class="mb-0 form-label">Prazo:</label>
                                <input required type="date" min="0" name="prazo" class="form-control border border-primary">    
                            </div> 
                            <div class="d-flex flex-column">
                                <label for="importancia" class="mb-0 form-label">Importância:</label>
                                <select required name="importancia" id="" class="form-select border border-primary">
                                    <option selected value="">Defina a importância da tarefa</option>
                                    <option value="Pouca">Pouca</option>
                                    <option value="Média">Média</option>
                                    <option value="Muita">Muita</option>
                                </select>  
                            </div>  
                        </div>              
                        
                        <div class="d-flex justify-content-end gap-2 pt-3 mt-3 border-top border-dark-subtle">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" type="button" value="Editar tarefa" class="btn btn-primary">
                        </div> 
                    </form>
                </div>
                
                </div>
            </div>
        </div>
        
    </main>

    <script src="./js/sistema_tarefas_script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>