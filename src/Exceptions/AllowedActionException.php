<?php
    /**
    * Класс-исключение для проверки допустимого действия в задании для TaskStatus::getActiveStatus();
    */

namespace YiiTaskForce\Exceptions;

class AllowedActionException extends \Exception
 {
        /*
         * @param $message является обязательным
         */
    public function __construct ($message = null)
    {
        parent::__construct($message = "");
    }
}
