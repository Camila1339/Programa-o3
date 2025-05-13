<?PHP
 class Caneta{
    private $ponta;
    public $cor;

     public function __construct( $ponta, $cor){
        $this->ponta=$ponta;
        $this->cor = $cor;
    }
    public function getPonta (){
    echo "Ponta da caneta: " . $this->ponta . "<br><br>";
    }
    public function setPonta($ponta){
         $this->ponta = $ponta;
    }
    public function getcor (){
        echo "Cor da caneta: " . $this->cor . "<br><br>";
        }
    public function setcor($cor){
            $this->cor = $cor;
       }
    public function MostraCaneta (){
       echo"<br>##### <br>Caneta: <br> Ponta: " . $this->ponta;
       echo"<br>Cor". $this->cor;
        }
    
        
}
$c1 = new Caneta(10, "branca");
$c1-> getPonta();
$c1-> getcor();
$c1-> setcor("azul");
$c1-> getcor();
$c1-> MostraCaneta();

$c2 = new Caneta(0.5,"amarelo");
$c2->MostraCaneta();

?>