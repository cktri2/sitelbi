<?php

function my_autoloaderController($classe) {    
    $pathClass = CONTROLLER.DS.$classe.".class.php";
    if(file_exists($pathClass)) {
        require_once $pathClass;
    }
    my_autoloaderUtilsTraits($classe);
    require_once(ROOT.DS.'vendor'.DS.'autoload.php');
}
function my_autoloaderUtilsTraits($classe) {
    $pathClass = UTILS.DS.'Traits'.DS.$classe.".class.php";
    if(file_exists($pathClass)) {
        require_once $pathClass;
    }    
}
spl_autoload_register("my_autoloaderController");

// require_once MODEL.DS."bdd.php";
require ROOT.DS.'router.php';
