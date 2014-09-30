<?php
// this class creates and stores new listed ads
require_once('rad.class.php');

class radManager {

	public $dbc;

	public function __construct($dbc){
		$this->dbc = $dbc;

	}
}
	public function loadAds(){
		// prepares query stores id into $adsStmt
		$adsStmt = $this->dbc->query('SELECT id FROM items');
		//creates new array $ads
		$ads = [];

		//calls fetch and stores new ad as a new row
		while($row = $adsStmt->fetch(PDO::FETCH_ASSOC)){

			$ad = new Ad($this->dbc, $row['id']);
			//stores the row into new array
			$ads[] = $ad;
		}
		return $ads;
	}
}

