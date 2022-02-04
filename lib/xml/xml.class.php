<?php


class xml{

    public $ruta;
    
/*
    public function __construct($host = 'localhost',$db = 'tblprod',    $user = 'root',$password = '',$charset = 'utf8mb4')
    {
        //session_start();
    
        $this->db = $db;
        $this->user = $user;
        $this->password = $password;
        $this->charset = $charset;
    }
    */
    public function __construct($ruta)
    {
        $this->ruta = $ruta;
        
    }

public function leerxml()
{
    try{

    
	/* Empezamos con una matriz de datos que puede proceder de cualquier fuente
	(p.e. una lectura de base de datos) */
	$matrizDeObras = array(
		array(
			"obra"=>"Construcción de aparcamiento en el centro",
			"fecha_de_inicio"=>"10/02/2015",
			"fecha_de_finalizacion"=>"31/10/2016",
			"contratista"=>"Actuaciones Urbanas",
			"miembros_tecnicos"=>"3",
			"personal_tecnico"=>array(
				"arquitecto"=>"Pedro Steven De Gloria",
				"aparejador"=>"Manuela Gracia Salmerón", 
				"supervisor"=>"Andrés Garrido Fuentes"
			),
			"presupuesto"=>"20.000.000"
		),
		array(
			"obra"=>"Adaptación de estación suburbana",
			"fecha_de_inicio"=>"06/08/2016",
			"fecha_de_finalizacion"=>"01/11/2016",
			"contratista"=>"Obras del Norte",
			"miembros_tecnicos"=>"4",
			"personal_tecnico"=>array(
				"arquitecto"=>"Manuel Alarcón Rodríguez",
				"aparejador"=>"Carlos Torres Fuentes", 
				"director_de_tunelacion"=>"María García Pérez",
				"jefe_de_compras"=>"Antonia Bisonette Tristán"
			),
			"presupuesto"=>"6.500.000"
		),
		array(
			"obra"=>"Electrificación de zona restringida",
			"fecha_de_inicio"=>"02/02/2014",
			"fecha_de_finalizacion"=>"26/05/2017",
			"contratista"=>"Iluminación y Electricidad, SA",
			"miembros_tecnicos"=>"2",
			"personal_tecnico"=>array(
				"jefe_de_electricistas"=>"Laura De la Iglesia Cifuentes",
				"responsable_de_control"=>"Yolanda Torres Torres"
			),
			"presupuesto"=>"7.800.000"
		)
	);
 

	$canciones=simplexml_load_file("nodos.conf.xml") or die("Error: Cannot create object");
	//print_r($xml);
	
	

    return $canciones;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}//functionss   


public function leermostrandoxml()
{
    try{
        
	/* Empezamos con una matriz de datos que puede proceder de cualquier fuente
	(p.e. una lectura de base de datos) */
	$matrizDeObras = array(
		array(
			"obra"=>"Construcción de aparcamiento en el centro",
			"fecha_de_inicio"=>"10/02/2015",
			"fecha_de_finalizacion"=>"31/10/2016",
			"contratista"=>"Actuaciones Urbanas",
			"miembros_tecnicos"=>"3",
			"personal_tecnico"=>array(
				"arquitecto"=>"Pedro Steven De Gloria",
				"aparejador"=>"Manuela Gracia Salmerón", 
				"supervisor"=>"Andrés Garrido Fuentes"
			),
			"presupuesto"=>"20.000.000"
		),
		array(
			"obra"=>"Adaptación de estación suburbana",
			"fecha_de_inicio"=>"06/08/2016",
			"fecha_de_finalizacion"=>"01/11/2016",
			"contratista"=>"Obras del Norte",
			"miembros_tecnicos"=>"4",
			"personal_tecnico"=>array(
				"arquitecto"=>"Manuel Alarcón Rodríguez",
				"aparejador"=>"Carlos Torres Fuentes", 
				"director_de_tunelacion"=>"María García Pérez",
				"jefe_de_compras"=>"Antonia Bisonette Tristán"
			),
			"presupuesto"=>"6.500.000"
		),
		array(
			"obra"=>"Electrificación de zona restringida",
			"fecha_de_inicio"=>"02/02/2014",
			"fecha_de_finalizacion"=>"26/05/2017",
			"contratista"=>"Iluminación y Electricidad, SA",
			"miembros_tecnicos"=>"2",
			"personal_tecnico"=>array(
				"jefe_de_electricistas"=>"Laura De la Iglesia Cifuentes",
				"responsable_de_control"=>"Yolanda Torres Torres"
			),
			"presupuesto"=>"7.800.000"
		)
	);
 

	$canciones=simplexml_load_file("nodos.conf.xml") or die("Error: Cannot create object");
	//print_r($xml);
	
	
	foreach($canciones as $cancion)
	{
	
	echo "Controllerdefault: " . $cancion->controllerdefault ."<br>";
	echo "Actiondefault: " . $cancion->actiondefault . "<br>";
	echo "Idioma: " . $cancion->idioma ."<br>";
	echo "Fondo: " . $cancion->fondo ."<br>";
	echo "Letra: " . $cancion->letra ."<br>";
	
	
	
	}
    return $canciones;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}//functionss   

public function grabarxml($canciones)
{
    try
    {
	$nodoprincipal="configuracion";
    $controllerdefault	= "controllerdefault";
    $actiondefault="actiondefault";
    $idioma="idioma";
    $fondo="fondo";
    $letra="letra";
    
        
        
    
    
        // Convertimos la matriz a una cadena con formato XML.
        $textoXML = '<?xml version="1.0" encoding="UTF-8"?>';
        $textoXML .= "\n";
        $textoXML .= '<'. $nodoprincipal .'es>';
        $textoXML .= "\n";
        $textoXML .= '<'. $nodoprincipal .'>';
        foreach($canciones as $cancion)
        {
    
    
     
        
            $textoXML .= '<' . $controllerdefault .'>'.$cancion->controllerdefault.'</' . $controllerdefault.'>' ;
    
            $textoXML .= "\n";
            $textoXML .= '<' . $actiondefault .'>'.$cancion->actiondefault.'</' . $actiondefault.'>' ;
            
            $textoXML .= "\n";		
            $textoXML .= '<' . $idioma .'>'.$cancion->idioma.'</' . $idioma.'>' ;
            
            $textoXML .= "\n";
            $textoXML .= '<' . $fondo .'>'.$cancion->fondo .'</' . $fondo.'>' ;
            
            
            $textoXML .= "\n";
            $textoXML .= '<' . $letra .'>'.$cancion->letra .'</' . $letra.'>' ;
            
            
            $textoXML .= "\n";
        }
        $textoXML .= '</'. $nodoprincipal .'>';
            
            $textoXML .= "\n";
            $textoXML .= '</'. $nodoprincipal .'es>';
     
        // Nos aseguramos de que la cadena que contiene el XML esté en UTF-8
        $textoXML = mb_convert_encoding($textoXML, "UTF-8");
     
        // Grabamos el XML en el servidor como un fichero plano, para
        // poder ser leido por otra aplicación.
        $gestor = fopen("nodos.conf.xml", 'w');
        echo "grabado archivo de configuracion grabado exitosamente";
        fwrite($gestor, $textoXML);
        fclose($gestor);
    
        return $this->leerxml();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}//functionss   


public function actualizarxml($canciones,$arrayactualidos)
{
    try{
	$nodoprincipal="configuracion";
    $controllerdefault	= "controllerdefault";
    $actiondefault="actiondefault";
    $idioma="idioma";
    $fondo="fondo";
    $letra="letra";
   
        
        
    
    
        // Convertimos la matriz a una cadena con formato XML.
        $textoXML = '<?xml version="1.0" encoding="UTF-8"?>';
        $textoXML .= "\n";
        $textoXML .= '<'. $nodoprincipal .'es>';
        $textoXML .= "\n";
        $textoXML .= '<'. $nodoprincipal .'>';
        foreach($canciones as $cancion)
        {
    
    
     
        
            $textoXML .= '<' . $controllerdefault .'>'.$arrayactualidos["controllerdefault"].'</' . $controllerdefault.'>' ;
    
            $textoXML .= "\n";
            $textoXML .= '<' . $actiondefault .'>'.$arrayactualidos["actiondefault"].'</' . $actiondefault.'>' ;
            
            $textoXML .= "\n";		
            $textoXML .= '<' . $idioma .'>'.$arrayactualidos["idioma"].'</' . $idioma.'>' ;
            
            $textoXML .= "\n";
            $textoXML .= '<' . $fondo .'>'.$arrayactualidos["fondo"].'</' . $fondo.'>' ;
            
            
            $textoXML .= "\n";
            $textoXML .= '<' . $letra .'>'.$arrayactualidos["letra"] .'</' . $letra.'>' ;
            
            
            $textoXML .= "\n";
        }
        $textoXML .= '</'. $nodoprincipal .'>';
            
            $textoXML .= "\n";
            $textoXML .= '</'. $nodoprincipal .'es>';
     
        // Nos aseguramos de que la cadena que contiene el XML esté en UTF-8
        $textoXML = mb_convert_encoding($textoXML, "UTF-8");
     
        // Grabamos el XML en el servidor como un fichero plano, para
        // poder ser leido por otra aplicación.
        $gestor = fopen("nodos.conf.xml", 'w');
        fwrite($gestor, $textoXML);
        fclose($gestor);
        echo "Actualizado del archivo de configuracion";
        return $this->leerxml();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}//functionss   

}
?>
