<?php
header('Content-type: application/json');
session_start(); 

date_default_timezone_set('America/Sao_Paulo');

include_once("../MercadoPago/autoload.php");

MercadoPago\SDK::setAccessToken('SEU CODIGO');
MercadoPago\SDK::setClientId('SEU CODIGO');
MercadoPago\SDK::setClientSecret('SEU CODIGO');

$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->id = "00001";
$item->title = "Seu titulo"; 
$item->quantity = 1;
$item->unit_price = $valor;

$preference->items = array($item);

$refApostas = 2100;

$codReferencia = rand();

$codReferencia = $refApostas.$codReferencia;

$preference->external_reference = $codReferencia;

$preference->payment_methods = array(
  "excluded_payment_types" => array(
	array("id" => "digital_wallet"),
	array("id" => "ticket"),
	array("id" => "bank_transfer")
  ),
  "installments" => 1
);
$preference->back_urls = array('success' => 'SUA URL', 'pending' => "SUA URL", "failure" => "SUA URL");

$preference->notification_url = 'SUA URL IPN';

$preference->save(); 

echo json_encode($preference->init_point);

?>

