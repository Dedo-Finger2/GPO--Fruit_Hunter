<?php
    
    require_once("../../Model/conexao.php");
    
    $id = $_GET['id'];

    $sql = $conn->query("SELECT * FROM account WHERE id='$id'");
    $row = $sql->fetch_assoc();

    $frutas = $row['frutas_inv'];
    $array_frutas = explode(",", $frutas);
    $array_frutas = array_filter($array_frutas);

    $items = $row['items_inv'];
    $array_items = explode(",", $items);
    $array_items = array_filter($array_items);


    // Array para armazenar o número de ocorrências de cada valor
    $occurrences_frutas = array();

    // Loop para contar as ocorrências de cada valor
    foreach ($array_frutas as $val) {
        if (isset($occurrences_frutas[$val])) {
            $occurrences_frutas[$val]++;
        } else {
            $occurrences_frutas[$val] = 1;
        }
    }

    // Novo array com valores e contadores
    $newArray_frutas = array();
    foreach ($array_frutas as $key => $val) {
        if ($occurrences_frutas[$val] > 1) {
            $occurrenceKey = array_search($val, array_slice($array_frutas, $key+1));
        if ($occurrenceKey !== false) {
            $occurrenceKey += $key + 1;
        if (!in_array($val . ' x' . $occurrences_frutas[$val], $newArray_frutas)) {
                $newArray_frutas[] = $val . ' x' . $occurrences_frutas[$val];
            }
        } else {
            $countedVal = $val . ' x' . $occurrences_frutas[$val];
            if (!in_array($countedVal, $newArray_frutas)) {
                $newArray_frutas[] = $countedVal;
            }
        }
        } else {
            if (!in_array($val, $newArray_frutas)) {
                $newArray_frutas[] = $val;
            }
        }
    }

    // Array para armazenar o número de ocorrências de cada valor
    $occurrences_items = array();

    // Loop para contar as ocorrências de cada valor
    foreach ($array_items as $val) {
        if (isset($occurrences_items[$val])) {
            $occurrences_items[$val]++;
        } else {
            $occurrences_items[$val] = 1;
        }
    }

    // Novo array com valores e contadores
    $newArray_items = array();
    foreach ($array_items as $key => $val) {
        if ($occurrences_items[$val] > 1) {
            $occurrenceKey = array_search($val, array_slice($array_items, $key+1));
        if ($occurrenceKey !== false) {
            $occurrenceKey += $key + 1;
        if (!in_array($val . ' x' . $occurrences_items[$val], $newArray_items)) {
                $newArray_items[] = $val . ' x' . $occurrences_items[$val];
            }
        } else {
            $countedVal = $val . ' x' . $occurrences_items[$val];
            if (!in_array($countedVal, $newArray_items)) {
                $newArray_items[] = $countedVal;
            }
        }
        } else {
            if (!in_array($val, $newArray_items)) {
                $newArray_items[] = $val;
            }
        }
    }



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
            .wrapper {
                display: flex;
                justify-content: center;
                margin-left: 15rem;
                align-items: center;
                height: 93vh;
            }

       
            .content {
                display: inline-block;
                justify-content: center;
                align-items: center;
                border: 0px solid #000;
                padding: 20px;
                width: 90rem;
                height: 55rem;
            }

            h2 {
                text-align: center;
                margin-right: 3rem;
            }

            .frutas {
                display: inline-block;
                float: left;
            }

            .items {
                display: inline-block;
                float: right;
            }


        </style>
</head>

<div class="side-bar">
    <?php require_once("../menu.php") ?>
</div>
<div class="wrapper">
    <div class="content">
        <h2><?= $row['nome'] ?></h2>
        <div class="frutas">
            <h2>Frutas</h2><br>
            <?php
                foreach($newArray_frutas as $item)
                {
                    echo "<p>- $item</p>";
                }
            ?>
        </div>
        <div class="items">
            <h2>Items</h2><br>
            <?php
                foreach($newArray_items as $item)
                {
                    echo "<p>- $item</p>";
                }
            ?>
        </div>
    </div>
</div>