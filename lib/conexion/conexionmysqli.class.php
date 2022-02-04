<?php
class conexionmysqli {
	
	public $host = "localhost";

	public $user="root";
	public $passwordword='';
	public $db ='tblprod';
	# conectare la base de datos
    public $con=NULL;

	function __contruct($host="localhost",$user="root",$password="",$db="tblprod"){
	try
	{
	$this->host=$host;
	$this->user=$user;
	$this->password=$password;
	$this->db=$db;
} catch(Exception $e) {
  echo "Error: " . $e->getMessage();
    
  }

	}
	function conectar()
{
	try
	{
	$con=mysqli_connect($this->host, $this->user, $this->password, $this->db);
		//cuando la conexion es false es lo que quiere decir
		/*if(!$con){
			die("imposible conectarse: ".mysqli_error($con));
		}
		if (@mysqli_connect_errno()) {
			die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
		}*/
		return $con;
	} catch(Exception $e) {
		echo "Error: " . $e->getMessage();
		  
		}
	  
}

	
}
?>
