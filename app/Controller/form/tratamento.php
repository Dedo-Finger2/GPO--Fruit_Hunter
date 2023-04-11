<?php
    use App\Controller\AccountController;
    use App\Controller\ControllerAccount;
    use App\Controller\DayController;
    use App\Controller\FruitController;
    use App\Model\Account;
    include_once("../day.class.php");
    include_once("../fruits.class.php");
    include_once("../acc.class.php");
    
    // O tratamento vai fazer verificações e executar comandos do Controller

    extract($_POST);

    if (isset($fruta) && isset($novo_dia)){
        $dia = new DayController();
        $dia->setDia($fruta);
        header("Location: ../../../index.php");
    } elseif (isset($criar_fruta)) {
        header("Location: ../../View/fruit/createfruit.php");
    } elseif (isset($nova_fruta)) {
        $fruta = new FruitController();
        $fruta->setFruta($new_fruta, $new_raridade);
        header("Location: ../../../index.php");
    } elseif (isset($day_list)) {
        header("Location: ../../View/day/listday.php");
    } elseif (isset($fruit_list)) {
        header("Location: ../../View/fruit/listfruits.php");
    } elseif (isset($delete_id_fruta)) {
        $fruta = new FruitController();
        $fruta->deleteFruta($delete_id_fruta);
        header("Location: ../../View/fruit/listfruits.php");
    } elseif (isset($delete_id_dia)) {
        $dia = new DayController();
        $dia->deleteDia($delete_id_dia);
        header("Location: ../../View/day/listday.php");
    } elseif (isset($edit_id_fruta)) {
        $fruta = new FruitController();
        $fruta->editFruta($new_fruit_name, $new_fruit_rarity, $edit_id_fruta);
        header("Location: ../../View/fruit/listfruits.php");
    } elseif (isset($edit_id_dia)) {
        $dia = new DayController();
        $dia->editDia($edit_id_dia, $new_day_data, $new_frutas);
        header("Location: ../../View/day/listday.php");
    } elseif (isset($nova_acc)) {
        $conta = new AccountController();
        $conta->new_acc($acc_nome, $acc_level, $acc_raca, $acc_spins, $acc_frutas, $acc_items, $acc_fruta);
        header("Location: ../../View/accounts/listacc.php");
    } elseif (isset($edited_acc)) {
        $conta = new AccountController();
        $conta->edit_acc($acc_id, $acc_nome, $acc_level, $acc_raca, $acc_spins, $acc_frutas, $acc_items, $acc_fruta);
        header("Location: ../../View/accounts/listacc.php");
    } elseif (isset($deleted_acc)) {
        $conta = new AccountController();
        $conta->delete_acc($acc_id);
        header("Location: ../../View/accounts/listacc.php");
    }

    echo "ta passando";

    