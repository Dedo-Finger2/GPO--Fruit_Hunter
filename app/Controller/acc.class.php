<?php
    namespace App\Controller
    {
        use App\Model\Account;
        require_once("../../Model/acc.class.php");
        class AccountController extends Account
        {
            private $conexao;

            public function __construct()
            {
                $this->conexao = new \mysqli("localhost", "root", "", "gpo_fruit_hunter");
            }

            public function new_acc($nome, $level, $raca, $spins, $frutas_inv, $items_inv, $fruta)
            {
                if(isset($nome))
                {
                    $new_acc = new Account();
                    $new_acc->create($nome, $level, $raca, $spins, $frutas_inv, $items_inv, $fruta);
                    $new_acc->save();
                }
            }

            public function delete_acc($id)
            {
                if(isset($id))
                {
                    $this->delete($id);
                }
            }

            public function edit_acc($id, $new_nome, $new_level, $new_raca, $new_spins, $new_frutas_inv, $new_items_inv, $new_fruta)
            {
                if(isset($id))
                {
                    $new_acc = new Account();
                    $new_acc->edit($id, $new_nome, $new_level, $new_raca, $new_spins, $new_frutas_inv, $new_items_inv, $new_fruta);
                }
            }



        }
    }