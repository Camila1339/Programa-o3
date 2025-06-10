
<?php
//exercicio 1
class Livro {
    private string $titulo;
    private string $autor;
    private int $ano_publi;
    private bool $disponivel;
    protected ?string $leitorAtual = null;

    public function __construct(string $titulo, string $autor, int $anoPublicacao, bool $disponivel = true) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano_publi = $anoPublicacao;
        $this->disponivel = $disponivel;
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }

    public function getAutor(): string {
        return $this->autor;
    }

    public function setAutor(string $autor): void {
        $this->autor = $autor;
    }

    public function getAnoPublicacao(): int {
        return $this->ano_publi;
    }

    public function setAnoPublicacao(int $anoPublicacao): void {
        $this->ano_publi = $anoPublicacao;
    }

    public function isDisponivel(): bool {
        return $this->disponivel;
    }

    public function setDisponivel(bool $disponivel): void {
        $this->disponivel = $disponivel;
    }

    public function exibirInformacoes(): void {
        echo "Título: " . $this->titulo . "<br>";
        echo "Autor: " . $this->autor . "<br>";
        echo "Ano de Publicação: " . $this->ano_publi . "<br>";
        echo "Disponível: " . ($this->disponivel ? "Sim" : "Não") . "<br>";
        if ($this->leitorAtual !== null) {
            echo "Leitor Atual: " . $this->leitorAtual . "<br>";
        }
    }
//exercicio 2
    public function emprestar(string $nomeLeitor): void {
        if ($this->disponivel) {
            $this->disponivel = false;
            $this->leitorAtual = $nomeLeitor;
            echo "Livro '" . $this->titulo . "' emprestado para " . $nomeLeitor . " com sucesso.<br>";
        } else {
            echo "Livro '" . $this->titulo . "' já está emprestado.<br>";
        }
    }

    public function devolver(): void {
        $this->disponivel = true;
        $this->leitorAtual = null;
        echo "Livro '" . $this->titulo . "' devolvido com sucesso.<br>";
    }

    public function estaDisponivel(): string {
        return "O livro '" . $this->titulo . "' está " . ($this->disponivel ? "disponível" : "emprestado") . " para empréstimo.<br>";
    }

    public function quemPegou(): ?string {
        return $this->leitorAtual;
    }
}
//exercicio 3
class Leitor {
    private string $nome;
    private string $email;
    private string $telefone;

    public function __construct(string $nome, string $email, string $telefone) {
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function exibirLeitor(): void {
        echo "Nome: " . $this->nome . "<br>";
        echo "Email: " . $this->email . "<br>";
        echo "Telefone: " . $this->telefone . "<br>";
    }
}
    //exercicio 4 e 5
class Biblioteca {
    public string $nomeBiblioteca;
    private array $livros = [];
    private array $leitores = [];

    public function __construct(string $nomeBiblioteca) {
        $this->nomeBiblioteca = $nomeBiblioteca;
    }

    public function adicionarLivro(Livro $livro): void {
        $this->livros[] = $livro;
    }

    public function adicionarLeitor(Leitor $leitor): void {
        $this->leitores[] = $leitor;
    }

    public function listarLivros(): void {
        echo "<h3>Livros na Biblioteca " . $this->nomeBiblioteca . ":</h3>";
        if (empty($this->livros)) {
            echo "Nenhum livro cadastrado.<br>";
            return;
        }
        foreach ($this->livros as $livro) {
            $livro->exibirInformacoes();
            echo "<br>";
        }
    }

    public function listarLeitores(): void {
        echo "<h3>Leitores da Biblioteca " . $this->nomeBiblioteca . ":</h3>";
        if (empty($this->leitores)) {
            echo "Nenhum leitor cadastrado.<br>";
            return;
        }
        foreach ($this->leitores as $leitor) {
            $leitor->exibirLeitor();
            echo "<br>";
        }
    }

    public function emprestarLivro(Livro $livro, Leitor $leitor): void {
        if (in_array($livro, $this->livros) && in_array($leitor, $this->leitores)) {
            $livro->emprestar($leitor->getNome());
        } else {
            echo "Livro ou Leitor não cadastrado na biblioteca.<br>";
        }
    }

    public function devolverLivro(Livro $livro): void {
        if (in_array($livro, $this->livros)) {
            $livro->devolver();
        } else {
            echo "Livro não cadastrado na biblioteca.<br>";
        }
    }
}

// Cenário Completo:
$biblioteca = new Biblioteca("Biblioteca Comunitária");

$livro1 = new Livro("Dom Quixote", "Miguel de Cervantes", 1605);
$livro2 = new Livro("1984", "George Orwell", 1949);
$livro3 = new Livro("Orgulho e Preconceito", "Jane Austen", 1813);

$leitor1 = new Leitor("João da Silva", "joao@example.com", "123-456-7890");
$leitor2 = new Leitor("Maria Souza", "maria@example.com", "987-654-3210");

$biblioteca->adicionarLivro($livro1);
$biblioteca->adicionarLivro($livro2);
$biblioteca->adicionarLivro($livro3);

$biblioteca->adicionarLeitor($leitor1);
$biblioteca->adicionarLeitor($leitor2);

$biblioteca->listarLivros();
$biblioteca->listarLeitores();

echo "<br><h3>Simulação de Empréstimo e Devolução:</h3>";
$biblioteca->emprestarLivro($livro1, $leitor1);
$livro1->exibirInformacoes();
$biblioteca->devolverLivro($livro1);
$livro1->exibirInformacoes();

echo "<br><h3>Tentativa de Empréstimo de Livro não Cadastrado:</h3>";
$livro4 = new Livro("Novo Livro", "Novo Autor", 2023);
$biblioteca->emprestarLivro($livro4, $leitor1);

echo "<br><h3>Tentativa de Empréstimo com Leitor não Cadastrado:</h3>";
$leitor3 = new Leitor("Novo Leitor", "novo@example.com", "111-222-3333");
$biblioteca->emprestarLivro($livro1, $leitor3);

?>
