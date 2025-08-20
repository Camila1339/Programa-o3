<?php
// ex1
class Funcionario{
    private $nome;
    private $salario;

    function __construct($nome, $salario){
        $this->nome = $nome;
        $this->salario = $salario;
    }

    function setFuncionario($nome, $salario){
        $this->nome = $nome;
        $this->salario = $salario;
    }

    function getFuncionario(){
        return $this->nome . ", " . $this->salario;
    }

    function addAumento(float $valor){
        $this->salario += $valor;
    }
    
    function ganhoAnual(){
        return $this->salario * 12;
    }

    function exibeDados(){
        echo "Nome: " . $this->nome . "<br>";
        echo "Salário: " . $this->salario . "<br>";
        echo "Ganho Anual: " . $this->ganhoAnual() . "<br>";
    }
}

class Assistente extends Funcionario{
    private $matricula;

    function __construct($nome, $salario, $matricula){
        $this->nome = $nome;
        $this->salario = $salario;
        $this->matricula = $matricula;
    }

    function setAssistente($nome, $salario, $matricula){
        $this->nome = $nome;
        $this->salario = $salario;
        $this->matricula = $matricula;
    }

    function getAssistente(){
        return $this->nome . ", " . $this->salario . ", " . $this->matricula;
    }

    function exibeDados(){
        echo "Nome: " . $this->nome . "<br>";
        echo "Salário: " . $this->salario . "<br>";
        echo "Matrícula: " . $this->matricula . "<br>";
    }
}

class Assistente_Tecnico extends Assistente{
    private $bonus;

    function __construct($nome, $salario, $matricula, $bonus = 0){
        parent::__construct($nome, $salario, $matricula);
        $this->bonus = $bonus;
    }

    function setBonus($bonus){
        $this->bonus = $bonus;
    }

    function ganhoAnual(){
        return ($this->salario + $this->bonus) * 12;
    }
}

class Assistente_Administrativo extends Assistente{
    function __construct($nome, $salario, $matricula, $ganhoTurnoExtra = 0){
        parent::__construct($nome, $salario, $matricula);
        $this->ganhoTurnoExtra = $ganhoTurnoExtra;
    }

    function ganhoAnual(){
        return ($this->salario + $this->ganhoTurnoExtra) * 12;
    }
}

$Funcionario = new Funcionario("Marcos Silva", 3500);
echo "Funcionário:<br>";
$Funcionario->exibeDados();
$Funcionario->addAumento(500);
echo "Após aumento:<br>";
$Funcionario->exibeDados();

$Assistente = new Assistente("Fernada Costa", 2500, "AS1001");
echo "<br>Assistente:<br>";
$Assistente->exibeDados();
$Assistente->addAumento(300);
echo "Após aumento:<br>";
$Assistente->exibeDados();

$Assistente_Tecnico = new Assistente_Tecnico("Robert Alves", 2500, "TEC2002", 200);
echo "<br>Assistente Técnico:<br>";
$Assistente_Tecnico->exibeDados();
echo "Ganho Anual com bônus: " . $Assistente_Tecnico->ganhoAnual();
echo"<br>";
$Assistente_Administrativo = new Assistente_Administrativo("Juliana Borges", 1900, "ADM3003", 150);
echo "<br>Assistente Administrativo:<br>";

$Assistente_Administrativo->exibeDados();
echo "Ganho Anual com turno extra: " . $Assistente_Administrativo->ganhoAnual() . "<br>";
echo "<hr>";
//ex2
//exercico a
class Animal{
    private $nome;
    private $raca;

    function __construct($nome, $raca){
        $this->nome = $nome;
        $this->raca = $raca;
    }

    function setAnimal($nome, $raca){
        $this->nome = $nome;
        $this->raca = $raca;
    }

    function getAnimal(){
        return $this->nome . ", " . $this->raca;
    }

    function exibeDados(){
        echo "Nome: " . $this->nome . "<br>";
        echo "Raça: " . $this->raca . "<br>";
    }

    function caminha(){
        echo $this->nome . " está caminhando.<br>";
    }
}

class Cachorro extends Animal{
    function __construct($nome, $raca){
        parent::__construct($nome, $raca);
    }

    function late(){
        echo "O cachorro está latindo.<br>"; 
    }
}

class Gato extends Animal{
    function mia(){
        echo "A gata está miando.<br>";
    }
}

$Cachorro = new Cachorro("Scott", "pinscher");
$Cachorro->exibeDados();
$Cachorro->caminha();
$Cachorro->late();
echo"<br>";
$Gato = new Gato("Frida", "Frajola");
$Gato->exibeDados();
$Gato->caminha();
$Gato->mia();
echo "<hr>";

//exercicio b
class Pessoa{
    protected $nome;
    protected $idade;

    function __construct($nome, $idade){
        $this->nome = $nome;
        $this->idade = $idade;
    }

    function setPessoa($nome, $idade){
        $this->nome = $nome;
        $this->idade = $idade;
    }

    function getPessoa(){
        return $this->nome . ", " . $this->idade;
    }

    function exibeDados(){
        echo "Nome: " . $this->nome . "<br>";
        echo "Idade: " . $this->idade . "<br>";
    }
}

class Rica extends Pessoa{
    private $dinheiro;

    function fazCompras(){
        echo $this->nome . " está fazendo compras.<br>";
    }
}

class Pobre extends Pessoa{
    private $trabalho;

    function trabalha(){
        echo $this->nome . " está trabalhando.<br>";
    }
}

class Miseravel extends Pessoa{
    function Mendiga(){
        echo $this->nome . " está mendigando.<br>";
    }
}

$Rica = new Rica("Madalena", 50);
$Rica->exibeDados();
$Rica->fazCompras();
echo"<br>";
$Pobre = new Pobre("Matheus", 25);
$Pobre->exibeDados();
$Pobre->trabalha();
echo"<br>";
$Miseravel = new Miseravel("João", 59);
$Miseravel->exibeDados();
$Miseravel->Mendiga();
echo "<hr>";

//ex3

class Ingresso {
    protected $valor;

    function __construct($valor) {
        $this->valor = $valor;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function getValor() {
        return $this->valor;
    }

    function imprimeValor() {
        echo "Valor do ingresso: R$ " . number_format($this->valor, 2, ',', '.') . "<br>";
    }
}

class IngressoVIP extends Ingresso {
    private $valorAdicional;

    function __construct($valor, $valorAdicional) {
        parent::__construct($valor);
        $this->valorAdicional = $valorAdicional;
    }

    function setValorAdicional($valorAdicional) {
        $this->valorAdicional = $valorAdicional;
    }

    function getValorAdicional() {
        return $this->valorAdicional;
    }

    function imprimeValor() {
        $total = $this->getValor() + $this->valorAdicional;
        echo "Valor do ingresso VIP: R$ " . number_format($total, 2, ',', '.') . "<br>";
    }
}

class IngressoNormal extends Ingresso {
    function imprimeDeclaracao() {
        echo "Ingresso Normal<br>";
    }

    function imprimeValor() {
        parent::imprimeValor();
    }
}

class CamaroteInferior extends IngressoVIP {
    private $localizacao;

    function __construct($valor, $valorAdicional, $localizacao) {
        parent::__construct($valor, $valorAdicional);
        $this->localizacao = $localizacao;
    }

    function setLocalizacao($localizacao) {
        $this->localizacao = $localizacao;
    }

    function getLocalizacao() {
        return $this->localizacao;
    }

    function imprimeValor() {
        $total = $this->getValor() + $this->getValorAdicional();
        echo "Valor do Camarote Inferior: R$ " . number_format($total, 2, ',', '.') . "<br>";
    }

    function imprimeLocalizacao() {
        echo "Localização: " . $this->localizacao . "<br>";
    }
}

class CamaroteSuperior extends IngressoVIP {
    private $localizacao;

    function __construct($valor, $valorAdicional, $localizacao) {
        parent::__construct($valor, $valorAdicional);
        $this->localizacao = $localizacao;
    }

    function setLocalizacao($localizacao) {
        $this->localizacao = $localizacao;
    }

    function getLocalizacao() {
        return $this->localizacao;
    }

    function imprimeValor() {
        $total = $this->getValor() + $this->getValorAdicional();
        echo "Valor do Camarote Superior: R$ " . number_format($total, 2, ',', '.') . "<br>";
    }

    function imprimeLocalizacao() {
        echo "Localização: " . $this->localizacao . "<br>";
    }
}   

$ingressoNormal = new IngressoNormal(75);
$ingressoNormal->imprimeDeclaracao();
$ingressoNormal->imprimeValor();
echo "<br>";

$ingressoVIP = new IngressoVIP(150, 50);
$ingressoVIP->imprimeValor();
echo "<br>";

$camaroteInferior = new CamaroteInferior(200, 80, "Setor A");
$camaroteInferior->imprimeValor();
$camaroteInferior->imprimeLocalizacao();
echo "<br>";

$camaroteSuperior = new CamaroteSuperior(200, 160, "Setor C");
$camaroteSuperior->imprimeValor();
$camaroteSuperior->imprimeLocalizacao();
echo "<hr>";

//ex4

class Imovel{
    private $endereco;
    protected $preco;

    function __construct($endereco, $preco){
        $this->endereco = $endereco;
        $this->preco = $preco;
    }

    function setImovel($endereco, $preco){
        $this->endereco = $endereco;
        $this->preco = $preco;
    }

    function getImovel(){
        return "Endereço: " . $this->endereco . ", Preço: R$ " . number_format($this->preco, 2, ',', '.');
    }

    function exibeDados(){
        echo "Endereço: " . $this->endereco . "<br>";
        echo "Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }
}

class Novo extends Imovel{
    private $valorAdicional;

    function __construct($endereco, $preco, $valorAdicional){
        parent::__construct($endereco, $preco);
        $this->valorAdicional = $valorAdicional;
    }

    function setValorAdicional($valorAdicional){
        $this->valorAdicional = $valorAdicional;
    }

    function getValorAdicional(){
        return $this->valorAdicional;
    }

    function exibeDados(){
        parent::exibeDados();
        echo "Valor Adicional: R$ " . number_format($this->valorAdicional, 2, ',', '.') . "<br>";
        echo "Preço Total: R$ " . number_format($this->preco + $this->valorAdicional, 2, ',', '.') . "<br>";
    }
}

class Velho extends Imovel{
    private $desconto;

    function __construct($endereco, $preco, $desconto){
        parent::__construct($endereco, $preco);
        $this->desconto = $desconto;
    }

    function setDesconto($desconto){
        $this->desconto = $desconto;
    }

    function getDesconto(){
        return $this->desconto;
    }

    function exibeDados(){
        parent::exibeDados();
        echo "Desconto: R$ " . number_format($this->desconto, 2, ',', '.') . "<br>";
        echo "Preço Final: R$ " . number_format($this->preco - $this->desconto, 2, ',', '.') . "<br>";
    }
}

$Novo = new Novo("Rua 7 de Abril, 1227", 400000, 50000);
$Novo->exibeDados();
echo "<br>";
$Velho = new Velho("Rua 9 de setembro, 456", 600000, 30000);
$Velho->exibeDados();
echo "<hr>";

//ex5
class Teste {
    function Main() {
        $Assistente_Tecnico2 = new Assistente_Tecnico("Carlos Almeida", 2700 , "TC2003");
        echo "<br>Assistente Técnico<br>";
        $Assistente_Tecnico2->exibeDados(); 
        $Cachorro2 = new Cachorro("Anakin", "Pitbull");
        echo "<br>Cachorro<br>";
        $Cachorro2->exibeDados();
        $Cachorro2->late();
        $Cachorro2->caminha();
        $Gato2 = new Gato("Íris", "Malhado");
        echo "<br>Gata<br>";
        $Gato2->exibeDados();
        $Gato2->mia();
        $Gato2->caminha();
        $Rica2 = new Rica("Ana", 35);
        echo "<br>Rica<br>";
        $Rica2->exibeDados();
        $Rica2->fazCompras();
        $Pobre2 = new Pobre("Jorge", 28);
        echo "<br>Pobre<br>";
        $Pobre2->exibeDados();
        $Pobre2->trabalha();
        $Miseravel2 = new Miseravel("João", 45);
        echo "<br>Miserável<br>";
        $Miseravel2->exibeDados();  
        $Miseravel2->mendiga();
    }
}
$Teste = new Teste();
$Teste->Main();
?> 
