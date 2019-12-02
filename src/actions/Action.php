<?php

    namespace YiiTaskForce\actions;

        abstract class Action
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
        }
