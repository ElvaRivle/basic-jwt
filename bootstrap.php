<?
error_reporting(-1);
ini_set('display_errors', "On");
require 'vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = new DotEnv(__DIR__);
$dotenv->load();


function base64UrlEncode($text) {
	return str_replace(
		['+', '/', '='],
		['-', '_', ''],
		base64_encode($text)
	);
}


?>
