<?php
    // Aqui vão ser usados os comandos do Model para criar novos métodos
    // que fazem mais coisas, como por exemplo criar um novo dia completo
    namespace App\Controller
    {  
        use App\Model\Day;
        use App\Model\Fruit;
        require_once("../../Model/day.class.php");
        require_once("../../Model/fruits.class.php");
        
        class DayController extends Day
        {
            private $conexao;

            public function __construct()
            {
                $this->conexao = new \mysqli("localhost", "root", "", "gpo_fruit_hunter");
            }

            public function setDia($fruta)
            {
                $today = date('Y-m-d');
                $day = new Day();
                $day->setFruits($fruta);


                // Seleciona tudo da tabela aonde a data for igual a data de hoje
                $result = mysqli_query($this->conexao, "SELECT * FROM day WHERE data='$today'");

                // Se não tiver o dia de hoje, criar uma nova linha com a data de hoje
                if (mysqli_num_rows($result) == 0) {
                    
                    $day->setDay(); // seta o dia
                    $day->saveDay(); // salva o dia
                    
                }
                // Salva a fruta no dia atual
                $day->saveFruits();

            }

            public function editDia($id, $nova_data, $novas_frutas)
            {
                if(isset($id))
                {
                    $dia = new Day();
                    $dia->editDay($id, $nova_data, $novas_frutas);
                }
            }

            public function deleteDia($id)
            {
                if(isset($id))
                {
                    $dia = new Day();
                    $dia->deleteDay($id);
                }
            }


        }

        
    }