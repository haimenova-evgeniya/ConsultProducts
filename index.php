<?php
define( 'BASE_PATH', __DIR__ . "/" );

require_once BASE_PATH.'config/config.php';
require_once BASE_PATH.'model/dal.php';
require_once 'inc/View.class.php';

header( 'Content-Type: text/html; charset=utf-8' );
$view = new View( 'views/template.php' );

$dal = new DAL( $db_config );
$view->listProducts = $dal->getListProducts();
$view->display();

?>