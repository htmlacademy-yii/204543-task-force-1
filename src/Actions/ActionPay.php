<?php

    namespace YiiTaskForce\Actions;

    class ActionPay extends Action
    {
            public static function getClassName ()
        {
            return self::ActionPay;
        }

        public static function getInnerName ()
        {
            $innerName = 'to_pay';
            return $innerName;
        }

        public $roleUser; // = получаем из результата запроса 'SELECT id_author FROM TABLE Task WHERE id_executor = $userId';

        public static function checkUserAccess (int $userId, string $roleUser) : bool
        {
            if ($userId ==2 || $roleUser == 'executor') {
                return false;
            }
                return true;
        }

    }
