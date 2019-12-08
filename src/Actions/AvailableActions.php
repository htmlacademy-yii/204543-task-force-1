<?php
    /**
    *
    * Класс для определения активного статуса задания
    * @author <sevostyanova@gmail.com>
    */

    namespace YiiTaskForce\Actions;

    require_once '../../vendor/autoload.php';

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

        public function getActions ()
        { //получение массива действий
            return self::$actions;
        }

        public function getStatuses ()
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


    public  $actionsList = [];

    public function getAvailableActions ( int $userId, string $roleUser, $activeStatus)
    {

        if ( ActionCancel::checkUserAccess( 1, 'client') &&  self::STATUS_NEW) {
          $this->actionsList[] = ActionCancel::getInnerName();
        }

        if ( ActionRespond::checkUserAccess( 2, 'executor') && self::STATUS_NEW) {
            $this->actionsList[] = ActionRespond::getInnerName();
        }

        if ( ActionFinish::checkUserAccess( 2, 'executor') && self::STATUS_INPROCESS) {
           $this->actionsList[] = ActionFinish::getInnerName();
        }

        if ( ActionPay::checkUserAccess( 1,'client') && self::STATUS_FINISH) {
           $this->actionsList[] = ActionPay::getInnerName();
        }

        if ( ActionRefuse::checkUserAccess( 1, 'client') &&  self::STATUS_FINISH) {
            $this->actionsList[] = ActionRefuse::getInnerName();
        }
         return $this->actionsList;
    }

}

// проверки для $actionsList;

$unit = new AvailableActions;

echo 'Список разрешенных действий'; "\n";

var_dump ($unit->getAvailableActions (1, 'client', 'STATUS_NEW')); "\n";
    unset($unit->actionsList);

var_dump ($unit->getAvailableActions(2, 'executor', 'STATUS_NEW')); "\n";
    unset($unit->actionsList);

var_dump ($unit->getAvailableActions(2, 'executor', 'STATUS_INPROCESS')); "\n";
    unset($unit->actionsList);
var_dump ($unit->getAvailableActions(1, 'client', 'STATUS_FINISH')); "\n";



/*
      * примем для тестирования, что свойство $userId принимает след. значения
      * $user == 1; если это заказчик
      * $user == 2; если это исполнитель
     */

