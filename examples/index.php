<?php
require '../vendor/autoload.php';

use \EaseAppPHP\Hmac\Hmac;

$hmac = new Hmac();

//$secretKey = $hmac->createSecret(1000, true, true);
$secretKey = "SZElSF11a5p0T6cgJ8VFU6xhXD4k5l-OP-Sz7-APJ_GhCz-CxyCOPtK9H710_HBZwr9PLjrod8CfUvnnwyc_8bZotnWNDgFyV_FaeM4BVzOljn3EwQHtONofbmSwxfxayRbv-dNB0FXi9Ruwsb4qovDuswFh74FrOsquvtfZnIzkOlS6rrMF6tJykmjD9qHPo3WDagk6-5daI7WaHkMqgUKi65A_HevUvbhZPERVtGjhNi7Bt3YzNkTxGcQA7Kv7HB1QH_xfl2o6smOSBYQ_Qa5Emg9PMB1ZoAC6_5_VOoojlzKHP2VE31t44JolaNIwujX6TA2rQch9RveUseAMHWEPdkndi-HKWM5Syea62Un0w81qilrsjBwV4-E1MTAYXVDNMBRoBVRI97-5OtoICh_vd57Fz25qmkeedcU1CO7UXxxW0j19y8ns42PFp1Xd2UgmGKpr3GBmK_t1OhWzxPWfpyhpGgGsOdKmkPPoTmd85wWrarqbI-pMODnr5avZm-jh1pXEhmo4q9udvu3Avh9xs3V0Ny31c--y6WUgKCSDcYaruiYHN9_26vDQhQRPxwDYQtHYlcSAt1PqAYmgwwEOP2j_-O_4sqhESCXL_smqa4DG9L2xJ4B6De6dqf4tBxSq-poY3gRojedBmw2PiS5OWa8c3uTmZ3mmonmknbcs-6wE3vfcBFD_40BojzpBxw9GdbLWXFs6FxEJc_rA7JH6CrfZguCRQCAX1-JCz_DwSlq9_CDnfuDZHUeOhvtx_7bsfKkeWdVWkhWU3APGC2R3YhmtNBXCxES-szne1OMzRGfI6tBIXw1MhXoy-BOskv3iFOMy2cNIqV8z9F0lMyv6aeCDX0nmkkXJSG8mI2HuCqLJY7LOYi8i7pezCu-RBnGkbBsU09JRsEsu9xfCRiXF-BfldhZ6Qv5T_osDtivU8P7_MTPqRM-HyGW1zXbg85kHyTaJM1ABNtmdMacLHk9RUfgmXWSQUCRH6TQnv6EbxLenD45DOwVj4plvyCv6RGHQUoEBMVZpyDAMrMS7YEbwpGhFTg5at60y1QXpOtNdgxMWWqruJVxq4SoGINl_P-ZcWJoUn-QHNxxFEBfJl2Dnc4wINF6OYtXB7C4sB5FNAHVfWTnw39HcKwoG6paNNqIxj2NskCvgoculVkxknwFqzKUNZ-2X2Ju0P7t0PTQDisv7tvsKP446_Mqhac-8g_c2MfY8JPTYc5y-TMNTsG27CeS14uzlbZOTHozq8HaN6SPfdY4nRdg3ZDir5Die7lkQGp-X9RqsXto3-jksxjl3bqQCT8z4L8y4evghqUb4lbRgq_Sjtw";
echo "secret key: " . $secretKey . "<br>";

$message = "Hello!, I am creating Signature with HMAC Class";
echo "message: " . $message . "<br>";

$createdSignature = $hmac->createSignature("sha256", $message, $secretKey, true, true);
echo "createdSignature: " . $createdSignature . "<br>";

$userSuppliedSignature = "eED-QWz9QPkMCOjz_D5BDqQ6TBB9awLE864zpnp1TDc";
$signatureVerificationResult = $hmac->verifySignature($createdSignature, $userSuppliedSignature);
echo "verification result: <br>";
var_dump($signatureVerificationResult);


?>
