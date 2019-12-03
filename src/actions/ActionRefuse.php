<?php

    namespace YiiTaskForce\Actions;

    class ActionRefuse extends Action
    {
             public static function getClassName ()
        {
            $className = get_class();

            return $className;
        }

        public static function getInnerName ()
        {
            $innerName = 'to_refuse';

            return $innerName;
        }

       public $roleUser; // = получаем из результата запроса 'SELECT id_author FROM TABLE Task WHERE id_author = $userId';

        public static function checkUserAccess (int $userId, string $roleUser)
        {
            if ($userId ==2 || $roleUser == 'executor') {
                echo 'Нет прав на отказ от приёмки задания!';
            }
                return true;
        }
    }
