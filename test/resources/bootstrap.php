<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', realpath(__DIR__ . "/.."));
}
if (!defined('TMPDIR')) {
    define('TMPDIR', '/tmp');
}
require_once implode(DIRECTORY_SEPARATOR, array(
  __DIR__, "..", "..", "vendor", "autoload.php"
));

\PAMI\Message\Action\ActionMessage::setActionIdGenerator(static fn (): string => '1432.123');

require_once implode(DIRECTORY_SEPARATOR, array(
  __DIR__, "mockSetup.php"
));

/* Set phpunit defaults */
//define("PHPUnit_Username", "Fuuu");
// or
//$phpunitConfig = new Array(
//    $this->_properties = array();
//)

/* Global Settings for unit Testing */
global $mockTime;
$mockTime = true;
