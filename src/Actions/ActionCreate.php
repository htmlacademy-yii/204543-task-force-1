<?php

    namespace YiiTaskForce\Actions;

    class ActionCreate extends Action
    {
        public static function getClassName ()
        {
            return self::class;
        }

        public static function getInnerName ()
        {
            $innerName = 'to_create';

            return $innerName;
        }

       /**
        * функция проверки права пользователя на выполнение действия
        * @param $userId;
        * @param $clientId;
        * @param $executorId;
        * @return bool;
        */

        public static function checkUserAccess  (int $userId, int $clientId, int $executorId ) : bool {

            if (!$clientId && $userId == $executorId) {

                return false;
            }
                return true;
        }
    }


    // Проверка вывода имени и внутренного имени класса

    /*
    $unit = new ActionCancel;
        echo ActionCancel::getClassName();
        echo ActionCancel::getInnerName();
    */

