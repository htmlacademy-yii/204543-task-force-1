<?php

namespace YiiTaskForce\Actions;

use YiiTaskForce\Exceptions\WrongUserRoleException;

class ActionCreate extends ActionAbstractAction
{

    public $userId;

    public $clientId = 1;

    public $executorId = 2;


    public static function getInnerName (): string
    {
        $innerName = 'to_create';

        return $innerName;
    }

   /**
    * функция проверки права пользователя на выполнение действия
    * @param int $userId;
    * @param int $clientId;
    * @param int $executorId;
    * @return bool;
    */
   public static function checkUserAccess  (int $userId, int $clientId, int $executorId ) : bool
    {
         return ($userId == $clientId && $userId !== $executorId);
    }
}
