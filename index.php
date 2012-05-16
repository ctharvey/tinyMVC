<?
include('config.php');
include('core/framework.php');
function exceptionHandle($exc){
    echo "<b>Exception:</b> ". $exc->getMessage();
}
set_exception_handler('exceptionHandle');

//check autoload locations from config
foreach(config::$autoload as $location){
    foreach(scandir(__DIR__.'/'.$location) as $file){
        if($file != '.' && $file != '..' && $file != 'framework.php'){
            include(__DIR__.'/'.$location.'/'.$file);
        }
    }
}

$routes = new routes();



//var_dump(utilities::getRandomNum(0, 200));
//var_dump(utilities::getRequest('test', true));
//$echelon = new Echelon();
//$database = new database('minederp');
