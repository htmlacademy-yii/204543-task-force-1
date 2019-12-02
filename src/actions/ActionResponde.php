<?php

    namespace YiiTaskForce\Actions;

    class ActionRespond extends Action
    {
        public static function getClassName ()
        {
            $className = get_class();

            return $className;
        }

        public static function getInnerName ()
        {
            $innerName = 'to_respond';

            return $innerName;
        }

        public $roleUser; // = получаем из результата запроса 'SELECT id_executor FROM TABLE Task WHERE id_author = $userId';

        public static function checkUserAccess (int $userId, string $roleUser)
        {
            if (!$roleUser) {
                echo 'Нет прав откликнуться на задание!';
            }
                return true;
        }

    }
