<?php
/**
 * Description of Pdo
 *
 * @author ck
 */
class PdoWrapper extends \PDO {

    public function __construct($dsn, $username, $passwd, $options = array()) {
        parent::__construct($dsn, $username, $passwd, $options);
    }

    public function query($statement) {
        return parent::query($statement);
    }

    public function exec($statement) {
        return parent::exec($statement);
    }

    public function prepare($statement, $driver_options = array()) {
        return parent::prepare($statement, $driver_options);
    }
}
