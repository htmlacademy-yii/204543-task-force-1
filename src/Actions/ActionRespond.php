<?php

    namespace YiiTaskForce\Actions;

    require_once ('C:\OpenServer\domains\localhost\YiiTaskForce\vendor\autoload.php');

    class ActionRespond extends Action
    {
        public static function getClassName ()
        {
            return self::class;
        }

        public static function getInnerName ()
        {
            $innerName = 'to_respond';

            return $innerName;
        }

        public $roleUser; // = получаем из результата запроса 'SELECT id_executor FROM TABLE Task WHERE id_author = $userId';

        public static function checkUserAccess (int $userId, string $roleUser)
        {
            if ($userId == 1 || $roleUser == 'client') {
                echo 'Нет прав откликнуться на задание!';
            }
                return true;
        }

    }
