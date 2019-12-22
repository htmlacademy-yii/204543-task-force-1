<?php
    /**
    *
    * Класс для определения активного статуса задания
    * @author <sevostyanova@gmail.com>
    */

namespace YiiTaskForce\Actions;

use YiiTaskForce\Exceptions\AllowedStatusException;
use YiiTaskForce\Exceptions\AllowedActionException;

class AvailableActions
{
// роли пользователей
public const CLIENT = 'client';

public const DOER = 'executor';

// статусы задания

public const STATUS_NEW = 'new';

public const STATUS_CANCEL = 'cancel';

public const STATUS_INPROCESS = 'inprocess';

public const STATUS_COMPLETED = 'completed';

public const STATUS_FAILED = 'failed';

// действия заказчика и исполнителя

public const ACTION_CREATE = ActionCreate::class;

public const ACTION_CANCEL = ActionCancel::class;

public const ACTION_RESPOND = ActionRespond::class;

public const ACTION_COMPLETE= ActionComplete::class;

public const ACTION_REFUSE = ActionRefuse::class;

// свойства класса TaskStatus

//id пользователя
public $userId = 0;

//id заказчика
public $clientId = 0;

//id исполнителя
public $executorId = 0;

//дата окончания работы по заказу
public $taskFinishDate = "";

// активный статус заказа
public $activeStatus;


private static $actions = [
    ActionCreate::class,
    ActionCancel::class,
    ActionComplete::class,
    ActionRespond::class,
    ActionRefuse::class
];

private static $statuses = [
    self::STATUS_NEW,
    self::STATUS_CANCEL,
    self::STATUS_INPROCESS,
    self::STATUS_COMPLETED,
    self::STATUS_FAILED
];

// методы класса AvailableActions

   /**
    * Функция для получения списка действий
    * @return array;
    */
    public function getActions () : array
    {
        return self::$actions;
    }

    /**
    * Функция для получения списка статусов задания
    * @return array;
    */
    public function getStatuses () : array
    {
        return self::$statuses;
    }

   /**
    * Функция для проверки статуса задания $status
    * @param string $status;
    * @throws AllowedStatusException()
    */

    private function validateStatus (string $status) : void
    {
        if (!in_array($status, self::$statuses)) {
            throw new AllowedStatusException("Неправильное значение статуса задания");
        }
    }

   /**
    * конструктор для передачи $activeStatus
    * @param string $status;
    * @throws AllowedStatusException()
    */
    public function __construct(string $status)
    {
        $this->validateStatus($status);
        $this->activeStatus = $status;
    }

    /**
    * функция валидации действия пользователя
    * @param string $act;
    * @throws AllowedActionException()
    */

    public function validateAction (string $act) : void
    {
        if (!in_array($act, self::$actions)) {
            throw new AllowedActionException("Выбрано неверное действие");
        }
    }

    /**
    * функция для получения статуса задания в зависимости  от произведенного действия
    * @param string $act;
    * @return string $activeStatus;
    * @throws AllowedActionException()
    */

    public function getActiveStatus (string $act) : string
    {
        $this->validateAction($act);
        $this->act = $act;
        // определяем активный статус
        switch ($act) {

        case ActionCreate::class:
            return self::STATUS_NEW;

        case ActionCancel::class:
            return self::STATUS_CANCEL;

        case ActionRespond::class:
            return self::STATUS_INPROCESS;

        case ActionComplete::class:
            return self::STATUS_COMPLETED;

        case ActionRefuse::class:
            return self::STATUS_FAILED;
            }

            return $this->activeStatus;
    }

    /**
    * Функция для установки $activeStatus
    * @param string $status;
    * @throws AllowedStatusException()
    */
    public function setActiveStatus (string $status): void
    {
        $this->validateStatus($status);
        $this->activeStatus = $status;
    }

      /**
        * функция для получения списка доступных действий для заказчика и исполнителя
        * @param  int $userId;
        * @param  int $clientId;
        * @param  int $executorId;
        * @return array $actionsList;
        */

    public function getAvailableActions (int $userId, int $clientId, int $executorId) : array
    {
        $actionsList = [];

        if ($this->activeStatus == self::STATUS_NEW) {
            if ( ActionCancel::checkUserAccess ($userId, $clientId, $executorId)) {
                 $actionsList[] = ActionCancel::getInnerName();
            }

            if (ActionRespond::checkUserAccess($userId, $clientId, $executorId)) {
                $actionsList[] = ActionRespond::getInnerName();
            }
        }

        if ($this->activeStatus == self::STATUS_INPROCESS) {
            if (ActionComplete::checkUserAccess($userId, $clientId, $executorId)) {
                $actionsList[] = ActionComplete::getInnerName();
            }
            if (ActionRefuse::checkUserAccess($userId, $clientId, $executorId)) {
                $actionsList[] = ActionRefuse::getInnerName();
            }
        }
         return $actionsList;
    }
}
