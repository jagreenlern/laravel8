<?php
class convertirdatos
{





public static function convertir($dato,$tipo)
{
try
{
//Required. Specifies the type to convert variable to. The possible types are: boolean, bool,
//integer, int, float, double, string, array, object, null 
if ($tipo =="boolean" || $tipo=="bool")
{
    return settype($dato, $tipo);
}
elseif ($tipo =="integer" || $tipo=="int")
{
    return settype($dato, $tipo);
}
elseif ($tipo =="boolean" || $tipo=="bool")
{
    return settype($dato, $tipo);
}
elseif ($tipo =="float" )
{
    return settype($dato, $tipo);
}
elseif ($tipo =="double")
{
    return settype($dato, $tipo);
}
elseif ($tipo =="string")
{
    return settype($dato, $tipo);
}
elseif ($tipo =="array")
{
    return settype($dato, $tipo);
}
elseif ($tipo =="object")
{
    return settype($dato, $tipo);
}
elseif ($tipo =="null")
{
    return settype($dato, $tipo);
}
}    
catch (PDOException $e)
{
    $this->SQL_Error ($e, $query);
}

}//fun
}//clas

?>