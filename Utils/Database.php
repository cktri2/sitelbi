<?php
/**
 * Description of Database
 *
 * @author ck
 */
class Database {
    protected $dsn;
    protected $login;
    protected $pwd;
    protected $options;

    public function __construct($dsn, $login = 'root', $pwd = '', $options = array()) {
        $this->dsn = $dsn;
        $this->login = $login;
        $this->pwd = $pwd;
        $this->options = $options;
    }

    public function getDsn() {
        return $this->dsn;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPwd() {
        return $this->pwd;
    }

    public function getOptions() {
        return $this->options;
    }
}
