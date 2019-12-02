<?php
    /**
    *
    * Класс для определения активного статуса задания
    * @author <sevostyanova@gmail.com>
    */

    namespace YiiTaskForce\Actions;

    require_once ('C:\OpenServer\domains\localhost\YiiTaskForce\vendor\autoload.php');
    //require_once ('..vendor/autoload.php');

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

        /*
        ActionCancel::class = 'cancel';
        ActionPay::class = 'pay';
        ActionRespond::class ='respond';
        ActionFinish::class = 'finish';
        ActionRefuse::class = 'refuse';
        */

    // свойства класса TaskStatus
        public $clientId = 0; //id заказчика
        public $executerId = 0; //id исполнителя
        public $taskFinishDate = ""; //дата окончания работы по заказу
        public $activeStatus = 'new'; // активный статус заказа

        private static $actions = [

            1 => ActionCancel::class,
            2 => ActionPay::class,
            3 => ActionRefuse::class,
            4 => ActionRespond::class,
            5 => ActionFinish::class
        ];

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
            return $actions;
        }

        public function getStatuses ()
        { //получение массива статусов задания
            return self::$statuses;
        }

        public function getActiveStatus (string $act)
        { // определяем активный статус

            switch ($act) {

                case ActionCancel::getClassName():
                    return self::STATUS_CANCEL;

                case ActionRespond::getClassName():
                    return self::STATUS_INPROCESS;

                case  ActionFinish::getClassName():
                    return self::STATUS_FINISH;

                case ActionPay::getClassName():
                    return self::STATUS_PAID;

                case ActionRefuse::getClassName():
                    return self::STATUS_FAILED;
            }

              return $this->activeStatus;
        }
    }

$unit = new AvailableActions;

var_dump(AvailableActions::getActions()); "\n";
var_dump(AvailableActions::getStatuses());
/*
/*проверка данных $actions и $statuses
*/
