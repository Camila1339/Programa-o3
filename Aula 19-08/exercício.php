<?php 

class Animal {
    private $nome;
    private $raca;

    public function __construct($nome, $raca) {
        $this->setAnimal($nome, $raca);
    }

    public function setAnimal($nome, $raca) {
        $this->nome = $nome;
        $this->raca = $raca;
    }

    public function getAnimal() {
        return "{$this->nome}, {$this->raca}";
    }

    public function exibeDados() {
        echo "Nome: {$this->nome}<br>";
        echo "Raça: {$this->raca}<br>";
    }

    public function caminha() {
        echo "{$this->nome} está caminhando<br>";
    }
}

class Cachorro extends Animal {
    public function late() {
        echo "O cachorro latiu <br>";
    }
}

class Gato extends Animal {
    public function mia() {
        echo "O gato miou<br>";
    }
}

$cachorro = new Cachorro("Fluffy", "Golden");
echo "Cachorro: <br>";
$cachorro->exibeDados();
$cachorro->caminha();
$cachorro->late();

echo "<hr>";

$gato = new Gato("Sofia", "Persa");
echo "Gato: <br>";
$gato->exibeDados();
$gato->caminha();
$gato->mia();

echo "<br><hr><br>";

class Pessoa {
    protected $nome;
    protected $idade;

    public function __construct($nome, $idade) {
        $this->setPessoa($nome, $idade);
    }

    public function setPessoa($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function exibeDados() {
        echo "Nome: {$this->nome}<br>";
        echo "Idade: {$this->idade}<br>";
    }
}

class Rica extends Pessoa {
    public function fazCompras() {
        echo "{$this->nome} está fazendo compras<br>";
    }
}

class Pobre extends Pessoa {
    public function trabalha() {
        echo "{$this->nome} está trabalhando<br>";
    }
}

class Miseravel extends Pessoa {
    public function mendiga() {
        echo "{$this->nome} está pedindo esmola<br>";
    }
}

$pessoaRica = new Rica("Victor", 30);
echo "Pessoa Rica: <br>";
$pessoaRica->exibeDados();
$pessoaRica->fazCompras();

echo "<hr>";

$pessoaPobre = new Pobre("Julia", 25);
echo "Pessoa Pobre: <br>";
$pessoaPobre->exibeDados();
$pessoaPobre->trabalha();

echo "<hr>";

$pessoaMiseravel = new Miseravel("Pedro", 40);
echo "Pessoa Miserável: <br>";
$pessoaMiseravel->exibeDados();
$pessoaMiseravel->mendiga();

?>
