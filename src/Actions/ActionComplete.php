<?php

    namespace YiiTaskForce\Actions;

    class ActionComplete extends AbstractAction
    {
        public static function getClassName ()
        {
            return self::ActionComplete;
        }

        public static function getInnerName ()
        {
            $innerName = 'to_complete';
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

          return $userId == $clientId;
        }
    }
