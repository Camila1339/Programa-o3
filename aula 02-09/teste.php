<?php
class Quarto{
    private $numero;
    private $preco;

    public function __construct($numero){
        $this->numero = $numero;

    }
    public function getNumero(): mixed{
        return $this->numero;

    }



}

    class Standard extends Quarto{
        public function getPreco(): float{
            return $this->preco = 300.00;

        }
    }

   class Deluxe extends Quarto{
        public $hospedes;

        public function getPreco($hospedes): float{

            if($hospedes > 2){
                return $this->preco = (300.00 * 1.2)*1.1;
            }
            else
                return $this->preco = 300.00 * 1.2;
        }
    }

    class Suite extends Quarto{

       public $dia;

       public function getPreco($dia): float{
        if($dia >= 2 && $dia <= 6){
            return $this->preco = 300.00 *1.5;

        }
        else
            return $this->preco =(300.00 * 1.5)*1.5;

       }

    }

    $std = new Standard(numero:11);
    echo "Hospede - Quarto: " . $std->getNumero(). "Valor R$ ". $std->getPreco()."<br>";

    $duplo = new Deluxe(numero: 41);
    echo "Hospede - Quarto: " . $duplo->getNumero(). "Valor R$ ". $duplo->getPreco(hospedes: 2)."<br>";

    $suite = new Suite(numero: 101);
    echo "Hospede - Quarto: " . $suite->getNumero(). "Valor R$ ". $suite->getPreco(dia: 1);

    ?>

























