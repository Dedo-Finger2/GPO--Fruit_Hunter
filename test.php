<?php
    
    use App\Model\Day;
    use App\Model\Fruit;
    use App\Model\Account;
    use App\Controller\FruitController;
    use App\Controller\DayController;
    include_once("app/Model/fruits.class.php");
    include_once("app/Model/acc.class.php");
    include_once("app/Model/day.class.php");
    
    // Array original com valores repetidos
    $array = array("mera", "gura", "tori", "mera", "goro", "tori", "gura", "magu", "tori", "mera", "mera", "tori", "magu", "tori");

    // Array para armazenar o número de ocorrências de cada valor
    $occurrences = array();

    // Loop para contar as ocorrências de cada valor
    foreach ($array as $val) {
    if (isset($occurrences[$val])) {
        $occurrences[$val]++;
    } else {
        $occurrences[$val] = 1;
    }
    }

    // Novo array com valores e contadores
    $newArray = array();
    foreach ($array as $key => $val) {
    if ($occurrences[$val] > 1) {
        $occurrenceKey = array_search($val, array_slice($array, $key+1));
        if ($occurrenceKey !== false) {
        $occurrenceKey += $key + 1;
        if (!in_array($val . ' x' . $occurrences[$val], $newArray)) {
            $newArray[] = $val . ' x' . $occurrences[$val];
        }
        } else {
        $countedVal = $val . ' x' . $occurrences[$val];
        if (!in_array($countedVal, $newArray)) {
            $newArray[] = $countedVal;
        }
        }
    } else {
        if (!in_array($val, $newArray)) {
        $newArray[] = $val;
        }
    }
    }

    print_r($newArray); // Array ( [0] => mera x2 [1] => gura [2] => tori x2 [3] => goro )
