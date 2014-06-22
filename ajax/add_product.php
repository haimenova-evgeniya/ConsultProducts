<?php
define( 'BASE_PATH', __DIR__ . "/../" );

require_once BASE_PATH.'config/config.php';
require_once BASE_PATH.'model/dal.php';

// exit;
$fields = array(
	'barcode' => $_POST['barcode'],
	'name'    => $_POST['name'],
	'description' => $_POST['description'],
	'category' 	=> $_POST['category'],
	'purchase_price' => $_POST['purchasePrice'],
	'retail_price' => $_POST['retailPrice'],
	'amount' => $_POST['amount']
);
$status = false;
if (isset($fields['barcode']) && isset($fields['name']) && isset($fields['category']) && 
	is_numeric($fields['purchase_price']) && is_numeric($fields['retail_price']) && is_numeric($fields['amount'])) {

	$dal = new DAL( $db_config );
	$dal->addProduct($fields);

	$status = true;
	echo $status;
}
else {
	echo $status;
}
?>