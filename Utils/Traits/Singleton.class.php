<?php

trait Singleton {
    use SayMyName;
    protected static $theInstance;

    public static function getInstance(){
        if(empty(static::$theInstance)){
            $className = static::className();
            static::$theInstance = new $className;
        }
        return static::$theInstance;
    }    
}