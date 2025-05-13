<?php
class Carro{
    public $modelo;
    public $cor;
    public $ano;

    public function __construct($modelo, $cor, $ano) {
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->ano = $ano;
}
    public function getmodelo() {
     echo "Modelo do carro: " . $this->modelo ."<br><br>";
   }
   public function setmodelo($modelo) {
   $this->modelo = $modelo;
}
}
?>