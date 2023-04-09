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
    </head>
    <body>
        
        <?php require_once("app/View/menu.php") ?>

        <!-- Envia a fruta para o tratamento -->
        <form action="app/Controller/form/tratamento.php" method="post">
            <div class="main_container">
                <select class="butao_index" style="width: 200px; padding: 10px; font-size: 20px;" name="fruta">
            </div>
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
            <button style="padding: 10px; width: 200px; font-size: 20px; margin-left: 30px;" class="butao_index" type="submit" name="novo_dia">Enviar</button>
        </form>
    </body>
</html>

