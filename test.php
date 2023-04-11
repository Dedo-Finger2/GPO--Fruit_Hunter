<?php
    
    use App\Model\Day;
    use App\Model\Fruit;
    use App\Model\Account;
    use App\Controller\FruitController;
    use App\Controller\DayController;
    include_once("app/Model/fruits.class.php");
    include_once("app/Model/acc.class.php");
    include_once("app/Model/day.class.php");
    
    $dedo = new Account();
    $dedo->create("dadeds2", 500, "Fishman", 120, "Tori,Mera,Mochi,Hie", "ASE,Festival_Lancer,Flamingo_boat", "Tori");
    $dedo->save();