<?php
 
require_once('Ad.class.php');
 
class AdManager {
 
    public $dbc;
 
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
 
    public function loadAds()
    {
        $adsStmt = $this->dbc->query('SELECT id FROM items');
 
        $ads = [];
 
        while($row = $adsStmt->fetch(PDO::FETCH_ASSOC))
        {
            $ad = new Ad($this->dbc, $row['id']);
            
            $ads[] = $ad;
        }
 
        return $ads;
    }
}