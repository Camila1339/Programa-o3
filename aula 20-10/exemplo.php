<?php
abstract class Veículo{
    protected $modelo;
    protected $ano;

     public function __construct($modelo, $ano) {
        $this->modelo = $modelo;
        $this->ano = $ano;
}
}

class Carro extends Veículo {
    public function mover() {
        echo "O carro {$this->modelo} de {$this->ano} está dirigindo na estrada.<br>";
    }
}

class Bicicleta extends Veículo {
    public function mover() {
        echo "A bicicleta {$this->modelo} de {$this->ano} está sendo pedalada na estrada.<br>";
    }
}

$carro = new Carro("Gol", 2022);
$bicicleta = new Bicicleta("Caloi Elite", 2021);

$carro->mover();
$bicicleta->mover();

?>