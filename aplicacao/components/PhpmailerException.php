<?php
/**
* PHPMailer exception handler
* @package PHPMailer
*/
namespace components;

class PhpmailerException extends Exception
{
/**
* Prettify error message output
* @return string
*/
public function errorMessage()
{
$errorMsg = '<strong>' . $this->getMessage() . "</strong><br />\n";
return $errorMsg;
}
}
