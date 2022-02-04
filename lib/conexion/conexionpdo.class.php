
<?php
//if(!isset($_COOKIE["PHPSESSID"]))
//{
//    session_start();
//}
//require_once "config/config.php";


class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

class conexionpdo{

    public $host;
    public $db;
    public $user;
    public $password;
    public $charset;
    public $rol;
    public $con;
    

    public function __construct($host = 'localhost',$db = 'tblprod',    $user = 'root',$password = '',$charset = 'utf8mb4')
    {
        //session_start();
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->password = $password;
        $this->charset = $charset;
        $this->con;
    }

    public function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,//vale para evitar inyecciones pdo
            ];
            //$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            $this->con=$pdo;
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }//funcion

    
    
public function querytabla($sql,$htmlheader="<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>")
{
    try {
        //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //mysqli_real_escape_string($this->con,$sql);
        
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
    
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
         /* Comprobar el número de filas que coinciden con la sentencia SELECT */
  if (count($result) > 0) {

    echo "<table style='border: solid 1px black;'>";
    echo "$htmlheader";

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
         echo $v;
    }
    
    }//if
        

    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}//func




public function query($sql,$tipoconsulta="insertar")
{
    try {
        
        //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //mysqli_real_escape_string($this->con,$sql);
        
       $stmt = $this->con->prepare($sql);
        $stmt->execute();
    
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            if ($tipoconsulta == "insertar") {
            echo "Registro insertado.";

            }elseif ($tipoconsulta == "borrar") {
                echo "Registro borrado.";
    
                }
                if ($tipoconsulta == "actualizar") {
                    echo "Registro actualizado.";
                 
        
                    }

            return count($result);
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}//func

/*
function connect ()
{
    try
    {

        $pdo = new PDO ("mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset, $this->user, $this->password);
    }
    catch (PDOException $e)
    {
        $this->SQL_Error ($e);
    }

    $pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Returned values are only indexed by column name.
    // Set it to PDO::FETCH_BOTH if you also want to have the 0-indexed column number in your result.
    // $pdo->setAttribute (PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $this->con=$pdo;
    return $pdo;
    
}*/
//values es para retornar valor o no
function sqlexec ($query, $values = FALSE)
{
    try
    {
        if (!$values)
        {
            
            $retorno = $this->con->exec ($query);
            return $retorno;

        }
        else
        {
            $retorno = $this->con->exec ($query);
            
            
            $retorno= null;
            return $retorno;
        }
    }
    catch (PDOException $e)
    {
        $this->sqlerror ($e, $query);
    }
}
/*No usar usar sql id=2
function fetch ($query, $values = false)
{
    try
    {    
        if (!$values)
        {
            return $this->con->query ($query)->fetch();
        }
        else
        {
            $stmt = $this->con->prepare ($query);
            $stmt->execute ($values);
            $arr = $stmt->fetch ();
            $stmt = null;    
            return $arr;
        }
    }    
    catch (PDOException $e)
    {
        $this->SQL_Error ($e, $query);
    }
}
*/  
function fetchall($query)
{
    try
    {
        $stmt = $this->con->prepare ($query);
       
        $arr = $stmt->execute ();
        $arr = $stmt->fetchAll ();
        //$arr = null;    
        return $arr;
    }    
    catch (PDOException $e)
    {
        $this->sqlerror ($e, $query);
    }
}


 
function fetchalltable($query, $htmlheader)
{
    try
    {
        $stmt = $this->con->prepare ($query);
        
            $arr=$stmt->execute ();
        
        
        $arr = $stmt->fetchAll ();
        echo "<table style='border: solid 1px black;'>";
       
        echo "$htmlheader";
      
        foreach ($arr as $registro)
        {
              echo "<tr>";
            echo "<td>";
            echo $registro["id"];
            echo "</td>";
            echo "<td>";
            echo $registro["prod_code"];
            echo "</td>";
            echo "<td>";
            echo $registro["prod_name"];
            echo "</td>";
            echo "<td>";
            echo $registro["prod_ctry"];
            echo "</td>";
            echo "<td>";
            echo $registro["prod_qty"];
            echo "</td>";
            echo "<td>";
            echo $registro["price"];
            echo "</td>";
      echo "</tr>";
            
        }
             
             echo "</table>";
           
        return $arr;
    }    
    catch (PDOException $e)
    {
        $this->sqlerror ($e, $query);
    }
}
function sqllastID ()
{
    return $this->con->lastInsertId();
}

function sqlerror ($e, $query)
{
    echo "<pre>";
    
    if (defined ("PDO_DEBUG"))
    {
        echo "SQL Error: " . $e->getMessage() . "\n\n";
    
        if (PDO_DEBUG >= "2")
        {
            echo "$query\n\n";
        }
        
        if (PDO_DEBUG == "3")
        {
            // Print details like script name and line.
            print_r ($e);
        }
    }
    else
    {
        echo "SQL Error! Please contact the administrator.";
    }

    echo "</pre>";

    // Stop on error.
    exit;
}//func


  }//class

?>
