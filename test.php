<?php
    
    use App\Model\Day;
    use App\Model\Fruit;
    use App\Controller\FruitController;
    use App\Controller\DayController;
    include_once("app/Model/day.class.php");
    include_once("app/Model/fruits.class.php");
    include_once("app/Controller/fruits.class.php");
    include_once("app/Controller/day.class.php");

    $mera = new Fruit();
    $mera->setFruit("Mera", "Legendary");
    $hie = new Fruit();
    $hie->setFruit("Hie", "Legendary");
    $magu = new Fruit();
    $magu->setFruit("Magu", "Legendary");
    $pika = new Fruit();
    $pika->setFruit("Pika", "Legendary");
    $yuki = new Fruit();
    $yuki->setFruit("Yuki", "Legendary");
    $suna = new Fruit();
    $suna->setFruit("Suna", "Legendary");
    $gura = new Fruit();
    $gura->setFruit("Gura", "Legendary");
    $goro = new Fruit();
    $goro->setFruit("Goro", "Legendary");
    $zushi = new Fruit();
    $zushi->setFruit("Zushi", "Legendary");
    $ito = new Fruit();
    $ito->setFruit("Ito", "Legendary");
    $kage = new Fruit();
    $kage->setFruit("Kage", "Legendary");
    $paw = new Fruit();
    $paw->setFruit("Nikyu", "Legendary");
    $yami = new Fruit();
    $yami->setFruit("Yami", "Legendary");
    $yomi = new Fruit();
    $yomi->setFruit("Yomi", "Epic");
    $bomu = new Fruit();
    $bomu->setFruit("Bomu", "Rare");
    $gomu = new Fruit();
    $gomu->setFruit("Gomu", "Rare");
    $horo = new Fruit();
    $horo->setFruit("Horo", "Rare");
    $bari = new Fruit();
    $bari->setFruit("Bari", "Rare");
    $mero = new Fruit();
    $mero->setFruit("Mero", "Rare");
    $suke = new Fruit();
    $suke->setFruit("Suke", "Common");
    $spin = new Fruit();
    $spin->setFruit("Spin", "Common");
    $kilo = new Fruit();
    $kilo->setFruit("Kilo", "Common");
    $tori = new Fruit();
    $tori->setFruit("Tori", "Mythic");
    $mochi = new Fruit();
    $mochi->setFruit("Mochi", "Mythic");
    

    $teste = new Day();
    echo "<br>";
    $teste->setDay();
    echo($teste->getDate());
    //$teste->setFruits($mera);
    //$teste->setFruits($tori);
    //$teste->setFruits($hie);
    //$teste->save();
    echo "<br>";
    
    $fruta = "Tori";

    //$teste2 = new DayController();
    //$teste2->setDia($fruta);

    

    /*
    foreach($teste->getFruits() as $fruta)
    {
        echo $fruta->getNome() . " - ";
        echo $fruta->getRaridade();
        echo "<br>";
        echo "<br>";
    }
    */
