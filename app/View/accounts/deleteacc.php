<?php   
    require_once("../../Model/conexao.php");
    
    $id = $_GET['id'];

    $sql = $conn->query("SELECT * FROM account WHERE id=$id");
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
                width: 89rem;
            }

            h2 {
                text-align: center;
                margin-right: 3rem;
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


        </style>
</head>

<body>
    <div class="side-bar">
        <?php require_once("../menu.php") ?>
    </div>
    <div class="wrapper">
        <div class="content">
            <h2> TEM CERTEZA QUE QUER DELETAR A CONTA: <b><?= $row['nome'] ?></b> DO BANCO DE DADOS?</h2>
            <form action="../../Controller/form/tratamento.php" method="post">
                <input class="dia" type="hidden" name="delete_id_dia" value="<?= $row['id'] ?>">
                <br><br>
                <button class="enviar" type="submit" name="deleted_acc">Deletar</button>
            </form>
        </div>
    </div>
</body>