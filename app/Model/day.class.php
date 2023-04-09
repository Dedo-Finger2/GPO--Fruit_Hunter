<?php
    namespace App\Model;
    {
        class Day
        {
            private $data;
            private $fruit;
            private $conexao;

            public function __construct()
            {
                $this->conexao = new \mysqli("localhost", "root", "", "gpo_fruit_hunter");
            }

            public function setDay()
            {
                $this->data = date("Y-m-d");
            }

            public function getDay()
            {
                return $this->data;
            }

            public function editDay($id, $nova_data, $novas_frutas)
            {
                $sql = "UPDATE day SET data = '$nova_data', frutas = '$novas_frutas' WHERE id = $id";
                $result = mysqli_query($this->conexao, $sql);
            }

            public function deleteDay($id)
            {
                $sql = "DELETE FROM day WHERE id='$id'";
                $result = mysqli_query($this->conexao, $sql);
            }

            public function saveDay()
            {
                /*
                $fruit_names = array_map(function($fruit) {
                    return $fruit->getNome();
                }, $this->fruit);
                $fruits_string = implode(',', $fruit_names);
                */

                $sql = $this->conexao->prepare("INSERT INTO day(data) VALUES (?)");
                $sql->bind_param("s", $this->data); // passa a string de frutas para o método bind_param()
                $sql->execute();
                $sql->close();
            }

            public function setFruits($fruta)
            {
                $fruta = $fruta . ",";
                $this->fruit = $fruta;
            }

            public function saveFruits()
            {
                $today = date("Y-m-d");
                mysqli_query($this->conexao, "UPDATE day SET frutas=CONCAT(frutas, '$this->fruit') WHERE data='$today'");
            }

            public function getDate()
            {
                return $this->data;
            }

            public function getFruits()
            {
                return $this->fruit;
            }

        }
}