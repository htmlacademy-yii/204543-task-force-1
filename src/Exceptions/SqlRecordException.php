<?php 

/**
    * Класс-исключение для проверки записи данных в sql-файл
    */

namespace YiiTaskForce\Exceptions;

class SqlRecordException extends \Exception
{
    /*
    * @param $message является обязательным
    */
    public function __construct ($message = null)
    {
        parent::__construct($message);
    }
}
