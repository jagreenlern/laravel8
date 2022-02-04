<?php
require_once "lib/controleshtml/controleshtml.php";
error_reporting(0);
$src="";






//cambiar aqui
if (isset($_FILES["imagen"]))
//IMPORTANTISIMO PORQUE SE PASAN AMBOS HAY QUE CREAR UN FORM PARA CADA CONTROL DE SUBIDA
  //AUNQUE NO LO RELLENES;

{
   $reporte = null;
   //cambiar aqui
     for($x=0; $x<count($_FILES["imagen"]["name"]); $x++)
    {
        //cambiar aqui
      $file = $_FILES["imagen"];
      $nombre = $file["name"][$x];
      $tipo = $file["type"][$x];
      $ruta_provisional = $file["tmp_name"][$x];
      echo $ruta_provisional. $file["tmp_name"][$x] . "<br>";
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "upload/";    

      //if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        echo $nombre . "<br>";
      $icomprobar = new controlform\formvalidate($nombre,"imagen");

      if ($icomprobar->validate()) echo "validado";
else
{
echo "no  validado o no enviado";

}
      //if ($icomprobar->validate())
      //{
       //   echo "enviada imagen";
       //   echo "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
     // }
      if($size > 1024*1024)
      {
          echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1mb</p>";
      }
      else if($width > 1500 || $height > 1500)
      {
          echo "<p style='color: red'>Error $nombre, la anchura y la altura máxima permitida es de 500px</p>";
      }
      else if($width < 60 || $height < 60)
      {
          echo "<p style='color: red'>Error $nombre, la anchura y la altura mínima permitida es de 60px</p>";
      }
      
      
          $src = $carpeta.$nombre;
          if(!file_exists($carpeta)) mkdir ($carpeta);

          //Caragamos imagenes al servidor
          if(file_exists($src)){
            
            echo "<br>el archivo existe:".$src;
          }
          else move_uploaded_file($ruta_provisional, $src); //SOBREESCRIBE

          //Codigo para insertar imagenes a tu Base de datos.
          //Sentencia SQL

          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
        
        
    }
    
    
}//if
 








if (isset($_FILES["imagenes"]))
{
  //IMPORTANTISIMO PORQUE SE PASAN AMBOS HAY QUE CREAR UN FORM PARA CADA CONTROL DE SUBIDA
  //AUNQUE NO LO RELLENES;

     $reporte = null;
   //cambiar aqui
     for($x=0; $x<count($_FILES["imagenes"]["name"]); $x++)
    {
        //cambiar aqui
      $file = $_FILES["imagenes"];
      $nombre = $file["name"][$x];
      $tipo = $file["type"][$x];
      $ruta_provisional = $file["tmp_name"][$x];
      echo $ruta_provisional. $file["tmp_name"][$x] . "<br>";
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "upload/";    

      //if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        echo $nombre . "<br>";
      $icomprobar = new controlform\formvalidate($nombre,"imagen");
      

    if (  $icomprobar->validate()) echo "validado";
else
{
echo "no  validado o no enviado";

}
      //if ($icomprobar->validate())
      //{
       //   echo "enviada imagen";
       //   echo "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
     // }
      if($size > 1024*1024)
      {
          echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1mb</p>";
      }
      else if($width > 1500 || $height > 1500)
      {
          echo "<p style='color: red'>Error $nombre, la anchura y la altura máxima permitida es de 500px</p>";
      }
      else if($width < 60 || $height < 60)
      {
          echo "<p style='color: red'>Error $nombre, la anchura y la altura mínima permitida es de 60px</p>";
      }
      
      
          $src = $carpeta.$nombre;
          if(!file_exists($carpeta)) mkdir ($carpeta);

          //Caragamos imagenes al servidor
          if(file_exists($src)){
            
            echo "<br>el archivo existe:".$src;
          }
          else move_uploaded_file($ruta_provisional, $src); //SOBREESCRIBE
 

          //Codigo para insertar imagenes a tu Base de datos.
          //Sentencia SQL

          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
         
      
    }
    
  
}//funcion









if (isset($_FILES["words"]))
{
  //IMPORTANTISIMO PORQUE SE PASAN AMBOS HAY QUE CREAR UN FORM PARA CADA CONTROL DE SUBIDA
  //AUNQUE NO LO RELLENES;

     $reporte = null;
   //cambiar aqui
     for($x=0; $x<count($_FILES["words"]["name"]); $x++)
    {
        //cambiar aqui
      $file = $_FILES["words"];
      $nombre = $file["name"][$x];
      $tipo = $file["type"][$x];
      $ruta_provisional = $file["tmp_name"][$x];
      echo $ruta_provisional. $file["tmp_name"][$x] . "<br>";
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "upload/";    

      //if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        echo $nombre . "<br>";
      $icomprobar = new controlform\formvalidate($nombre,"word");

    if (  $icomprobar->validate()) echo "validado";
else
{
echo "no  validado o no enviado";

}
      //if ($icomprobar->validate())
      //{
       //   echo "enviada imagen";
       //   echo "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
     // }
      
          $src = $carpeta.$nombre;
          if(!file_exists($carpeta)) mkdir ($carpeta);

          //Caragamos imagenes al servidor
          if(file_exists($src)){
                      
            echo "<br>el archivo existe:".$src;
          }
          else move_uploaded_file($ruta_provisional, $src); //SOBREESCRIBE

          //Codigo para insertar imagenes a tu Base de datos.
          //Sentencia SQL

          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
         
      
    }
    
  
}//funcion







if (isset($_FILES["videos"]))
{
  //IMPORTANTISIMO PORQUE SE PASAN AMBOS HAY QUE CREAR UN FORM PARA CADA CONTROL DE SUBIDA
  //AUNQUE NO LO RELLENES;

     $reporte = null;
   //cambiar aqui
     for($x=0; $x<count($_FILES["videos"]["name"]); $x++)
    {
        //cambiar aqui
      $file = $_FILES["videos"];
      $nombre = $file["name"][$x];
      $tipo = $file["type"][$x];
      $ruta_provisional = $file["tmp_name"][$x];
      echo $ruta_provisional. $file["tmp_name"][$x] . "<br>";
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "upload/";    

      //if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        echo $nombre . "<br>";
        //cambiar
      $icomprobar = new controlform\formvalidate($nombre,"video");

    if (  $icomprobar->validate()) echo "validado";
else
{
echo "no  validado o no enviado";

}
      //if ($icomprobar->validate())
      //{
       //   echo "enviada imagen";
       //   echo "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
     // }
      
      
          $src = $carpeta.$nombre;
          if(!file_exists($carpeta)) mkdir ($carpeta);

          //Caragamos imagenes al servidor
          if(file_exists($src)){
                      
            echo "<br>el archivo existe:".$src;
          }
          else move_uploaded_file($ruta_provisional, $src); //SOBREESCRIBE

          //Codigo para insertar imagenes a tu Base de datos.
          //Sentencia SQL

          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
         
      
    }
    
  
}//funcion






if (isset($_FILES["sonidos"]))
{
  //IMPORTANTISIMO PORQUE SE PASAN AMBOS HAY QUE CREAR UN FORM PARA CADA CONTROL DE SUBIDA
  //AUNQUE NO LO RELLENES;

     $reporte = null;
   //cambiar aqui
     for($x=0; $x<count($_FILES["sonidos"]["name"]); $x++)
    {
        //cambiar aqui
      $file = $_FILES["sonidos"];
      $nombre = $file["name"][$x];
      $tipo = $file["type"][$x];
      $ruta_provisional = $file["tmp_name"][$x];
      echo $ruta_provisional. $file["tmp_name"][$x] . "<br>";
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "upload/";    

      //if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        echo $nombre . "<br>";
      $icomprobar = new controlform\formvalidate($nombre,"sonido");

    if (  $icomprobar->validate()) echo "validado";
else
{
echo "no  validado o no enviado";

}
      //if ($icomprobar->validate())
      //{
       //   echo "enviada imagen";
       //   echo "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
     // }
      
      
          $src = $carpeta.$nombre;
          if(!file_exists($carpeta)) mkdir ($carpeta);

          //Caragamos imagenes al servidor
          if(file_exists($src)){
            
            echo "<br>el archivo existe:".$src;
          }
          else move_uploaded_file($ruta_provisional, $src); //SOBREESCRIBE


          //Codigo para insertar imagenes a tu Base de datos.
          //Sentencia SQL

          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
         
      
    }
    
  
}//funcion












if (isset($_FILES["excels"]))
{
  //IMPORTANTISIMO PORQUE SE PASAN AMBOS HAY QUE CREAR UN FORM PARA CADA CONTROL DE SUBIDA
  //AUNQUE NO LO RELLENES;

     $reporte = null;
   //cambiar aqui
     for($x=0; $x<count($_FILES["excels"]["name"]); $x++)
    {
        //cambiar aqui
      $file = $_FILES["excels"];
      $nombre = $file["name"][$x];
      $tipo = $file["type"][$x];
      $ruta_provisional = $file["tmp_name"][$x];
      echo $ruta_provisional. $file["tmp_name"][$x] . "<br>";
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "upload/";    

      //if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        echo $nombre . "<br>";
      $icomprobar = new controlform\formvalidate($nombre,"excel");

    if (  $icomprobar->validate()) echo "validado";
else
{
echo "no  validado o no enviado";

}
      //if ($icomprobar->validate())
      //{
       //   echo "enviada imagen";
       //   echo "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
     // }
      
      
      
          $src = $carpeta.$nombre;
          if(!file_exists($carpeta)) mkdir ($carpeta);
          //Caragamos imagenes al servidor
          if(file_exists($src)){
                      
            echo "<br>el archivo existe:".$src;
          }
          else move_uploaded_file($ruta_provisional, $src); //SOBREESCRIBE

          //Codigo para insertar imagenes a tu Base de datos.
          //Sentencia SQL

          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
         
      
    }
    
  
}//funcion




if (isset($_FILES["todos"]))
{
  //IMPORTANTISIMO PORQUE SE PASAN AMBOS HAY QUE CREAR UN FORM PARA CADA CONTROL DE SUBIDA
  //AUNQUE NO LO RELLENES;

     $reporte = null;
   //cambiar aqui
     for($x=0; $x<count($_FILES["todos"]["name"]); $x++)
    {
        //cambiar aqui
      $file = $_FILES["todos"];
      $nombre = $file["name"][$x];
      $tipo = $file["type"][$x];
      $ruta_provisional = $file["tmp_name"][$x];
      echo $ruta_provisional. $file["tmp_name"][$x] . "<br>";
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "upload/";    

      //if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        echo $nombre . "<br>";
      echo "validado";
      //if ($icomprobar->validate())
      //{
       //   echo "enviada imagen";
       //   echo "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
     // }
      
      
      
          $src = $carpeta.$nombre;
          if(!file_exists($carpeta)) mkdir ($carpeta);

          //Caragamos imagenes al servidor
          if(file_exists($src)){
            
            echo "<br>el archivo existe:".$src;
          }
          else move_uploaded_file($ruta_provisional, $src); //SOBREESCRIBE

          //Codigo para insertar imagenes a tu Base de datos.
          //Sentencia SQL

          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
         
      
    }
    
  
}//funcion













//cambiar aqui
if (isset($_FILES["video"]))
//IMPORTANTISIMO PORQUE SE PASAN AMBOS HAY QUE CREAR UN FORM PARA CADA CONTROL DE SUBIDA
  //AUNQUE NO LO RELLENES;

{
   $reporte = null;
   //cambiar aqui
     for($x=0; $x<count($_FILES["video"]["name"]); $x++)
    {
        //cambiar aqui
      $file = $_FILES["video"];
      $nombre = $file["name"][$x];
      $tipo = $file["type"][$x];
      $ruta_provisional = $file["tmp_name"][$x];
      echo $ruta_provisional. $file["tmp_name"][$x] . "<br>";
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "upload/";    

      //if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        echo $nombre . "<br>";
      $icomprobar = new controlform\formvalidate($nombre,"video");

      if ($icomprobar->validate()) echo "validado";
else
{
echo "no  validado o no enviado";

}
      //if ($icomprobar->validate())
      //{
       //   echo "enviada imagen";
       //   echo "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
     // }
      
      
      
          $src = $carpeta.$nombre;
          if(!file_exists($carpeta)) mkdir ($carpeta);

          //Caragamos imagenes al servidor
          if(file_exists($src)){
            
            echo "<br>el archivo existe:".$src;
          }
          else move_uploaded_file($ruta_provisional, $src); //SOBREESCRIBE

          //Codigo para insertar imagenes a tu Base de datos.
          //Sentencia SQL

          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
        
        
    }
    
    
}//if
 







//cambiar aqui
if (isset($_FILES["sonido"]))
//IMPORTANTISIMO PORQUE SE PASAN AMBOS HAY QUE CREAR UN FORM PARA CADA CONTROL DE SUBIDA
  //AUNQUE NO LO RELLENES;

{
   $reporte = null;
   //cambiar aqui
     for($x=0; $x<count($_FILES["sonido"]["name"]); $x++)
    {
        //cambiar aqui
      $file = $_FILES["sonido"];
      $nombre = $file["name"][$x];
      $tipo = $file["type"][$x];
      $ruta_provisional = $file["tmp_name"][$x];
      echo $ruta_provisional. $file["tmp_name"][$x] . "<br>";
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "upload/";    

      //if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        echo $nombre . "<br>";
      $icomprobar = new controlform\formvalidate($nombre,"sonido");

      if ($icomprobar->validate()) echo "validado";
else
{
echo "no  validado o no enviado";

}
      //if ($icomprobar->validate())
      //{
       //   echo "enviada imagen";
       //   echo "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
     // }
      
      
          $src = $carpeta.$nombre;
          if(!file_exists($carpeta)) mkdir ($carpeta);

          //Caragamos imagenes al servidor
          if(file_exists($src)){
                      
            echo "<br>el archivo existe:".$src;
          }
          else move_uploaded_file($ruta_provisional, $src); //SOBREESCRIBE


          //Codigo para insertar imagenes a tu Base de datos.
          //Sentencia SQL

          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
        
        
    }
    
    
}//if
 







//cambiar aqui
if (isset($_FILES["word"]))
//IMPORTANTISIMO PORQUE SE PASAN AMBOS HAY QUE CREAR UN FORM PARA CADA CONTROL DE SUBIDA
  //AUNQUE NO LO RELLENES;

{
   $reporte = null;
   //cambiar aqui
     for($x=0; $x<count($_FILES["word"]["name"]); $x++)
    {
        //cambiar aqui
      $file = $_FILES["word"];
      $nombre = $file["name"][$x];
      $tipo = $file["type"][$x];
      $ruta_provisional = $file["tmp_name"][$x];
      echo $ruta_provisional. $file["tmp_name"][$x] . "<br>";
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "upload/";    

      //if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        echo $nombre . "<br>";
      $icomprobar = new controlform\formvalidate($nombre,"word");

      if ($icomprobar->validate()) echo "validado";
else
{
echo "no  validado o no enviado";

}
      //if ($icomprobar->validate())
      //{
       //   echo "enviada imagen";
       //   echo "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
     // }
      
      
      
          $src = $carpeta.$nombre;
          if(!file_exists($carpeta)) mkdir ($carpeta);

          //Caragamos imagenes al servidor
          if(file_exists($src)){
                      
            echo "<br>el archivo existe:".$src;
          }
          else move_uploaded_file($ruta_provisional, $src); //SOBREESCRIBE

          //Codigo para insertar imagenes a tu Base de datos.
          //Sentencia SQL

          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
        
        
    }
    
    
}//if
 







//cambiar aqui
if (isset($_FILES["excel"]))
//IMPORTANTISIMO PORQUE SE PASAN AMBOS HAY QUE CREAR UN FORM PARA CADA CONTROL DE SUBIDA
  //AUNQUE NO LO RELLENES;

{
   $reporte = null;
   //cambiar aqui
     for($x=0; $x<count($_FILES["excel"]["name"]); $x++)
    {
        //cambiar aqui
      $file = $_FILES["excel"];
      $nombre = $file["name"][$x];
      $tipo = $file["type"][$x];
      $ruta_provisional = $file["tmp_name"][$x];
      echo $ruta_provisional. $file["tmp_name"][$x] . "<br>";
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "upload/";    

      //if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        echo $nombre . "<br>";
      $icomprobar = new controlform\formvalidate($nombre,"excel");

      if ($icomprobar->validate()) echo "validado";
else
{
echo "no  validado o no enviado";

}
      //if ($icomprobar->validate())
      //{
       //   echo "enviada imagen";
       //   echo "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
     // }
      
      
          $src = $carpeta.$nombre;
          if(!file_exists($carpeta)) mkdir ($carpeta);

          //Caragamos imagenes al servidor
          if(file_exists($src)){
                      
            echo "<br>el archivo existe:".$src;
          }
          else move_uploaded_file($ruta_provisional, $src); //SOBREESCRIBE
          //Codigo para insertar imagenes a tu Base de datos.
          //Sentencia SQL

          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
        
        
    }
    
    
}//if
 






//cambiar aqui
if (isset($_FILES["todo"]))
//IMPORTANTISIMO PORQUE SE PASAN AMBOS HAY QUE CREAR UN FORM PARA CADA CONTROL DE SUBIDA
  //AUNQUE NO LO RELLENES;

{
   $reporte = null;
   //cambiar aqui
     for($x=0; $x<count($_FILES["todo"]["name"]); $x++)
    {
        //cambiar aqui
      $file = $_FILES["todo"];
      $nombre = $file["name"][$x];
      $tipo = $file["type"][$x];
      $ruta_provisional = $file["tmp_name"][$x];
      echo $ruta_provisional. $file["tmp_name"][$x] . "<br>";
      $size = $file["size"][$x];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "upload/";    

      //if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        echo $nombre . "<br>";
      echo "validado";
      //if ($icomprobar->validate())
      //{
       //   echo "enviada imagen";
       //   echo "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
     // }
      
      
          $src = $carpeta.$nombre;
          if(!file_exists($carpeta)) mkdir ($carpeta);


          //Caragamos imagenes al servidor
          if(file_exists($src)){
                      
            echo "<br>el archivo existe:".$src;
          }
          else move_uploaded_file($ruta_provisional, $src); //SOBREESCRIBE
          //Codigo para insertar imagenes a tu Base de datos.
          //Sentencia SQL

          echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
        
        
    }
    
    
}//if
 
















?>