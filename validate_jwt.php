<?

require 'bootstrap.php';
use Carbon\Carbon;

$secret = getenv('SECRET');

if (!isset($argv[1])) {
	exit('Please provide key to verify');
}

$jwt = $argv[1];

$tokenParts = explode('.', $jwt);

$header=base64_decode($tokenParts[0]);
$payload=base64_decode($tokenParts[1]);
$signatureProvided = $tokenParts[2];

$expiration = Carbon::createFromTimestamp(json_decode($payload)->exp);
$expiration->setTimeZone('CEST');
$tokenExpired = (Carbon::now()->diffInSeconds($expiration, false) < 0);


$base64UrlHeader = base64UrlEncode($header);
$base64UrlPayload = base64UrlEncode($payload);
$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
$base64UrlSignature = base64UrlEncode($signature);

$signatureValid = ($base64UrlSignature === $signatureProvided);

echo "Header:\n" . $header . "\n";
echo "Payload:\n" . $payload . "\n";

if ($tokenExpired) {
	echo "Token has expired.\n";
}
else {
	echo "Token hasn't expired yet.\n";
}

if ($signatureValid) {
	echo "The signature is valid.\n";
}
else {
	echo "The signature is NOT valid.\n";
}






?>
