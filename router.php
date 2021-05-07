<?php
/**
 * @author chiheb khemir
 * catch url for json ws
 */

function isJsonReponse($url)
{ 
    return (!!$url && is_array($url) && count($url) === 2 && $url[0] === 'json' && method_exists('JsonReponseController',$url[1])); 
}
$isJsonReponse = isJsonReponse($url);
if($isJsonReponse){
    $jsonReponseController = JsonReponseController::getInstance();
    $urlPart = explode('?', $url[1]);
    $action = $urlPart[0];
    $jsonReponseController->{$action}();    
} else {
    $view = [];
    $jsonUrl = json_decode(file_get_contents(JSON. '/arborescence.json'), true);
    $jsonModules = json_decode(file_get_contents(JSON. '/modules.json'), true);
    $styleCompile = '';
    $newRoute = '';
    $ds = '/';
    /*
     * !! il faut remplacer ce code par un simple implode
     */
    if($url != '/') {
        if(!empty($url)) {
            if(isset($url[1]) && !empty($url[1])) {
                for ($i = 0; $i < count($url); $i++) {
                    if($i + 1 == count($url)) {
                        $ds = '';
                    }
                    $newRoute = $newRoute . $url[$i] . $ds;
                }
            }
            else {
              $newRoute = $newRoute . $url[0];
            }
            $newView = (isset($jsonUrl[$newRoute]) && !!$jsonUrl[$newRoute])?$jsonUrl[$newRoute]:null;
        }
    } else {
        $newView = $jsonUrl['index'];
    }

    if(preg_match('/^(popin_)/', $url[0])) {
        include CONTROLLERMODULES . DS . 'popin' . DS . $newRoute . '.php';
    } else {
        foreach($jsonUrl as $element) {
            if($element['url'] == $newRoute) {
                $newView = $element;
                break;
            }
        }
    }
}