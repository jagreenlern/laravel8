<?php
namespace controlform;
class controlform {
    // Properties basicas
    public $value="";
    public $name="";
    public $type="";
    public $id="";
    public $class=""; 
    public $size=5;
    public $autofocus=FALSE;
    public $height=0;
    public $width=0;
    
    public $disabled=FALSE;

/*
    List of All <form> Attributes
    Attribute	Description
    accept-charset	Specifies the character encodings used for form submission
    action	Specifies where to send the form-data when a form is submitted
    autocomplete	Specifies whether a form should have autocomplete on or off
    enctype	Specifies how the form-data should be encoded when submitting it to the server (only for method="post")
    method	Specifies the HTTP method to use when sending form-data
    name	Specifies the name of the form
    novalidate	Specifies that the form should not be validated when submitted
    rel	Specifies the relationship between a linked resource and the current document
    target	Specifies where to display the response that is received after submitting the form
    
*/
    /*
    Type	Description
<input type="text">	Displays a single-line text input field
<input type="radio">	Displays a radio button (for selecting one of many choices)
<input type="checkbox">	Displays a checkbox (for selecting zero or more of many choices)
<input type="submit">	Displays a submit button (for submitting the form)
<input type="button">	Displays a clickable button*/

/*The HTML <form> Elements
The HTML <form> element can contain one or more of the following form elements:
<form>
<input>
<label>
<select>
<textarea>
<button>
<fieldset>
<legend>
<datalist>
<output>
<option>
<optgroup>

HTML Form Elements
Tag	Description
<form>	Defines an HTML form for user input
<input>	Defines an input control
<textarea>	Defines a multiline input control (text area)
<label>	Defines a label for an <input> element
<fieldset>	Groups related elements in a form
<legend>	Defines a caption for a <fieldset> element
<select>	Defines a drop-down list
<optgroup>	Defines a group of related options in a drop-down list
<option>	Defines an option in a drop-down list
<button>	Defines a clickable button
<datalist>	Specifies a list of pre-defined options for input controls
<output>	Defines the result of a calculation
*/
    
  
  public $readonly=FALSE;
    public $maxlength=0;
    public $min=0;
    public $max=0;
    
    public $pattern="";
    public $placeholder="";
    public $required= FALSE;
    public $step=0;
    public $list="";/* es para hacer listas
    <form>
  <input list="browsers">
  <datalist id="browsers">
    <option value="Internet Explorer">
    <option value="Firefox">
    <option value="Chrome">
    <option value="Opera">
    <option value="Safari">
  </datalist>
</form>*/

    public $autocomplete="off";

    //The autocomplete attribute works with <form> and the following <input> types: text, search, url, tel, email, password, datepickers, range, and color.;
    
  function __construct($value="",$name="",$type="",$id="", $class="",$size=5, $autofocus=FALSE,$height=0,$width=0,$disabled=FALSE) {
    $this->value = $value ;
    $this->name = $name ;
    $this->type = $type ;
    $this->id = $id ;
    $this->class = $class ;
    $this->size = $size ;
    $this->autofocus = $autofocus ;
    $this->height = $height;
  $this->width =$width;
  $this->disabled =$disabled;
  }
    // Methods
    function setvalue($value) {
      $this->value = $value ;
      
    }
    
    function getvalue() {
      return $this->value;
    }
    public function __toString() {
      return $this->value;
  } 
}

namespace controlfom\controlreset;
class  controlreset extends \controlform\controlform
{

	
}

namespace controlfom\controlsubmit;
class controlsubmit extends \controlform\controlform
{
	
public $formmethod="post";
public $formtarget="_self";
public $formnovalidate="formnovalidate";
public $formenctype="application/x-www-form-urlencoded";
function printsubmit(){
  echo '<input type="submit" name="' . $this->name . ' value="' . $this->value . '">';

}
function printsubmitbootstrap(){
  echo '<input type="submit" name="' . $this->name . ' value="' . $this->value . '">';

}


}

namespace controlfom\controlbutton;
class controlbutton extends \controlform\controlform
{
	
}

	


namespace controlfom\controlfile;
class controlfile extends \controlform\controlform
{
	public $multiple=FALSE;//The multiple attribute works with the following input types: email, and file.
}

namespace controlfom\controlemail;
class controlemail extends \controlform\controlform
{
	public $multiple=FALSE;//The multiple attribute works with the following input types: email, and file.
  function __construct($value="",$name="",$type="",$id="", $class="",$size=5, $autofocus=FALSE,$height=0,$width=0,$multiple=FALSE) {
    $this->multiple = $multiple ;
    //$this->list = $list ;
    \controlform\controlform::__construct($value,$name,$type,$id, $class,$size, $autofocus,$height,$width);

  }  

public function printemailbootstrap(){
  
$cadena='<div class="form-group" id="backgroundcolor">';

$cadena=$cadena.'<label for="paginaweb">Pagina web:</label>';
$cadena=$cadena.'<input type="url" id="paginaweb" name="paginaweb"pattern="^(((https?)|(ftp)):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$" title="debe tener el siguiente patron http://www.google.com o con https" >';
$cadena=$cadena.'</div>';
return $cadena;

}
public function printemail(){
  $cadena='<div class="form-group" id="backgroundcolor">';
  
  $cadena=$cadena.'<label for="paginaweb">Pagina web:</label>';
  $cadena=$cadena.'<input type="url" id="paginaweb" multiple="multiple" name="paginaweb"pattern="^(((https?)|(ftp)):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$" title="debe tener el siguiente patron http://www.google.com o con https" >';
  $cadena=$cadena.'</div>';
  return $cadena;
  
  }
  
}//fin clase

namespace controlfom\controllist;
class controllist extends \controlform\controlform
{
	public $list ="";
  public $datalist = array();

  function __construct($value="",$name="",$type="",$id="", $class="",$size=5, $autofocus=FALSE,$height=0,$width=0,$datalist=NULL) {
    $this->datalist = $datalist ;
    //$this->list = $list ;
    \controlform\controlform::__construct($value,$name,$type,$id, $class,$size, $autofocus,$height,$width);

  }  
public function printlist(){
  
  echo '<label for="' . $this->name . '">' . $this->name . ':';
    echo '<input list="' . $this->name .'" name="' . $this->name . '">';
 echo  '<datalist id="' . $this->name . '">';
  foreach ($this->datalist as $elemento){

  echo '"<option  value="' . $elemento . '">';  
}
echo "</datalist>";

/*'<input list="browsers">
<datalist id="browsers">
  <option value="Internet Explorer">
  <option value="Firefox">
  <option value="Chrome">
  <option value="Opera">
  <option value="Safari">
</datalist>';*/

}
public function printlistbootstrap(){
 echo '<div class="form-group" id="' . $this->id . '">';
 echo '<label for="' . $this->name . '">' . $this->name . ':</label><input list="' . $this->name .'" name="' . $this->name . '">';
  echo '<datalist id="' . $this->name . '">';
  foreach ($this->datalist as $elemento){

  echo '"<option  value="' . $elemento . '">';  
}
 echo "</datalist></div>";

  /*'<div class="form-group" id="backgroundcolor">
  <label for="lname">Navegador:</label>

      <input list="browsers" name="browser">
      <datalist id="browsers">
        <option value="Internet Explorer">
        <option value="Firefox">
        <option value="Chrome">
        <option value="Opera">
        <option value="Safari">
      </datalist>
</div>';*/

  
  }
  public function printradiobootstrap(){
    
     echo '<div class="form-group" id="' . $this->id . '">';
      echo '<legend>' . $this->name . ':</legend>';
      foreach ($this->datalist as $elemento){
    
      
      echo '<input type="radio" id="'. $elemento .'" name="' . $this->name . '" value="' . $elemento . '">"';
echo '<label for="'. $elemento . '">' . $elemento . '</label><br>';
      }
    echo "</div>";
    
    
    /*'<div class="form-group" id="backgroundcolor">
    <legend>Sexo:</legend>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label><br>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label>
</div>';*/
      

  
    
    }
    public function printradio(){
    
      echo '<legend>' . $this->name . ':</legend>';
      foreach ($this->datalist as $elemento){
    
      
      echo '<input type="radio" id="'. $elemento .'" name="' . $this->name . '" value="' . $elemento . '">"';
echo '<label for="'. $elemento . '">' . $elemento . '</label><br>';
      }
    
    //return  $cadena;
    
    
    /*'<div class="form-group" id="backgroundcolor">
    <legend>Sexo:</legend>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label><br>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label>
</div>';*/

  /*<div class="form-group" id="backgroundcolor">
<legend>Sexo:</legend>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label><br>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label>
</div>*/
 
}


public function printcheckbox(){
    
echo '<legend>' . $this->name . ':</legend>';
  foreach ($this->datalist as $elemento){

  
  echo '<input type="checkbox" id="'. $elemento .'" name="' . $this->name . '[]" value="' . $elemento . '">"';
echo '<label for="'. $elemento . '">' . $elemento . '</label><br>';
  }




/*'<div class="form-group" id="backgroundcolor">
<legend>Sexo:</legend>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label><br>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label>
</div>';*/

/*<div class="form-group" id="backgroundcolor">
<legend>Sexo:</legend>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label><br>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label>
</div>*/

}
public function printcheckboxbootstrap(){
    
  echo '<legend>' . $this->name . ':</legend>';
  foreach ($this->datalist as $elemento){

  
  echo '<input type="checkbox" id="'. $elemento .'" name="' . $this->name . '[]" value="' . $elemento . '">"';
echo '<label for="'. $elemento . '">' . $elemento . '</label><br>';
  }




/*'<div class="form-group" id="backgroundcolor">
<legend>Sexo:</legend>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label><br>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label>
</div>';*/

/*<div class="form-group" id="backgroundcolor">
<legend>Sexo:</legend>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label><br>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label>
</div>*/

}

/*
    List of All <form> Attributes
    Attribute	Description
    accept-charset	Specifies the character encodings used for form submission
    action	Specifies where to send the form-data when a form is submitted
    autocomplete	Specifies whether a form should have autocomplete on or off
    enctype	Specifies how the form-data should be encoded when submitting it to the server (only for method="post")
    method	Specifies the HTTP method to use when sending form-data
    name	Specifies the name of the form
    novalidate	Specifies that the form should not be validated when submitted
    rel	Specifies the relationship between a linked resource and the current document
    target	Specifies where to display the response that is received after submitting the form
    
*/
}//classs
namespace controlform;
class form {
    // Properties basicas

    
    public $id="";
    public $class=""; 
    public $acceptcharset="UTF-8";//accept-charsetUTF-8 - Character encoding for Unicode
    //ISO-8859-1 - Character encoding for the Latin alphabet
    public $action="/";
    public $target="_self";//_blank
    public $autocomplete="off";
    public $enctype="application/x-www-form-urlencoded";
    public $method="POST";//GET
    public $novalidate=FALSE;
    public $disabled=FALSE;
    
/*
    List of All <form> Attributes
    Attribute	Description
    accept-charset	Specifies the character encodings used for form submission
    action	Specifies where to send the form-data when a form is submitted
    autocomplete	Specifies whether a form should have autocomplete on or off
    enctype	Specifies how the form-data should be encoded when submitting it to the server (only for method="post")
    method	Specifies the HTTP method to use when sending form-data
    name	Specifies the name of the form
    novalidate	Specifies that the form should not be validated when submitted
    rel	Specifies the relationship between a linked resource and the current document
    target	Specifies where to display the response that is received after submitting the form
    
*/
    /*
    Type	Description
<input type="text">	Displays a single-line text input field
<input type="radio">	Displays a radio button (for selecting one of many choices)
<input type="checkbox">	Displays a checkbox (for selecting zero or more of many choices)
<input type="submit">	Displays a submit button (for submitting the form)
<input type="button">	Displays a clickable button*/

/*The HTML <form> Elements
The HTML <form> element can contain one or more of the following form elements:
<form>
<input>
<label>
<select>
<textarea>
<button>
<fieldset>
<legend>
<datalist>
<output>
<option>
<optgroup>

HTML Form Elements
Tag	Description
<form>	Defines an HTML form for user input
<input>	Defines an input control
<textarea>	Defines a multiline input control (text area)
<label>	Defines a label for an <input> element
<fieldset>	Groups related elements in a form
<legend>	Defines a caption for a <fieldset> element
<select>	Defines a drop-down list
<optgroup>	Defines a group of related options in a drop-down list
<option>	Defines an option in a drop-down list
<button>	Defines a clickable button
<datalist>	Specifies a list of pre-defined options for input controls
<output>	Defines the result of a calculation
*/
    

/*<form enctype="value">

Value	Description
application/x-www-form-urlencoded	Default. All characters are encoded before sent (spaces are converted to "+" symbols, and special characters are converted to ASCII HEX values)
multipart/form-data	 This value is necessary if the user will upload a file through the form
text/plain	Sends data without any encoding at all. Not recommended*/

   
    //The autocomplete attribute works with <form> and the following <input> types: text, search, url, tel, email, password, datepickers, range, and color.;
    
  function __construct($id="", $class="",$acceptcharset="UTF-8",$action="/",$target="_self",$autocomplete="off", $enctype="application/x-www-form-urlencoded", $method="POST",$novalidate=FALSE,$disabled=FALSE) {
    
    $this->id = $id ;
    $this->class = $class ;
    $this->acceptcharset = $acceptcharset ;
    $this->action = $action ;
    $this->target = $target;
  $this->autocomplete =$autocomplete;
$this->disabled=$disabled;
$this->enctype =$enctype;
$this->method =$method;
$this->novalidate =$novalidate;
$this->disabled =$disabled;

  }
    // Methods
    function settarget($value) {
      $this->target = $value ;
      
    }
    
    function gettarget() {
      return $this->target;
    }
    public function __toString() {
      return $this->target;
  } 
  public function printstartformhtml() {

    $form="<form method='GET' >
    <fieldset>";
    $name="";
    
     $id="";
     $class=""; 
     $acceptcharset="UTF-8";//accept-charsetUTF-8 - Character encoding for Unicode
    //ISO-8859-1 - Character encoding for the Latin alphabet
     $action="/";
     $target="_self";//_blank
     $autocomplete="off";
     $enctype="application/x-www-form-urlencoded";
     $method="POST";//GET
     $novalidate=FALSE;
     $disabled=FALSE;
    return $form;
} 
public function printendformhtml() {
  
  return '</fieldset><input type="submit"></form>';  
} 
}






namespace controlform;
class formvalidate {
    // Properties basicas
    
    public $name="";
    public $pattern="";
    public $type="";
    

    public $validado=FALSE;
  



    
  function __construct($name= "",$type="") {
    $this->name= $name;
    $this->type=$type;
    if (isset($name) && isset($type))
    {
      if ($type=="email")
      {
        $this->pattern="[^@\s]+@[^@\s]+\.[^@\s]+";
       $this->pattern = "/" . $this->pattern . "/" ;
       
                  // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
                  //$patron_texto = "^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$";
                  //echo '<input name="campo1" type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+">';
      }
      elseif ($type=="string")
      {
        // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
        $this->pattern="^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$";
       $this->pattern = "/" . $this->pattern . "/" ;

                  
                  
      }
      elseif ($type=="cuentabancaria")
      {
        // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
        $this->pattern="[0-9]{10}";
       $this->pattern = "/" . $this->pattern . "/" ;
      }
      elseif ($type=="tarjetaamericanexpress")
      {
        // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
        $this->pattern="[0-9]{4} *[0-9]{6} *[0-9]{5}";
        
       $this->pattern = "/" . $this->pattern . "/" ;
      }
      elseif ($type=="tarjetadinersclub")
      {
        // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
        $this->pattern="^([30|36|38]{2})([0-9]{12})$";
       $this->pattern = "/" . $this->pattern . "/" ;
      }
      elseif ($type=="easypassword")
      {
       //Clave (UpperCase, LowerCase and Number): 
        $this->pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$";
   
       $this->pattern = "/" . $this->pattern . "/" ;
      }
      elseif ($type=="hardpassword")
      {
        //Clave (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars):
        $this->pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$";
       $this->pattern = "/" . $this->pattern . "/" ;
      }
      elseif ($type=="paginaweb")
      {
        // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
        $this->pattern="^(((https?)|(ftp)):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$";
       $this->pattern = "/" . $this->pattern . "/" ;
      }
      elseif ($type=="excel")
      {
        // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
        $this->pattern="^.+\.(xlsx|xls|csv)$";
       $this->pattern = "/" . $this->pattern . "/" ;
      }
      elseif ($type=="imagen")
      {
        // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
        $this->pattern="([^\s]+(\.(?i)(jpg|jpeg|png))$)";
       $this->pattern = "/" . $this->pattern . "/" ;
      }
      elseif ($type=="sonido")
      {
        // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
        $this->pattern="([^\s]+(\.(?i)(mp3|mpeg))$)";
       $this->pattern = "/" . $this->pattern . "/" ;
      }
      elseif ($type=="video")
      {
        // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
        $this->pattern="([^\s]+(\.(?i)(asf|asx|avi|wav|wax|wma|wm|ogg))$)";
       $this->pattern = "/" . $this->pattern . "/" ;
      }
      elseif ($type=="word")
      {
        // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
        $this->pattern="([^\s]+(\.(?i)(doc|docx))$)";
       $this->pattern = "/" . $this->pattern . "/" ;
      }
/*
        
        


    <div class="form-group" id="backgroundcolor">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" pattern="[A-Za-z]{1,9}" required/>
        
        
        </div>
    <div class="form-group" id="backgroundcolor">
<label for="email">Enter your email:</label>
<input type="email" id="email"  pattern="[^@\s]+@[^@\s]+\.[^@\s]+" name="email" title="patron hola@gmail.com" required>
</div>
<div class="form-group" id="backgroundcolor">
<label for="paginaweb">Pagina web:</label>
<input type="url" id="paginaweb" name="paginaweb"pattern="^(((https?)|(ftp)):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$" title="debe tener el siguiente patron http://www.google.com o con https" required>
</div>
<div class="form-group" id="backgroundcolor">
<label for="archivo">Choose file to upload</label>
<input type="file" id="archivo" name="excel" required accept=".csv,text/csv" pattern="^.+\.(xlsx|xls|csv)$" />
<input type="file" id="archivo" name="imagen" accept=".jpg, .jpeg, .png" pattern="([^\s]+(\.(?i)(jpg))$)"  required/>
<input type="file" id="archivo" name="sonido"  pattern="([^\s]+(\.(?i)(mp3))$)" accept="audio/mpeg, audio/mp3"  required />
<input type="file" id="archivo" name="video"  pattern="([^\s]+(\.(?i)(ogg))$)" required accept=".ogg" />
<input type="file" id="archivo" name="word"  pattern="([^\s]+(\.(?i)(docdocx))$)" required accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
<input type="file" id="archivo" name="todo"  />
</div>


<div class="form-group" id="backgroundcolor">
<label for="archivos">Choose files to upload</label>
<input type="file" id="archivos" name="excels" required accept=".csv,text/csv" multiple="multiple" pattern="^.+\.(xlsx|xls|csv)$" />
<input type="file" id="archivos" name="imagenes" accept=".jpg, .jpeg, .png" multiple="multiple" pattern="([^\s]+(\.(?i)(jpg))$)"  required/>
<input type="file" id="archivos" name="sonidos"  pattern="([^\s]+(\.(?i)(mp3))$)" multiple="multiple" accept="audio/mpeg, audio/mp3"  required />
<input type="file" id="archivos" name="videos"  pattern="([^\s]+(\.(?i)(ogg))$)" multiple="multiple" required accept=".ogg" />
<input type="file" id="archivos" name="words"  pattern="([^\s]+(\.(?i)(docdocx))$)" multiple="multiple" accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
<input type="file" id="archivos" name="todos"  multiple="multiple"  />
</div>


<div class="form-group" id="backgroundcolor">
<label for="country_code">CP:</label>
<input type="text"  id="country_code" name="country_code"  title="El campo cuenta debe tener 5 dígitos validos"  pattern="^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$" autofocus required />
</div>


<div class="form-group" id="backgroundcolor">
<label for="nif">NIF:
<input type="text" placeholder="NIF"  size="9"  maxlength="9" name="nif" id="nif" pattern="(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))" title="Introduzca el dni"  required />
</label>
</div>
<div class="form-group" id="backgroundcolor">
<label for="tel">Teléfono (9 dígitos comenzando por 9, 8, 7 o 6)</label>
<input type="text" pattern="^[9|8|7|6]\d{8}$" title="debe tener el siguiente patron 8 digitos 620206090" o con https" required>
</div>

                  
  */                
      
      
  }
    
    }
    // Methods
    function mostrarmensajes($mensajes) {
      $contar =   count($mensajes);
      if ($contar > 0)
      {
          echo "<div><p>MENSAJES:</p>";
          echo "<hr>";
          // Mostrar los mensajes:
          for( $contador=0; $contador < $contar; $contador++ )
              echo $mensajes[$contador]."<br/>";
              echo "</div>";
      }
      
    }
    
    function mostraerrores($errores) {
      if( count($errores) > 0 )
        {   
            echo "<div><p>ERRORES ENCONTRADOS:</p>";
            echo "<hr>";
            // Mostrar los errores:
            for( $contador=0; $contador < count($errores); $contador++ )
                echo $errores[$contador]."<br/>";
                echo "</div>";
        }
      
    }

    public function __toString() {
      return $this->pattern;
  } 
  public function validate() {
    if (isset($this->name) || isset($this->pattern) ){

      if( preg_match($this->pattern, $this->name) )
      {
      $this->validado=TRUE;
      return $this->validado;
    }
    else
    {
      $this->validado=FALSE;
      return $this->validado;
    }

    }
  else{
    $this->validado=FALSE;
    return $this->validado;
  }



}//function


public function validatearray() {
  if (isset($this->name) || isset($this->pattern) ){
    foreach ($this->name as $elemento){
      //comprobamos los nombres del archivos pasados
    if( preg_match($this->pattern, $elemento) )
    {
    $this->validado=TRUE;
    return $this->validado;
    }
    else return $this->validado=FALSE;
  }//foreach
}//if

else{
  $this->validado=FALSE;
  return $this->validado;
}



}//function


}//class
  ?>