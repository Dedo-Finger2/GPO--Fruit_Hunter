<?php
    // Aqui vão ser usados os comandos do Model para criar novos métodos
    // que fazem mais coisas, como por exemplo criar uma nova fruta
    namespace App\Controller
    {
        use App\Model\Fruit;
        spl_autoload_register(function ($class_name) {
            $dir = 'Model/';
            $file_path = str_replace('\\', DIRECTORY_SEPARATOR, $dir . $class_name) . '.class.php';
            if (file_exists($file_path)) {
                include $file_path;
            }
        });

        class FruitController extends Fruit
        {
            public function setFruta($fruta, $raridade)
            {
                if(isset($fruta) && isset($raridade))
                {
                    $new_fruit = new Fruit();
                    $new_fruit->setFruit($fruta, $raridade);
                    $new_fruit->save();
                }
            }

            public function editFruta($novo_nome, $nova_raridade, $id)
            {
                if(isset($id))
                {
                    $fruta = new Fruit();
                    $fruta->edit($novo_nome, $nova_raridade, $id);
                }
            }

            public function deleteFruta($id)
            {
                if(isset($id))
                {
                    $fruta = new Fruit();
                    $fruta->delete($id);
                }
            }

        }


    }