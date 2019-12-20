<?php
    /**
    * Класс-исключение для проверки роли пользователя в задании для     AvailableActions::getAvailableActions();
    */

namespace YiiTaskForce\Exceptions;

class WrongUserRoleException extends \Exception
{
        /*
         * @param $message является обязательным
         */
        public function __construct ($message = null)
        {
            parent::__construct($message);
        }
}
