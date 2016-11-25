To run tests you need a phpunit.

Composer. In case you don't have it yet install it first:
https://getcomposer.org/

then install phpunit:
composer install

to run a test execute the following:
phpunit --bootstrap=autoload.php tests/ReceiptItemTest.php

or if you wanna run them all:
phpunit --bootstrap=autoload.php tests
