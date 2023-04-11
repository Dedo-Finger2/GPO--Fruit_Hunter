<?php
    namespace App\Model
    {
        class Account
        {
            private $nome;
            private $level;
            private $spins;
            private $raca;
            private $frutas_inv;
            private $items_inv;
            private $fruta;
            private $conexao;


            public function __construct()
            {
                $this->conexao = new \mysqli("localhost", "root", "", "gpo_fruit_hunter");
            }

            public function create($nome, $level, $raca, $spins, $frutas_inv, $items_inv, $fruta)
            {
                $this->nome = $nome;
                $this->level = $level;
                $this->spins = $spins;
                $this->raca = $raca;
                $this->fruta = $fruta;
                $this->frutas_inv = $frutas_inv;
                $this->items_inv = $items_inv;
            }

            public function delete($id)
            {
                $sql = "DELETE FROM account WHERE id='$id'";
                $result = mysqli_query($this->conexao, $sql);
            }

            public function edit($id, $new_nome, $new_level, $new_raca, $new_spins, $new_frutas_inv, $new_items_inv, $new_fruta)
            {
                $result = mysqli_query($this->conexao, "UPDATE account SET 
                nome = '$new_nome', level = '$new_level', raca = '$new_raca', spins = '$new_spins', 
                frutas_inv = '$new_frutas_inv', items_inv = '$new_items_inv', atual_fruta = '$new_fruta' 
                WHERE id = $id");
            }

            public function save()
            {
                $sql = $this->conexao->prepare("INSERT INTO account(nome, atual_fruta, level, items_inv, frutas_inv, spins, raca) VALUES (?,?,?,?,?,?,?)");
                $sql->bind_param("ssissis", $this->nome, $this->fruta, $this->level, $this->items_inv, $this->frutas_inv, $this->spins, $this->raca); // passa a string de frutas para o método bind_param()
                $sql->execute();
                $sql->close();
            }

            public function getAcc()
            {
                
            }

           


        }
    }