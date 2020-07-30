/etc/php/__version__/cli/php.ini  
enable short open tags  
run composer install    

## THIS IS CLI SCRIPT, NOT WEB BASED  
create .env file just like .env.example (you can copy)  
then run generate_key  
paste that key in .env in SECRET  
then run generate_jwt  
exp field in json object is made by unix timestaps  
after that, run validate_jwt and provide actual key as argument  
watch out for GMT/Local time timestamp (CEST for Bosnia and Herzegovinab): https://www.epochconverter.com/
