<?php

class requestModel {

    public function returnUniqueData($table) {
        global $db;

        $query = $db->query("SELECT * FROM $table");
        $request = $query->fetch();

        return $request;
    }

    public function returnAllData($table) {
        global $db;

        $query = $db->prepare("SELECT * FROM $table");
        $query->execute();

        return $query;
    }
    
    public function returnPageData($url) {
        global $db;

        $query = $db->prepare("SELECT * FROM page WHERE route = '$url'");
        $query->execute();
        $res = $query->fetchAll();
        $query->closeCursor();
         
        return $res;
    }

    public function returnAllDataByIdType($table, $id_type, $id) {
        global $db;

        $query = $db->prepare("SELECT * FROM $table WHERE $id_type = $id");
        $query->execute();

        return $query;
    }

}
