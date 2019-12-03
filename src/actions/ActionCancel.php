<?php

    namespace YiiTaskForce\Actions;


    // подключаем абстрактный класс для проверки класса ActionCancel
    /* abstract class Action
        {
            public $className;
            public $innerName;
            public $roleUser;
            public $userId;

            public function __construct ()
            {
                $this->$className;
                $this->$innerName;
                $this->$userId;
                $this->$roleUser;
            }

            abstract public static function getClassName();
            abstract public static function getInnerName();
            abstract public static function checkUserAccess(int $userId, string $roleUser);
        } */

    class ActionCancel extends Action
    {
        public static function getClassName ()
        {
            $className = get_class();

            return $className;
        }

        public static function getInnerName ()
        {
            $innerName = 'to_cancel';

            return $innerName;
        }

        public $roleUser; // = получаем из результата запроса 'SELECT id_author FROM TABLE Task WHERE id_author = $userId';

        public static function checkUserAccess (int $userId, string $roleUser)
        {
            if ($userId ==2 || $roleUser == 'executor') {
                echo 'Нет прав на отмену задания!';
            }
                return true;
        }
    }


    // Проверка вывода имени и внутренного имени класса

    /*$unit = new ActionCancel;
     echo ActionCancel::getClassName();
     echo ActionCancel::getInnerName();

     int $userId, */

