<?php

class DAL {
	private $instance;
	private $db_config;

	function __construct( $config ) {
		$this->db_config = $config;
	}

	function __destruct() {
		if ( $this->instance != null ) {
			mysql_close( $this->instance );
		}
	}

	private function connect_to_mysql_db( $db_config ) {
		$link = mysqli_connect($db_config['host'], $db_config['user'], $db_config['pass'],$db_config['dbname']) 
		or die("Error " . mysqli_error($link)); 
		$this->instance = $link;
		return $this->instance;
	}

	private function GetInst() {
		if ( $this->instance != null ) {
			return $this->instance;
		} else {
			return $this->connect_to_mysql_db( $this->db_config );
		}
	}

	public function getListProducts() {
		$link = $this->GetInst();
		$query = "SELECT * FROM  products LIMIT 100";

		if (!$result = mysqli_query($link, $query)) {
		  die('Error: ' . mysqli_error($link));
		}
		$data = array();
		while($row = mysqli_fetch_array($result)) {
			array_push($data, $row);
		}
		return $data;
	}


	public function addProduct($fields) {
		$link = $this->GetInst();
		$query = sprintf("INSERT INTO products (barcode, name, description, category, purchase_price, retail_price, amount)
						VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s') ",
		    mysql_real_escape_string($fields['barcode']),
		    mysql_real_escape_string($fields['name']),
		    mysql_real_escape_string($fields['description']),
		    mysql_real_escape_string($fields['category']),
		    mysql_real_escape_string($fields['purchase_price']),
		    mysql_real_escape_string($fields['retail_price']),
		    mysql_real_escape_string($fields['amount'])
		    );
		if (!mysqli_query($link, $query)) {
		  die('Error: ' . mysqli_error($link));
		}
	}

}


?>
