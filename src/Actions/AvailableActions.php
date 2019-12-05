<?php
    /**
    *
    * Класс для определения активного статуса задания
    * @author <sevostyanova@gmail.com>
    */

    namespace YiiTaskForce\Actions;

    //require_once ('C:\OpenServer\domains\localhost\YiiTaskForce\vendor\autoload.php');
    //require_once __DIR__  . 'vendor/autoload.php';

    use YiiTaskForce\Actions\Action;
    use YiiTaskForce\Actions\ActionCancel;
    use YiiTaskForce\Actions\ActionRespond;
    use YiiTaskForce\Actions\ActionFinish;
    use YiiTaskForce\Actions\ActionPay;
    use YiiTaskForce\Actions\ActionRefuse;

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

            1 => ActionCancel::class,
            2 => ActionPay::class,
            3 => ActionRefuse::class,
            4 => ActionRespond::class,
            5 => ActionFinish::class
        ];
    // массив статусов задания
        private static $statuses = [
            1 => self::STATUS_NEW,
            2 => self::STATUS_CANCEL,
            3 => self::STATUS_INPROCESS,
            4 => self::STATUS_FINISH,
            5 => self::STATUS_PAID,
            6 => self::STATUS_FAILED
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
     /*
      * примем для тестирования, что свойство $userId принимает след. значения
      * $user == 1; если это заказчик
      * $user == 2; если это испонитель
      */
    public function getAvailableActions ( int $userId, string $roleUser, $getActiveStatus) {

        $actionsList  = [];

        if ( ActionCancel::checkUserAccess( 1, 'client') && $getActiveStatus == STATUS_NEW) {
            $actionsList[1] = ActionCancel::getInnerName();
            return $actionsList;
        }
        if ( ActionRespond::checkUserAccess( 2,'executor') && $getActiveStatus == STATUS_NEW) {
            $actionsList[2] = ActionRespond::getInnerName();
            return $actionsList;
        }
        if ( ActionFinish::checkUserAccess( 2, 'executor') && $getActiveStatus == STATUS_INPROCESS) {
            $actionsList[3] = ActionFinish::getInnerName();
            return $actionsList;
        }
         if ( ActionPay::checkUserAccess( 1,'client') && $getActiveStatus == STATUS_FINISH) {
            $actionsList[4] = ActionPay::getInnerName();
            return $actionsList;
        }
        if ( ActionRefuse::checkUserAccess( 1, 'client') && $getActiveStatus == STATUS_FINISH) {
            $actionsList[5] = ActionRefuse::getInnerName();
            return $actionsList;
        }
        return $this->actionsList;
    }

}

// проверки для $actionsList

/*
$unit = new AvailableActions;

echo 'Список разрешенных действий'; "\n";
var_dump($unit->$actionsList); "\n";
var_dump($unit->getAvailableActions(1, 'client', STATUS_NEW)); "\n";
var_dump($unit->getAvailableActions(2, 'executor', STATUS_NEW)); "\n";
var_dump($unit->getAvailableActions(2, 'executor', STATUS_INPROCESS)); "\n";
var_dump($unit->getAvailableActions(1, 'client', STATUS_FINISH)); "\n";

echo 'Список статусов'; "\n";
var_dump($unit->getStatuses()); "\n";
echo 'Список действий'; "\n";
var_dump($unit->getActions());

$onething = new ActionPay;
echo '$innerName';  "\n";
var_dump($onething->getInnerName());
*/
