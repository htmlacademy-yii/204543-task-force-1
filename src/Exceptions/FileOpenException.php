<?php
    /**
    * Класс-исключение для проверки открылся ли csv-файл
    */

namespace YiiTaskForce\Exceptions;

class FileOpenException extends \Exception
{
    /*
    * @param $message является обязательным
    */
    public function __construct ($message = null)
    {
        parent::__construct($message);
    }
}
