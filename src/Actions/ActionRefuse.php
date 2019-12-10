<?php

    namespace YiiTaskForce\Actions;

    class ActionRefuse extends Action
    {
        public static function getClassName ()
        {
            return self::class;
        }

        public static function getInnerName ()
        {
            $innerName = 'to_refuse';

            return $innerName;
        }

       public $roleUser; // = получаем из результата запроса 'SELECT id_author FROM TABLE Task WHERE id_author = $userId';

        public static function checkUserAccess (int $userId, string $roleUser) : bool
        {
            if ($userId ==2 || $roleUser == 'executor') {
                return false;
            }
                return true;
        }
    }
