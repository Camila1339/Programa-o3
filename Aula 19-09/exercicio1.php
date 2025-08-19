<?php
class Funcionario {
    public $nome; 
    public $salario;

    public function __construct($nome, $salario) {
        $this->nome = $nome;
        $this->salario = $salario;
    }

    public function addAumento($valor) {
        $this->salario += $valor; 
    }

    public function ganhoAnual() {
        return $this->salario * 12; 
    }

    public function exibeDados() {
        echo "Nome: " . $this->nome . "<br>";
        echo "Salário: R$ " . number_format($this->salario, 2, ',', '.') . "<br>";
    }
}


class Assistente extends Funcionario {
    private $matricula;

    public function __construct($nome, $salario, $matricula) {
        parent::__construct($nome, $salario); 
        $this->matricula = $matricula;
    }

    public function getMatricula() {
        return $this->matricula; 
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula; 
    }

    public function exibeDados() {
        parent::exibeDados(); 
        echo "Matrícula: " . $this->matricula . "<br>";
    }
}

class Tecnico extends Assistente {
    private $bonus;

    public function __construct($nome, $salario, $matricula, $bonus) {
        parent::__construct($nome, $salario, $matricula);
        $this->bonus = $bonus; 
    }

    public function ganhoAnual() {
        return parent::ganhoAnual() + $this->bonus; 
    }
}


class Administrativo extends Assistente {
    private $turno; 
    private $adicionalNoturno;

    public function __construct($nome, $salario, $matricula, $turno, $adicionalNoturno) {
        parent::__construct($nome, $salario, $matricula);
        $this->turno = $turno; 
        $this->adicionalNoturno = $adicionalNoturno; 
    }

    public function ganhoAnual() {
        return parent::ganhoAnual() + $this->adicionalNoturno; 
    }

    public function exibeDados() {
        parent::exibeDados(); 
        echo "Turno: " . $this->turno . "<br>";
        echo "Adicional Noturno: R$ " . number_format($this->adicionalNoturno, 2, ',', '.') . "<br>";
    }
}

// Exemplo de uso
$tecnico = new Tecnico("Carlos", 3000, "T123", 500);
echo "Técnico:<br>";
$tecnico->exibeDados();
echo "Ganho Anual: R$ " . number_format($tecnico->ganhoAnual(), 2, ',', '.') . "<br><br>";

$administrativo = new Administrativo("Ana", 2500, "A456", "noite", 200);
echo "Administrativo:<br>";
$administrativo->exibeDados();
echo "Ganho Anual: R$ " . number_format($administrativo->ganhoAnual(), 2, ',', '.') . "<br>";
?>


