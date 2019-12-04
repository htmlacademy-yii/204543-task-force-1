<?php
    /**
    *
    * Класс для определения активного статуса задания
    * @author <sevostyanova@gmail.com>
    */

    namespace YiiTaskForce\Strategy;

    use YiiTaskForce\Actions\Action;
    use YiiTaskForce\Actions\ActionCancel;
    use YiiTaskForce\Actions\ActionRespond;
    use YiiTaskForce\Actions\ActionFinish;
    use YiiTaskForce\Actions\ActionPay;
    use YiiTaskForce\Actions\ActionRefuse;


    class TaskStatus
    {
    // роли пользователей
       public const CLIENT = 'client';
       public const DOER = 'executor';

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
        public $doerId = 0; //id исполнителя
        public $taskFinishDate = ""; //дата окончания работы по заказу
        public $activeStatus = 'new'; // активный статус заказа

        private static $actions = [
                        1 => self::ACTION_CANCEL,
                        2 => self::ACTION_RESPOND,
                        3 => self::ACTION_FINISH,
                        4 => self::ACTION_PAY,
                        5 => self::ACTION_REFUSE
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
            return self::$actions;
        }

        public function getStatuses ()
        { //получение массива статусов задания
            return self::$statuses;
        }

        public function getActiveStatus (string $act)
        { // определяем активный статус
            switch ($act) {

                case self::ACTION_CANCEL:
                    return self::STATUS_CANCEL;

                case self::ACTION_RESPOND:
                    return self::STATUS_INPROCESS;

                case  self::ACTION_FINISH:
                    return self::STATUS_FINISH;

                case self::ACTION_PAY:
                    return self::STATUS_PAID;

                case self::ACTION_REFUSE:
                    return self::STATUS_FAILED;
            }
                return $this->activeStatus;
        }
    }
