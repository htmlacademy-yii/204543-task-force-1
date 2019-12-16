<?php

    namespace YiiTaskForce\Actions;

        abstract class AbstractAction
        {
            public $className;
            public $innerName;
            public $userId;

            abstract public static function getClassName();
            abstract public static function getInnerName();
            abstract public static function checkUserAccess(int $userId, int $clientId, int $executorId );
        }

//
