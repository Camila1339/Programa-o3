<?php
class Veiculo {
    public $modelo;
    public $cor;
    public $ano;

    public function andar() {
        echo "Andou";
    }

    public function parar() {
        echo "Parou";
    }
}

class Carro extends Veiculo {
    
    public $tipoCombustivel;

    public function mostrarCombustivel() {
        echo "Tipo de combustível: " . $this->tipoCombustivel;
    }

    public function ligarLimpador() {
        echo "Limpador ligado";
    }
}

class CarroEletrico extends Carro {
    public function carregarBateria() {
        echo "Bateria carregada";
    }
}

class Moto extends Veiculo {
    public function darGrau() {
        echo "Deu grau!";
    }

    // sobrescrevendo o método andar
    public function andar() {
        echo "Moto está em movimento";
    }
}

class Caminhao extends Veiculo {
    public function carregarCarga() {
        echo "Carga carregada com sucesso!";
    }
}


$carro = new Carro();
$carro->modelo = "Gol";
$carro->cor = "Vermelho";
$carro->ano = 2018;
$carro->tipoCombustivel = "Diesel"; // Exercício 3
echo "Carro 1:";
echo "<br>";
$carro->andar();
echo "<br>";
$carro->ligarLimpador();
echo "<br>";
$carro->mostrarCombustivel(); // Exercício 3

// Exercício 4
$carro2 = new Carro();
$carro2->modelo = "Uno";
$carro2->cor = "Vermelho";
$carro2->ano = 2005;
$carro2->tipoCombustivel = "Alcool";
echo "<br>";
echo "Carro 2:";
echo "<br>";
$carro2->andar();
echo "<br>";
$carro2->parar();
echo "<br>";
$carro2->mostrarCombustivel();

echo "<hr>";

$moto = new Moto();
$moto->modelo = "Honda Biz";
$moto->cor = "Azul";
$moto->ano = 2017;
echo "Moto 1:";
echo "<br>";
$moto->andar(); // Exercício 2
echo "<br>";
$moto->parar();
echo "<br>";
$moto->darGrau();

// Exercício 4
$moto2 = new Moto();
$moto2->modelo = "Yamaha XJ6";
$moto2->cor = "Azul";
$moto2->ano = 2018;
echo "<br>";
echo "Moto 2:";
echo "<br>";
$moto2->andar();
echo "<br>";
$moto2->darGrau();
echo "<br>";
$moto2->parar();

echo "<hr>";

// Exercício 1
$caminhao = new Caminhao();
$caminhao->modelo = "";     
$caminhao->cor = "";    
$caminhao->ano = 0;
$caminhao->andar();
echo "<br>";
$caminhao->carregarCarga();
echo "<br>";
$caminhao->parar();

echo "<hr>";

// instanciando um Carro Elétrico
$carroEletrico = new CarroEletrico();
$carroEletrico->modelo = "Tesla Model X";
$carroEletrico->cor = "Preto";
$carroEletrico->ano = 2023;
$carroEletrico->tipoCombustivel = "Elétrico";
echo "Carro Elétrico:";
echo "<br>";
$carroEletrico->andar();
echo "<br>";
$carroEletrico->ligarLimpador();
echo "<br>";
$carroEletrico->mostrarCombustivel();
echo "<br>";
$carroEletrico->carregarBateria();

echo "<hr>";
?>

