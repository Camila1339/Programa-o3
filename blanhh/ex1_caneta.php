<?php

class caneta{
   
    public $cor;

    public $marca;

    public $ponta;

    public $tamanho;

    public $carga;

  

    public function escrever() {
        echo"escrevendo...<br>";
    }
    public function rabiscar() {   
    echo "rabiscando.....<br>";
    }
    public function sublinhar() {
    echo "sublinhando....<br>";
    }
    public function pintar() {
    echo "pintando....";
    }


}



$caneta1= new caneta();
$caneta1->cor ="azul";
$caneta1->marca = "BIC";
$caneta1->ponta = 0.5;          
$caneta1->tamanho = "grande";
$caneta1->carga = 100;
echo "Cor: " . $caneta1->cor ."<br>";
echo "Marca: " . $caneta1->marca ."<br>";
echo "Ponta: ". $caneta1->ponta ."<br>";
echo "Tamanho: ". $caneta1->tamanho ."<br>";
echo "Carga: ". $caneta1->carga ."<br>";

$caneta1->escrever();
$caneta1->rabiscar();
$caneta1->sublinhar();
$caneta1->pintar();


?>
