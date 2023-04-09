<?php
    require_once("app/Model/conexao.php");
    $result = $conn->query("SELECT * FROM fruits");
?>

<!DOCTYPE html>
<html lang="en">
    <!-- Página inicial com o formulário inicial -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/fruit_hunter/assets/plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="/fruit_hunter/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="/fruit_hunter/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="/fruit_hunter/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/fruit_hunter/assets/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="/fruit_hunter/css/style.css">
        <style>
            body {
                /* Remova as propriedades de centralização aqui */
            }

            .wrapper {
                display: flex;
                justify-content: center;
                margin-left: 15rem;
                align-items: center;
                height: 93vh;
            }

            .sidebar {
                /* Estilos para a barra lateral do menu */
            }

            .content {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: row;
                border: 1px solid #000;
                padding: 20px;
            }

            select, .enviar {
                margin: 20px;
                padding: 10px;
                font-size: 16px;
            }

            .enviar {
                background-color: #000;
                color: #fff;
                border: none;
                cursor: pointer;
                width: 150px;
            }

            .enviar:hover {
                background-color: gray;
            }

            select, option {
                border: 1px solid #000;
                width: 500px;
                margin-right: 10px;
                margin-left: 15px;
                text-align: center;
                font-weight: bold;
                font-size: 17px;
            }


        </style>
    </head>
    <body>
        
            <div class="side-bar">
                <?php require_once("app/View/menu.php") ?>
            </div>
            <div class="wrapper">
                <!-- Envia a fruta para o tratamento -->
                <form action="app/Controller/form/tratamento.php" method="post">
                    <div class="content">
                        <select class="selecionar" name="fruta">
                            <?php
                                if ($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo "<option>".$row['nome']. "</option>";
                                    }
                                }
                            ?>
                        </select>
                        <button class="enviar" type="submit" name="novo_dia">Enviar</button>
                    </div>
                </form>
            </div>
    </body>
</html>

