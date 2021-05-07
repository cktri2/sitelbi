<?php

class jsonController {

 public function returnDecodeJson($file) {
   $fileJSON = file_get_contents($file);
   $json = json_decode($fileJSON);

   return $json;
 }

}
