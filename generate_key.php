<?
$secret = bin2hex(random_bytes(32));
echo "Secret:\n";
echo $secret."\n";
echo "\n\nCopy this key to the .env file\n\n";
?>
