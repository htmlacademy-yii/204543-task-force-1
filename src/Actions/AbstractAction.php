<?php

namespace YiiTaskForce\Actions;

abstract class AbstractAction
{
    public $className;

    public $innerName;

    public $userId;

    public $clientId;

    public $executorId;

    //public $user = [];


    abstract public static function getClassName(): string;

    abstract public static function getInnerName(): string;

    abstract public static function checkUserAccess(int $userId, int $clientId, int $executorId ): bool;

    //abstract public static function getUser (array $user): array;
}
