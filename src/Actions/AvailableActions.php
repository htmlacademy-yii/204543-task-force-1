<?php
    /**
    *
    * Класс для определения активного статуса задания
    * @author <sevostyanova@gmail.com>
    */

    namespace YiiTaskForce\Actions;

    class AvailableActions
       {
    // роли пользователей
       public const CLIENT = 'client';
       public const EXECUTOR = 'executor';

    // статусы задания
        public const STATUS_NEW = 'new';
        public const STATUS_CANCEL = 'cancel';
        public const STATUS_INPROCESS = 'inprogress';
        public const STATUS_FINISH = 'finished';
        public const STATUS_PAID = 'paid';
        public const STATUS_FAILED = 'failed';

    // действия заказчика и исполнителя
        public const ACTION_CREATE = ActionCreate::class;
        public const ACTION_CANCEL = ActionCancel::class;
        public const ACTION_RESPOND = ActionRespond::class;
        public const ACTION_FINISH = ActionFinish::class;
        public const ACTION_PAY = ActionPay::class;
        public const ACTION_REFUSE = ActionRefuse::class;

    // свойства класса TaskStatus
        public $clientId = 0; //id заказчика
        public $executerId = 0; //id исполнителя
        public $taskFinishDate = ""; //дата окончания работы по заказу
        public $activeStatus = 'new'; // активный статус заказа

    // действия заказчика и исполнителя
        private static $actions = [
            0 => ActionCreate::class,
            1 => ActionCancel::class,
            2 => ActionPay::class,
            3 => ActionRefuse::class,
            4 => ActionRespond::class,
            5 => ActionFinish::class
        ];

    // массив статусов задания
        private static $statuses = [
            0 => self::STATUS_NEW,
            1 => self::STATUS_CANCEL,
            2 => self::STATUS_INPROCESS,
            3 => self::STATUS_FINISH,
            4 => self::STATUS_PAID,
            5 => self::STATUS_FAILED
        ];

    // методы класса TaskStatus
        public function getActions () : array
        { //получение массива действий
            return self::$actions;
        }

        public function getStatuses (): array
        { //получение массива статусов задания
            return self::$statuses;
        }

        public function getActiveStatus (string $act)
        { // определяем активный статус

            switch ($act) {

                case ActionCreate::class:
                    return self::STATUS_NEW;

                case ActionCancel::class:
                    return self::STATUS_CANCEL;

                case ActionRespond::class:
                    return self::STATUS_INPROCESS;

                case ActionFinish::class:
                    return self::STATUS_FINISH;

                case ActionPay::class:
                    return self::STATUS_PAID;

                case ActionRefuse::class:
                    return self::STATUS_FAILED;
            }

              return $this->activeStatus;
        }

    public $className;

    public function getAvailableActions ( int $userId, string $roleUser, $activeStatus)
    {
        $actionsList = [];

        if ( ActionCancel::checkUserAccess( $userId, $roleUser) &&  self::STATUS_NEW) {
          $actionsList[] = ActionCancel::getInnerName();
        }

        if ( ActionRespond::checkUserAccess(  $userId, $roleUser) && self::STATUS_NEW) {
            $actionsList[] = ActionRespond::getInnerName();
        }

        if ( ActionFinish::checkUserAccess(  $userId, $roleUser) && self::STATUS_INPROCESS) {
           $actionsList[] = ActionFinish::getInnerName();

        }

        if ( ActionPay::checkUserAccess(  $userId, $roleUser) && self::STATUS_FINISH) {
           $actionsList[] = ActionPay::getInnerName();
        }

        if ( ActionRefuse::checkUserAccess(  $userId, $roleUser) &&  self::STATUS_FINISH) {
            $actionsList[] = ActionRefuse::getInnerName();
        }
        return $actionsList;
    }

}

