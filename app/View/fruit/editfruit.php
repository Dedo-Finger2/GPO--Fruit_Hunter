<?php   
    require_once("../../Model/conexao.php");
    
    $id = $_GET['id'];

    $sql = $conn->query("SELECT * FROM fruits WHERE id=$id");
    $row = $sql->fetch_assoc();
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
                
            }

            .content {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                border: 1px solid #000;
                padding: 20px;
                width: 69rem;
            }

            h2 {
                text-align: center;
                margin-bottom: 20px;
            }

            .form {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-left: 30px;
                text-align: center;
            }

            input.dia, button.enviar {
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

            .dia, textarea {
                border: 1px solid #000;
                width: 500px;
                text-align: center;
                font-weight: bold;
                font-size: 17px;
            }
            
            b.raridade-mythic {
                background: linear-gradient(to right, #9d7fd3, #3c8dbc 25%, #ffffff 150%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            b.raridade-leg {
                background: linear-gradient(to right, #FF0000, #FF7F00, #FFFF00, #00FF00, #0000FF, #8B00FF);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            b.raridade-epic {
                background: linear-gradient(to right, #6c3483 20%, #9b59b6 65%, #ffffff 150%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            b.raridade-rare {
                background: linear-gradient(to right, #17a2b8, #38b8cc 65%, #ffffff 155%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            b.raridade-common {
                background: linear-gradient(to right, #657383, #8695a8 65%, #ffffff 150%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

        </style>
</head>

<div class="side-bar">
    <?php require_once("../menu.php") ?>
</div>
<div class="wrapper">
    <div class="content">
        <h2>EDITANDO A FRUTA: <b><?= $row['nome'] ?></b> -
            <?php 
                if ($row['raridade'] == "Mythic") {
                    echo "<b class='raridade-mythic'>". $row['raridade']."</b>";
                } elseif ($row['raridade'] == "Legendary") {
                    echo "<b class='raridade-leg'>". $row['raridade']."</b>";
                } elseif ($row['raridade'] == "Epic") {
                    echo "<b class='raridade-epic'>". $row['raridade']."</b>";
                } elseif ($row['raridade'] == "Rare") {
                    echo "<b class='raridade-rare'>". $row['raridade']."</b>";
                } elseif ($row['raridade'] == "Common") {
                    echo "<b class='raridade-common'>". $row['raridade']."</b>";
                }

            ?></b></h2><br>
        <div class="form">
            <form action="../../Controller/form/tratamento.php" method="post">
                <b>Nome:</b> <br><input class="dia" type="text" name="new_fruit_name" value="<?= $row['nome'] ?>"><br><br>
                <b>Raridade:</b> <br><input class="dia" type="text" name="new_fruit_rarity" value="<?= $row['raridade'] ?>">
                <input type="hidden" name="edit_id_fruta" value="<?= $row['id'] ?>">
                <br><br>
                <button class="enviar" type="submit" name="edited">EDIT</button>
            </form>
        </div>
    </div>
</div>