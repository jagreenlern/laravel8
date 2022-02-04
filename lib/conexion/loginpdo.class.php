
<?php
//if(!isset($_COOKIE["PHPSESSID"]))
//{
//    session_start();
//}
//require_once "config/config.php";
class loginpdo{

    public $host;
    public $db;
    public $user;
    public $password;
    public $charset;
    public $rol;
    public $con;
    

    public function __construct($host = 'localhost',$db = 'login',    $user = 'root',$password = '',$charset = 'utf8mb4')
    {

        session_start();
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->password = $password;
        $this->charset = $charset;    }

    public function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            $this->con=$pdo;
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }//funcion




    public function login($username,$password,$encriptado=FALSE){
        try { 
            
            
    $sql= $this->con->prepare('SELECT * FROM usuarios WHERE usuario = :username AND password = :password');
          //$stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");
        $sql->execute(['username' => $username, 'password' => $password]);

        $row = $sql->fetch(PDO::FETCH_NUM);
        if ($encriptado==TRUE) 
        {
            //password_verify($password,$row[4], PASSWORD_BCRYPT);
            $password=$this->desencriptaropenssl($row[2]);
            
            
        }

        if($row == true){
            // validar rol
            $this->rol = $row[3];//$row[3];
            echo $this->rol;
            $_SESSION['rol'] = $this->rol;
            $_SESSION['usuario'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['foto']=$row[4];
            $_SESSION['email']=$row[5];
            switch($_SESSION['rol']){
                case "admin":
                    header("location: " . $baseurl . "admin/indexbootstrap.php");
                break;
    
                case "usuario":
                header("location: " . $baseurl . "usuario/indexbootstrap.php");
                break;
    
                default:
            }
        }else{
            // no existe el usuario
            echo "El usuario o contraseña son incorrectos";
        }
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        
      }

    }//fun

    public function encriptaropenssl($password){
        
        $encryptionMethod = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
        $secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
        
        //To encrypt
        $passwordencriptado = openssl_encrypt($password, $encryptionMethod, $secretHash);
        return $passwordencriptado;
        
        //To Decrypt
        //$decryptedMessage = openssl_decrypt($encryptedMessage, $encryptionMethod, $secretHash);
        
        //Result
        //echo "Encrypted: $encryptedMessage <br>Decrypted: $decryptedMessage";
    
    
}
public function desencriptaropenssl($password){
        
    $encryptionMethod = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
    $secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
    
    //To encrypt
    //$passwordencriptado = openssl_encrypt($password, $encryptionMethod, $secretHash);
    //return $passwordencriptado;
    
    //To Decrypt
    $passworddesenencriptado = openssl_decrypt($password, $encryptionMethod, $secretHash);
    return $passworddesenencriptado;
    //Result
    //echo "Encrypted: $encryptedMessage <br>Decrypted: $decryptedMessage";
}


    public function registro($username,$password,$rol,$foto,$email,$encriptado=FALSE){
        try {
            if ($encriptado== TRUE) $password = $thist->encriptaropenssl($password);
            //$this->con = connect();
            // set the PDO error mode to exception
            //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO usuarios (usuario, password, rol, foto, email)
            VALUES ('$username', '$password', '$rol', '$foto','$email')";
            // use exec() because no results are returned
            $this->con->exec($sql);
            
            echo "Nuevo usuario creado correctamente";
            //if ($rol=="admin")header("location: " . baseurl . "admin/indexbootstrap.php");
            //elseif ($rol=="usuario")  header("location: " . baseurl . "usuario/indexbootstrap.php");
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            
          }
          
    }

    public static function logout(){
try{
        session_unset("rol");
        session_unset("usuario");
        session_unset("password");
        session_unset("foto");
        session_unset("rol");
        session_unset("email");
       
        header("location: " . $baseurl . "loginbootstrap.php");
        
                //session_destroy();


            } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
                
              }
    }//funcion

    public static function comprobar ($rol)
{
try
{

//echo baseurl . $_SESSION['rol'];


if(!isset($_SESSION['rol'])){
    header("location: ". $baseurl ."loginbootstrap.php");
}else{
    if($_SESSION['rol'] != $rol){
       header("location: ". $baseurl ."loginbootstrap.php");
    }
    //elseif($_SESSION['rol'] != "usuario"){}
     //header('location: login.php');

}//if

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    
  }
    
}//FUNC
}//class

?>
