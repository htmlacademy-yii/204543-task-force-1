<?php

    namespace YiiTaskForce\Actions;

        abstract class Action
        {
            public $className;
            public $innerName;
            public $roleUser;
            public $userId;

            abstract public static function getClassName();
            abstract public static function getInnerName();
            abstract public static function checkUserAccess(int $userId, string $roleUser);
        }

//
