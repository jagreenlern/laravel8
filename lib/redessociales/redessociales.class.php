
<?php
//necesitas dominio
class redessociales{


    

 public static function head(){
    echo '<link rel="stylesheet" href="lib/redessociales/fontsocial.css">';
    echo '<link rel="stylesheet" href="lib/redessociales/mainsocial.css">';
 }

    public static function mostrarredessociales ($urlfacebook="https://www.facebook.com/jagreen.lern",$urltwitter="https://twitter.com/jagreenlernx",$urlyoutube="https://www.youtube.com/channel/UCQs2RLwN_jLg5lWzrxsK-uw",$urlinstagram="https://www.instagram.com/devcodela/")
{
try
{


      
    echo '<div class="social-bar">';
    echo '<a href="'. $urlfacebook .' " class="icon icon-facebook" target="_blank"></a>';
    echo '<a href="' . $urltwitter .'" class="icon icon-twitter" target="_blank"></a>';
    echo '<a href="' . $urlyoutube . '" class="icon icon-youtube" target="_blank"></a>';
    echo '<a href="' . $urlinstagram . '" class="icon icon-instagram" target="_blank"></a>';
  echo '</div>';
  

} catch(Exception $e) {
    echo $e->getMessage() . "<br>";
    
  }
    
}//FUNC
public static function mostrarenlacecompartir ($host="http://localhost")
{
try
{
    //necesitas dominio

  //echo "http://" .  $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  echo $host . $_SERVER['PHP_SELF'];
      

  

} catch(Exception $e) {
  echo $e->getMessage() . "<br>";
  
}
  
}//FUNC

public static function mostrarcontrolcompartirbs ($host="http://localhost")
{
try
{
    //necesitas dominio

  //echo "http://" .  $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  
 echo '
            <!--<li><a href="https://www.facebook.com/share.php?v=4&src=bm&u=https://www.webslesson.info/2019/09/php-form-with-google-recaptcha.html&t=PHP Form with Google reCaptcha" target="_empty"><i class="fa top-social fa-facebook"></i></a></li>-->
            <li><a href="https://www.facebook.com/share.php?v=4&src=bm&u=<?php redessociales::mostrarenlacecompartir(); ?>" target="_empty"><i class="fa top-social fa-facebook"></i></a></li>
          
            
       
      ';

  

    } catch(Exception $e) {
      echo $e->getMessage() . "<br>";
      
    }
      
  }//FUNC
  

public static function mostrarcontroltelefonobs ($telefono=620216269)
{
try
{
    //necesitas dominio

  //echo "http://" .  $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  
 echo '<li>
 <i class="fa fa-phone"></i> <a href="tel:+"'.$telefono.'">'.$telefono.'</a>
</li>';

  

} catch(Exception $e) {
  echo $e->getMessage() . "<br>";
  
}
  
}//FUNC

public static function mostrarcontrolskypebs ($skype="jagreenlern_6")
{
try
{
    //necesitas dominio

  //echo "http://" .  $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  echo '<li>
  <i class="fa fa-phone"></i> <a href="skype:live:'.$skype.'?call">Hablar por Skype</a>
</li>';
  

} catch(Exception $e) {
  echo $e->getMessage() . "<br>";
  
}
  
}//FUNC

public static function mostrarcontrolemailbs ($email="jagrenlern@gmail.com")
{
try
{
    //necesitas dominio

  //echo "http://" .  $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];<li>
  echo '<li>
  <i class="fa fa-envelope"></i> Email: <a href="mailto:'.$email.'">'. $email .'</a>
  </li>';
  

} catch(Exception $e) {
  echo $e->getMessage() . "<br>";
  
}
  
}//FUNC


public static function mostrarcontroltelefono ($telefono=620216269)
{
try
{
    //necesitas dominio

  //echo "http://" .  $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  echo 'Móvil: <a href="tel:+'.$telefono.'">'.$telefono.'</a><br>';
  

} catch(Exception $e) {
  echo $e->getMessage() . "<br>";
  
}
  
}//FUNC

public static function mostrarcontrolskype ($skype="jagreenlern_6")
{
try
{
    //necesitas dominio

  //echo "http://" .  $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  
  echo '<a href="skype:live:'.$skype.'?call">Hablar por Skype: </a><br>';

} catch(Exception $e) {
  echo $e->getMessage() . "<br>";
  
}
  
}//FUNC

public static function mostrarcontrolemail ($email="jagrenlern@gmail.com")
{
try
{
    //necesitas dominio

  //echo "http://" .  $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];<li>
  echo '                    Email: <a href="mailto:'.$email.'">'.$email.'</a><br>';
  

} catch(Exception $e) {
  echo $e->getMessage() . "<br>";
  
}
  
}//FUNC
}//class
