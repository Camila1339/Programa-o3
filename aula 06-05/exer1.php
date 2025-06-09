<?php
class Caneta{
    public $nome;
    public $preco;
    public $quantidade;

    public function exibirInformaçoes(){
        echo "Nome: $this->nome";
        echo ", Preço: $this->preco";
        echo ", Quantidade: $this->quantidade <br>";
    }
}

$p1 = new Caneta();
$p1->nome = "caneta";
$p1->preco = 2.5;
$p1->quantidade = 10;
$p1->exibirInformaçoes();

$p2 = new Caneta();
$p2->nome = "caneta azul";
$p2->preco = 4.5;
$p2->quantidade = 10;
$p2->exibirInformaçoes();

function media($p1, $p2) {
    return ($p1->preco + $p2->preco) / 2;
}
$media = media($p1, $p2);
echo "<br>Média de preços: $media <br>";
    


?>