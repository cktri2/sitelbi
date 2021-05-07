<?php
/**
 * Description of SayMyName
 *
 * @author CK
 */
trait InitFuctionsParams {   
    public function checkParams($params=[],$keysToCheck=[],$valueToInit=[],$default=null)
    {
        $result = [];
        $initDefault = $default;
        foreach ($keysToCheck as $keyToCheck)
        {   
            if(array_key_exists($keyToCheck, $valueToInit)){
                $default = $valueToInit[$keyToCheck];
            }
            if(array_key_exists($keyToCheck,$params)){
                $value = $params[$keyToCheck];
            } else {
                $value = $default;
            }
            $result[$keyToCheck]=$value;
            $default = $initDefault;
        }
        return $result;
    }
}
