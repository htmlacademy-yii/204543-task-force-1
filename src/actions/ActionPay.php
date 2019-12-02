<?php

    namespace YiiTaskForce\actions;

    class ActionPay extends Action
    {
            public static function getClassName ()
        {
            $className = get_class();

            return $className;
        }

        public static function getInnerName ()
        {
            $innerName = 'to_pay';

            return $innerName;
        }

        public $roleUser; // = получаем из результата запроса 'SELECT id_executor FROM TABLE Task WHERE id_executor = $userId';

        public static function checkUserAccess (int $userId, string $roleUser)
        {
            if (!$roleUser) {
                echo 'Нет прав на оплату задания!';
            }
                return true;
        }

    }
