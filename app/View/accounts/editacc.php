<?php   
    require_once("../../Model/conexao.php");
    
    $id = $_GET['id'];

    $sql = $conn->query("SELECT * FROM day WHERE id=$id");
    $row = $sql->fetch_assoc();

    $lista = $row['frutas'];
    $array = explode(",", $lista);
    $array = array_filter($array);


?>

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

            .side-bar {
                width: 100%;
            }

            .content {
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                border: 1px solid #000;
                padding: 20px;
                margin-right: 6rem;
                width: 89rem;
                height: 800px;
            }

            h2 {
                text-align: center;
                margin-right: 3rem;
            }

            .form {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-left: 30px;
                text-align: center;
            }

            input, textarea, button.enviar {
                margin: 10px;
                padding: 10px;
                font-size: 16px;
            }

            button.enviar {
                background-color: #000;
                color: #fff;
                border: none;
                cursor: pointer;
                width: 150px;
            }

            button.enviar:hover {
                background-color: gray;
            }

            input, textarea {
                border: 1px solid #000;
                width: 500px;
                text-align: center;
                font-weight: bold;
                font-size: 17px;
            }

            textarea {
                height: 15rem;
            }

            .fruta {
                text-align: center;
                font-size: 20px;
                margin-bottom: 5px;
            }

        </style>
</head>
<body>
    <div class="side-bar">
        <?php require_once("../menu.php") ?>
    </div>
    <div class="wrapper">
        <div class="content">
            <h2>EDITANDO O DIA: <b><?= $row['data'] ?></b> COM AS FRUTAS: 
            <b><?php  
                    foreach($array as $item)
                    {
                        echo "<p class='fruta'>- $item</p>";
                    }
                ?>
            </b></h2>
            <div class="form">
                <form action="../../Controller/form/tratamento.php" method="post">
                    <b>Data:</b> <br><input class="data" type="text" name="new_day_data" value="<?= $row['data'] ?>"><br><br>
                    <b>Frutas:</b> <br><textarea name="new_frutas"><?= $row['frutas'] ?></textarea>
                    <input type="hidden" name="edit_id_dia" value="<?= $row['id'] ?>">
                    <br><br>
                    <button class="enviar" type="submit" name="edited">EDIT</button>
                </form>
            </div>
        </div>
    </div>
</body>