<!DOCTYPE html>
<html>
    <head>
        <title>Validación de formulario</title>
        <meta charset = "utf-8">
    		<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    		<meta name = "viewport" content = "width=device-width, initial-scale=1">
        <!-- Bootstrap -->
        <link href = "bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap.min.css" rel = "stylesheet">
           <script src = "http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src = "bootstrap/js/bootstrap.min.js"></script>
        
        <script src = "jquery.validate.min.js"></script>
        <script src = "messages_es.js"></script>

    </head>
    <body>
        <style>

form,#form{                               /* make the box translucent (20% opaque) */
   border:1px solid red;
   background-color: grey;
   padding-left: 20px;
   margin-top: 20px;
   color:black;

}
.form-group {                               /* make the box translucent (20% opaque) */

   margin-bottom: 5px;
   /*text-align:justify;*/
   
   

}
#center {                               /* make the box translucent (20% opaque) */
   
   text-align: center;
   background-color:orchid;
   
   
   

}
#backgroundcolor {                               /* make the box translucent (20% opaque) */
   
   background-color: orchid;

   
   

}
.transparente {                               /* make the box translucent (20% opaque) */
   border:1px solid red;
   background-color: black;
   color: red;
   opacity: 0.2;
   filter: alpha(opacity=20);       /* IE8 and lower */
   zoom: 1;       /* set "zoom", "width" or "height" to trigger "hasLayout" in IE 7 and lower */
}
        </style>
            
      <div class="container">




<h1>DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS</h1>


<p>Fill in and submit the form, then reload the page, start to fill in the form again - and see how autocomplete works.</p>

<p>Then, try to set autocomplete to "off".</p>

<div class="row">





<div class="row">
    <div class="col-md-12 offset-md-1 form-1-box wow fadeInUp">
  


  <form action=""  enctype="multipart/form-data" autocomplete="on" target="black" method="POST" >
  <fieldset>
  <legend>IMPORTANTISIMO DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
</legend>
    
<div class="form-group" id="backgroundcolor">
<label for="archivo">Choose file to upload</label>
<input type="file" id="archivo" name="excel[]"  accept=".csv,text/csv,.xlsx,.xls" pattern="^.+\.(xlsx|xls|csv)$" />
<input type="file" id="archivo" name="imagen[]" accept=".jpg, .jpeg, .png" pattern="([^\s]+(\.(?i)(jpg|jpeg|png))$)"  />
<input type="file" id="archivo" name="sonido[]"  pattern="([^\s]+(\.(?i)(mp3|mpeg))$)" accept="audio/mpeg, audio/mp3"   />
<input type="file" id="archivo" name="video[]"  pattern="([^\s]+(\.(?i)(asf|asx|avi|wav|wax|wma|wm|ogg))$)"  accept=" .asf, .asx, .avi, .wav, .wax, .wma, .wm, .ogg" />
<input type="file" id="archivo" name="word[]"  pattern="([^\s]+(\.(?i)(doc|docx))$)"  accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
<input type="file" id="archivo" name="todo[]"  />
</div>
<div class="form-group" id="backgroundcolor">
<label for="archivos">Choose file to upload</label>
<input type="file" id="archivos" name="excels[]"  accept=".csv,text/csv,.xlsx,.xls" multiple="multiple" pattern="^.+\.(xlsx|xls|csv)$" />
<input type="file" id="archivos" name="imagenes[]" accept=".jpg, .jpeg, .png" multiple="multiple" pattern="([^\s]+(\.(?i)(jpg|jpeg|png))$)"  />
<input type="file" id="archivos" name="sonidos[]"  pattern="([^\s]+(\.(?i)(mp3|mpeg))$)" multiple="multiple" accept="audio/mpeg, audio/mp3"   />
<input type="file" id="archivos" name="videos[]"  pattern="([^\s]+(\.(?i)(asf|asx|avi|wav|wax|wma|wm|ogg))$)" multiple="multiple"  accept=" .asf, .asx, .avi, .wav, .wax, .wma, .wm, .ogg" />
<input type="file" id="archivos" name="words[]"  pattern="([^\s]+(\.(?i)(doc|docx))$)" multiple="multiple" accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
<input type="file" id="archivos" name="todos[]"  multiple="multiple"  />
</div>

<div class="form-group" id="center">
<input type="reset">
<input type="submit" alt="Submit" name="form" value="Enviar">
</div>

</fieldset>

</form>









  


  <form action=""  enctype="multipart/form-data" autocomplete="on" target="black" method="POST" >
  <fieldset>
  <legend>IMPORTANTISIMO DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
</legend>
    
<div class="form-group" id="backgroundcolor">
<label for="archivo">Subir imagen</label>

<input type="file" id="archivo" name="imagen[]" accept=".jpg, .jpeg, .png" pattern="([^\s]+(\.(?i)(jpg|jpeg|png))$)"  />




</div>


<div class="form-group" id="center">
<input type="reset">
<input type="submit" alt="Submit" name="form" value="Enviar">
</div>

</fieldset>

</form>


  


  <form action=""  enctype="multipart/form-data" autocomplete="on" target="black" method="POST" >
  <fieldset>
  <legend>IMPORTANTISIMO DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
</legend>
    
<div class="form-group" id="backgroundcolor">
<label for="archivo">Choose file to upload</label>

<input type="file" id="archivo" name="imagenes[]" accept=".jpg, .jpeg, .png" pattern="([^\s]+(\.(?i)(jpg|jpeg|png))$)" multiple="multiple" />




</div>


<div class="form-group" id="center">
<input type="reset">
<input type="submit" alt="Submit" name="form" value="Enviar">
</div>

</fieldset>

</form>

  


<form action=""  enctype="multipart/form-data" autocomplete="on" target="black" method="POST" >
  <fieldset>
  <legend>IMPORTANTISIMO DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
</legend>
    
<div class="form-group" id="backgroundcolor">
<label for="archivo">Video</label>

<input type="file" id="archivo" name="video[]"  pattern="([^\s]+(\.(?i)(asf|asx|avi|wav|wax|wma|wm|ogg))$)"  accept=" .asf, .asx, .avi, .wav, .wax, .wma, .wm, .ogg" />
</div>

<div class="form-group" id="center">
<input type="reset">
<input type="submit" alt="Submit" name="form" value="Enviar">
</div>

</fieldset>

</form>

 


<form action=""  enctype="multipart/form-data" autocomplete="on" target="black" method="POST" >
  <fieldset>
  <legend>IMPORTANTISIMO DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
</legend>
    
<div class="form-group" id="backgroundcolor">
<label for="archivo">Videos</label>

<input type="file" id="archivos" name="videos[]"  pattern="([^\s]+(\.(?i)(asf|asx|avi|wav|wax|wma|wm|ogg))$)" multiple="multiple"  accept=" .asf, .asx, .avi, .wav, .wax, .wma, .wm, .ogg" />
</div>

<div class="form-group" id="center">
<input type="reset">
<input type="submit" alt="Submit" name="form" value="Enviar">
</div>

</fieldset>

</form>



<form action=""  enctype="multipart/form-data" autocomplete="on" target="black" method="POST" >
  <fieldset>
  <legend>IMPORTANTISIMO DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
</legend>
    
<div class="form-group" id="backgroundcolor">
<label for="archivo">Word</label>

<input type="file" id="archivo" name="word[]"  pattern="([^\s]+(\.(?i)(doc|docx))$)"  accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
</div>

<div class="form-group" id="center">
<input type="reset">
<input type="submit" alt="Submit" name="form" value="Enviar">
</div>

</fieldset>

</form>



<form action=""  enctype="multipart/form-data" autocomplete="on" target="black" method="POST" >
  <fieldset>
  <legend>IMPORTANTISIMO DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
</legend>
    
<div class="form-group" id="backgroundcolor">
<label for="archivo">Words</label>

<input type="file" id="archivos" name="words[]"  pattern="([^\s]+(\.(?i)(doc|docx))$)" multiple="multiple" accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
</div>

<div class="form-group" id="center">
<input type="reset">
<input type="submit" alt="Submit" name="form" value="Enviar">
</div>

</fieldset>

</form>


<form action=""  enctype="multipart/form-data" autocomplete="on" target="black" method="POST" >
  <fieldset>
  <legend>IMPORTANTISIMO DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
</legend>
    
<div class="form-group" id="backgroundcolor">
<label for="archivo">Excel</label>

<input type="file" id="archivo" name="excel[]"  accept=".csv,text/csv,.xlsx,.xls" pattern="^.+\.(xlsx|xls|csv)$" />
</div>

<div class="form-group" id="center">
<input type="reset">
<input type="submit" alt="Submit" name="form" value="Enviar">
</div>

</fieldset>

</form>


<form action=""  enctype="multipart/form-data" autocomplete="on" target="black" method="POST" >
  <fieldset>
  <legend>IMPORTANTISIMO DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
</legend>
    
<div class="form-group" id="backgroundcolor">
<label for="archivo">Excels</label>

<input type="file" id="archivos" name="excels[]"  accept=".csv,text/csv,.xlsx,.xls" multiple="multiple" pattern="^.+\.(xlsx|xls|csv)$" />
</div>

<div class="form-group" id="center">
<input type="reset">
<input type="submit" alt="Submit" name="form" value="Enviar">
</div>

</fieldset>

</form>


<form action=""  enctype="multipart/form-data" autocomplete="on" target="black" method="POST" >
  <fieldset>
  <legend>IMPORTANTISIMO DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
</legend>
    
<div class="form-group" id="backgroundcolor">
<label for="archivo">Sonidos</label>

<input type="file" id="archivos" name="sonidos[]"  pattern="([^\s]+(\.(?i)(mp3|mpeg))$)" multiple="multiple" accept="audio/mpeg, audio/mp3"   />
</div>

<div class="form-group" id="center">
<input type="reset">
<input type="submit" alt="Submit" name="form" value="Enviar">
</div>

</fieldset>

</form>




<form action=""  enctype="multipart/form-data" autocomplete="on" target="black" method="POST" >
  <fieldset>
  <legend>IMPORTANTISIMO DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
</legend>
    
<div class="form-group" id="backgroundcolor">
<label for="archivo">Sonido</label>

<input type="file" id="archivo" name="sonido[]"  pattern="([^\s]+(\.(?i)(mp3|mpeg))$)" accept="audio/mpeg, audio/mp3"   />
</div>

<div class="form-group" id="center">
<input type="reset">
<input type="submit" alt="Submit" name="form" value="Enviar">
</div>

</fieldset>

</form>




<form action=""  enctype="multipart/form-data" autocomplete="on" target="black" method="POST" >
  <fieldset>
  <legend>IMPORTANTISIMO DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
</legend>
    
<div class="form-group" id="backgroundcolor">
<label for="archivo">Todos</label>
<input type="file" id="archivos" name="todos[]"  multiple="multiple"  />

</div>

<div class="form-group" id="center">
<input type="reset">
<input type="submit" alt="Submit" name="form" value="Enviar">
</div>

</fieldset>

</form>




<form action=""  enctype="multipart/form-data" autocomplete="on" target="black" method="POST" >
  <fieldset>
  <legend>IMPORTANTISIMO DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
</legend>
    
<div class="form-group" id="backgroundcolor">
<label for="archivo">Todo</label>

<input type="file" id="archivo" name="todo[]"  />
</div>

<div class="form-group" id="center">
<input type="reset">
<input type="submit" alt="Submit" name="form" value="Enviar">
</div>

</fieldset>

</form>







</div>
<?php
//if (isset($_FILES) ){
require_once "subirarchivos.php";
//DEBEMOS DE SUBIR UN ARCHIVO O ARCHIVOS  A LA VEZ NO MAS
//print_r($_FILES);
//$_FILES["imagen"]);

//}

   

?>
</div><!--fin ROW-->

</div><!--fin container-->
</body>
</html>