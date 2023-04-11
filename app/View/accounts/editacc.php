<?php

    require_once("../../Model/conexao.php");
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM account WHERE id=$id");
    $row = $result->fetch_assoc();
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
                width: 50rem;
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

            .dia {
                border: 1px solid #000;
                width: 400px;
                text-align: center;
                font-weight: bold;
                font-size: 17px;
            }

            .inputs {
                display: inline-block;
            }

            select {
                height: 2rem;
            }


        </style>
</head>

<div class="side-bar">
    <?php require_once("../menu.php") ?>
</div>
<div class="wrapper">
    <div class="content">
        <div class="form">
            <form action="../../Controller/form/tratamento.php" method="post">
                <div class="inputs">
                    <b>Nome:</b> <br><input class="#" type="text" name="acc_nome" value="<?= $row['nome']?>"><br>
                    <b>Level:</b> <br><input class="#" type="text" name="acc_level" value="<?= $row['level'] ?>"><br>
                    <b>Spins:</b> <br><input class="#" type="text" name="acc_spins" value="<?= $row['spins'] ?>" ><br>
                    <b>Bounty:</b> <br><input class="#" type="text" name="acc_bounty" value="<?= $row['bounty'] ?>" ><br><br>
                </div>
                <hr>
                <b>Raça:</b> <br><select class="dia" name="acc_raca">
                    <option <?php if ($row['raca'] == "Human") echo "selected"?>>Human</option>
                    <option <?php if ($row['raca'] == "Skypean") echo "selected"?>>Skypean</option>
                    <option <?php if ($row['raca'] == "Mink") echo "selected"?>>Mink</option>
                    <option <?php if ($row['raca'] == "Fishman") echo "selected"?>>Fishman</option>
                    <option <?php if ($row['raca'] == "Cyborg") echo "selected"?>>Cyborg</option>
                </select>
                <br><br>
                <b>Fruta atual:</b> <br><input class="dia" type="text" name="acc_fruta" value="<?= $row['atual_fruta'] ?>">
                <hr>
                <b>Items:</b><br>
                <textarea style="height: 120px;" class="dia" name="acc_items"><?php echo $row['items_inv'];?></textarea>
                <hr>
                <b>Frutas:</b><br>
                <textarea style="height: 120px;" class="dia" name="acc_frutas"><?php echo $row['frutas_inv']?></textarea>
                <br><br>
                <input type="hidden" name="acc_id" value="<?= $row['id'] ?>">
                <button class="enviar" type="submit" name="edited_acc">EDIT</button>
            </form>
        </div>
    </div>
</div>