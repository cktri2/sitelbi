<?php

define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);

if(isset($_COOKIE) && !empty($_COOKIE)) {
    if($_COOKIE['username'] == 'lbi!...84') {
        define('ASSETS', ROOT.DS.'assets');
        define('MODULES', ROOT.DS.'modules');
        define('VIEW', ROOT.DS.'vueTemplate');
        define('CONTROLLER', ROOT.DS.'controller');        
        define('UTILS', ROOT.DS.'Utils');
        define('CONTROLLERMODULES', ROOT.DS.'controller/modules');
        define('MODEL', ROOT.DS.'model');
        define('JSON', ASSETS.DS.'json');
        $url = '/';
        if(isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
        }
        require ROOT.DS."includes.php";
        if(isset($newView) && !!$newView && isset($newView['type'])&& $newView['type'] !== 'popin' && false === $isJsonReponse) {
            require_once CONTROLLER . DS . "uikit/default.php";
        }
    } else {
        if(isset($_GET['url']) && $_GET['url'] !== null && $_GET['url'] !== '' && $_GET['url'] != '/'){
            header('Location: /'); 
        }
        include ROOT.DS.'security.php';
    }
} else {
    if(isset($_GET['url']) && $_GET['url'] !== null && $_GET['url'] !== '' && $_GET['url'] != '/'){
        header('Location: /'); 
    }
    include ROOT.DS.'security.php';
}

