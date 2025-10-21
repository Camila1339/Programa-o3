<?php
//exercício 1 
abstract class Pessoa {
    protected $nome;
    protected $idade;
    protected $sexo;

    public function __construct($nome, $idade, $sexo) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->sexo = $sexo;
    }
    
    final public function fazerAniversario() {
        $this->idade++;
        echo "<p>Parabéns, {$this->nome}! Agora você tem {$this->idade} anos.</p>";
    }

    abstract public function apresentar();
}

//exercício 2 
class Visitante extends Pessoa {
    public function apresentar() {
        echo "<p>Sou um visitante chamado {$this->nome}.</p>";
    }
}

//exercício 3
class Aluno extends Pessoa {
    protected $matricula;
    protected $curso;

    public function __construct($nome, $idade, $sexo, $matricula, $curso) {
        parent::__construct($nome, $idade, $sexo);
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    public function apresentar() {
        echo "<p>Sou o aluno {$this->nome}, do curso de {$this->curso}.</p>";
    }

    public function pagarMensalidade() {
        echo "<p>Mensalidade de {$this->nome} paga com sucesso!</p>";
    }
}

//exercício 4
class Bolsista extends Aluno {
    private $bolsa;

    public function __construct($nome, $idade, $sexo, $matricula, $curso, $bolsa) {
        parent::__construct($nome, $idade, $sexo, $matricula, $curso);
        $this->bolsa = $bolsa;
    }

    public function renovarBolsa() {
        echo "<p>Bolsa renovada para {$this->nome}!</p>";
    }

    // polimorfismo
    public function pagarMensalidade() {
        echo "<p>{$this->nome} é bolsista! Pagamento com desconto de {$this->bolsa}%.</p>";
    }
}

//exercício 5
final class Professor extends Pessoa {
    private $especialidade;
    private $salario;

    public function __construct($nome, $idade, $sexo, $esp, $salario) {
        parent::__construct($nome, $idade, $sexo);
        $this->especialidade = $esp;
        $this->salario = $salario;
    }

    public function apresentar() {
        echo "<p>Sou o professor {$this->nome}, especialista em {$this->especialidade}.</p>";
    }

    public function receberAumento($valor) {
        $this->salario += $valor;
        echo "<p>O salário de {$this->nome} foi reajustado para R$ {$this->salario}.</p>";
    }
}


$visitante1 = new Visitante("Luis", 21, "M");
$visitante1->apresentar();
$visitante1->fazerAniversario();

$aluno1 = new Aluno("Marina", 18, "F", "2025001", "Informática");
$aluno1->apresentar();
$aluno1->pagarMensalidade();
$aluno1->fazerAniversario();

$bolsista1 = new Bolsista("Pedro", 19, "M", "2025002", "Informática", 50);
$bolsista1->apresentar();
$bolsista1->pagarMensalidade(); 
$bolsista1->renovarBolsa();

$prof1 = new Professor("Carol", 35, "F", "Programação", 4500);
$prof1->apresentar();
$prof1->receberAumento(500);
$prof1->fazerAniversario();

$objetos = [$visitante1, $aluno1, $bolsista1, $professor1];

foreach ($objetos as $obj) {
   
    echo "Classe: " . get_class($obj) . "<br>";

    if ($obj instanceof Pessoa) echo "É uma Pessoa<br>";
    if ($obj instanceof Aluno) echo "É um Aluno<br>";
    if ($obj instanceof Bolsista) echo "É um Bolsista<br>";
    if ($obj instanceof Professor) echo "É um Professor<br>";
}
?>
