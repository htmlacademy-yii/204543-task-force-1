<?php 

/**
    * Класс-исключение для проверки существования csv-файла
    */

namespace YiiTaskForce\Exceptions;

class DdConnectException extends \Exception
{
    /*
    * @param $message является обязательным
    */
    public function __construct ($message = null)
    {
        parent::__construct($message);
    }
}

