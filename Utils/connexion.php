<?php 
require_once ROOT.DS.'Utils'.DS.'Database.php';
require_once ROOT.DS.'Utils'.DS.'PdoWrapper.php';

class Connection
{
    const ERROR_MSG = 'Erreur de connexion, veuillez nous excuser pour ce désagrément.';
    const LOST_CX_MSG = 'MySQL server has gone away';

    /**
     * @var PdoWrapper
     */
    
    protected $pdo;
    
    public function __construct(Database $db)
    {
        try{
            $this->pdo = new Pdo($db->getDsn(), $db->getLogin(), $db->getPwd(), $db->getOptions());
            $this->pdo->exec('SET NAMES utf8');
            $this->devConfig();
        } catch ( \PDOException $dbex ) {
            throw new \Exception(self::ERROR_MSG);
        }
    }
    

    /**
     * @return Pdo
     */
    public function getCx()
    {
        return $this->pdo;
    }
    
}
?>