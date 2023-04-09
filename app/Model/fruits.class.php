<?php
    namespace App\Model;
        class Fruit
        {
            private $nome;
            private $raridade;
            private $conexao;


            public function __construct()
            {
                $this->conexao = new \mysqli("localhost", "root", "", "gpo_fruit_hunter");
            }

            public function setFruit($nome, $raridade)
            {
                $this->nome = $nome;
                $this->raridade = $raridade;
            }

            public function getFruit()
            {

            }

            public function edit($novo_nome, $nova_raridade, $id)
            {
                $result = mysqli_query($this->conexao, "UPDATE fruits SET nome = '$novo_nome', raridade = '$nova_raridade' WHERE id = $id");
            }

            public function delete($id)
            {
                $sql = "DELETE FROM fruits WHERE id='$id'";
                $result = mysqli_query($this->conexao, $sql);

            }

            public function save()
            {
                $sql = $this->conexao->prepare("INSERT INTO fruits(nome, raridade) VALUES (?,?)");
                $sql->bind_param("ss", $this->nome, $this->raridade);
                $sql->execute();
                $sql->close();
            }

            public function getNome()
            {
                return $this->nome;
            }

            public function getRaridade()
            {
                return $this->raridade;
            }

        }
