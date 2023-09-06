<?php
$secret = "1234567890";

//$message = "message1";
$message = '{"command":"register","apiKey":"fyty8-78r7t78-yuf88","userId":"1"}';



$sig = hash_hmac('sha256', $message, $secret, true);

//Base64 URL Encode the Created Token Signature
$sig_base64_urlencoded = base64url_encode($sig); //from /app/includes/other-functions-api.php
echo "<br>sig_base64_urlencoded: " . $sig_base64_urlencoded . "<br>";

echo "********************";


$message1 = '{"command":"register","apiKey":"fyty8-78r7t78-yuf88","userId":"1","signature":"hkgfyif86r6743e86er68e76e5e8e86ifiyg788ytf97t79t="}';

$message1_json_decoded = json_decode($message1);
echo "object properties:<br><pre>";
var_dump($message1_json_decoded);
echo "<br>";
$message1_json_decoded = extractObjectPropertiesExceptSignature($message1_json_decoded);
echo "object properties after signature removal:<br><pre>";
var_dump($message1_json_decoded);
echo "<br>";
$message1_json_decoded_string = json_encode($message1_json_decoded);



$sig1 = hash_hmac('sha256', $message1_json_decoded_string, $secret, true);

//Base64 URL Encode the Created Token Signature
$sig1_base64_urlencoded = base64url_encode($sig1); //from /app/includes/other-functions-api.php
echo "<br>sig1_base64_urlencoded: " . $sig1_base64_urlencoded . "<br>";

function base64url_encode($s) {
	return str_replace(array('+', '/'), array('-', '_'), base64_encode($s));
}


function base64url_decode($s) {
	return base64_decode(str_replace(array('-', '_'), array('+', '/'), $s));
}

echo "random int: " . random_int(100000000000000000, 999000000000000000) . "<br>";
echo "random bytes: " . random_bytes(1000) . "<br>";
echo "<br>openssl_random_pseudo_bytes: " . openssl_random_pseudo_bytes(1000) . "<br>";


function extractObjectPropertiesExceptSignature(object $message) {
	
	$object = new \stdClass();
	
	foreach ($message as $key => $value) {
		
		if ($key != "signature") {
			
			$object->$key = $value;
			
		}
		
	}
	
	return $object;
	
}

/*

jsfiddle.net

username: raghuveer_d
password: LHxHWCuLB2G7W3d
email: raghuveer.dendukuri@gmail.com



https://jsfiddle.net/znp1d46j/



Complete js code in: https://jsfiddle.net/raghuveer_d/foghp84d/1/

HTML:

<div id="output"></div>

JS:

var obj = {command:'register',apiKey:'fyty8-78r7t78-yuf88',userId:'1'};
var myJSON = JSON.stringify(obj);

var hash = CryptoJS.HmacSHA256(myJSON, "1234567890");
var hashInBase64 = CryptoJS.enc.Base64.stringify(hash);

  
/* Testing our replaceAll() function  */
//var myStr = 'if the facts do not fit the theory, change the facts.';
var newStr = replaceAll(hashInBase64, '+', '-');

var newStr1 = replaceAll(newStr, '/', '_');

//https://www.tutorialrepublic.com/faq/how-to-replace-all-occurrences-of-a-string-in-javascript.php
function escapeRegExp(string){
    return string.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
}
    
/* Define functin to find and replace specified term with replacement string */
function replaceAll(str, term, replacement) {
    return str.replace(new RegExp(escapeRegExp(term), 'g'), replacement);
}
    

document.getElementById('output').innerHTML = newStr1;




//https://jsfiddle.net/jStefano/gm7boy2p/
//javascript
var hash = CryptoJS.HmacSHA256("message1", "123456secret");
var hashInBase64 = CryptoJS.enc.Base64.stringify(hash);

Javascript: CRHgadUeAvSjs/gtHYTJKWQTy+Bd7CVRON/9f7TmvgE=
php: CRHgadUeAvSjs_gtHYTJKWQTy-Bd7CVRON_9f7TmvgE=

*/



/*

{"command":"register","apiKey":"fyty8-78r7t78-yuf88","userId":"1","signature":"hkgfyif86r6743e86er68e76e5e8e86ifiyg788ytf97t79t="}


var obj = {command: "register", apiKey: "fyty8-78r7t78-yuf88", userId: "1"};
var myJSON = JSON.stringify(obj);


//https://jsfiddle.net/jStefano/gm7boy2p/
//javascript
var hash = CryptoJS.HmacSHA256("message1", "123456secret");
var hashInBase64 = CryptoJS.enc.Base64.stringify(hash);

Javascript: CRHgadUeAvSjs/gtHYTJKWQTy+Bd7CVRON/9f7TmvgE=
php: CRHgadUeAvSjs_gtHYTJKWQTy-Bd7CVRON_9f7TmvgE=

*/



?>
