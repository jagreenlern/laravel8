
<?php

class pagar
{


    public function __construct()
    {
        
    }
public static function pagar($url="https://www.paypal.com/paypalme/pagarapablo",$tipopago="paypal")
{
    try {
        
  if ($tipopago=="paypal") {

    echo "<a href='".$url."' target='_blank' class='btn btn-info' role='button'><i class='icon-money icon-large'></i>".$tipopago."</a>";  

    
    }//if
    if ($tipopago=="stripe") {

//      echo "<a href='stripepagostarjeta/index.php?cantidad=0&descripcion=Productos Pablo Martín Martín' class='btn btn-info' role='button'><i class='icon-money icon-large'></i>Stripe</a>";
echo "<a href='".$url."' class='btn btn-info' target='_blank' role='button'><i class='icon-money icon-large'></i>".$tipopago."</a>";

      
      }//if
        

    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}//func





  }//class

?>
