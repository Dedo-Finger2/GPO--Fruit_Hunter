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

<?php require_once("../menu.php") ?>

<div class="main_container">
    <form action="../../Controller/form/tratamento.php" method="post">
        <b>Nome:</b> <br><input type="text" name="new_fruta"><br><br>
        <b>Raridade:</b> <br><select name="new_raridade">
            <option style="text-align: center;" >Common</option>
            <option style="text-align: center;" >Rare</option>
            <option style="text-align: center;" >Epic</option>
            <option style="text-align: center;" >Legendary</option>
            <option style="text-align: center;" >Mythic</option>
        </select>
        <br><br><br><br><br><br><br>
        <button style="padding: 10px; width: 200px; font-size: 20px;" type="submit" name="nova_fruta">Enviar</button>
    </form>
</div>