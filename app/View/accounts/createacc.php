<?php

    require_once("../../Model/conexao.php");
    $result = $conn->query("SELECT * FROM fruits");
    $items = $conn->query("SELECT * FROM account");

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
                    <b>Nome:</b> <br><input class="#" type="text" name="acc_nome"><br>
                    <b>Level:</b> <br><input class="#" type="text" name="acc_level"><br>
                    <b>Spins:</b> <br><input class="#" type="text" name="acc_spins"><br>
                    <b>Bounty:</b> <br><input class="#" type="text" name="acc_bounty"><br><br>
                </div>
                <hr>
                <b>Raça:</b> <br><select class="dia" name="acc_raca">
                    <option>Human</option>
                    <option>Skypean</option>
                    <option>Mink</option>
                    <option>Fishman</option>
                    <option>Cyborg</option>
                </select>
                <hr>
                <b>Fruta atual:</b> <br><select class="dia" name="acc_fruta">
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
                <hr>
                <b>Items:</b><br>
                <textarea style="height: 120px;" class="dia" name="acc_items"></textarea>
                <hr>
                <b>Frutas:</b><br>
                <textarea style="height: 120px;" class="dia" name="acc_frutas"></textarea>
                <br><br>
                <button class="enviar" type="submit" name="nova_acc">Enviar</button>
            </form>
        </div>
    </div>
</div>