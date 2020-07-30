<?
require 'bootstrap.php';

$secret = getenv('SECRET');

$header = json_encode([
	'typ' => 'JWT',
	'alg' => 'HS256'
]);

$payload = json_encode([
	'user_id' => 1,
	'role' => 'admin',
	'exp' => 1596132000
]);
#exp is set to 30.7.2020 20:00h
#change as you wish, link in README

$base64UrlHeader = base64UrlEncode($header);
$base64UrlPayload = base64UrlEncode($payload);

$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);

$base64UrlSignature = base64UrlEncode($signature);

$jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

echo "Your token is:\n" . $jwt . "\n\n";


?>
