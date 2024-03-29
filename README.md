# HMAC
> A very simple and safe PHP library that provides methods to handle HMAC in applications.


### Getting started
With Composer, run

```sh
composer require easeappphp/hmac:^1.0.3
```

Note that the `vendor` folder and the `vendor/autoload.php` script are generated by Composer; they are not part of PDOLight.

To include the library,

```php
<?php
require 'vendor/autoload.php';

use \EaseAppPHP\Hmac\Hmac;

$hmac = new Hmac();

```

### Create Secret Key

```php
$secretKey = $hmac->createSecret(1000, true, true);
```

### Create Signature

```php

$message = "Hello!, I am creating a Signature with the HMAC Class";

$createdSignature = $hmac->createSignature("sha256", $message, $secretKey, true, true);
```

### Verify Signature

```php
$signatureVerificationResult = $hmac->verifySignature($createdSignature, $userSuppliedSignature);

echo "verification result: <br>";
var_dump($signatureVerificationResult);
```

## License
This software is distributed under the [MIT](https://opensource.org/licenses/MIT) license. Please read [LICENSE](https://github.com/easeappphp/PDOLight/blob/main/LICENSE) for information on the software availability and distribution.
