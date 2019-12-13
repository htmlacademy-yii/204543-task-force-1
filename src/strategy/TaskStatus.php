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
    use YiiTaskForce\Actions\ActionComplete;
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
        public const STATUS_COMPLETED = 'completed';
        public const STATUS_FAILED = 'failed';

    // действия заказчика и исполнителя
        public const ACTION_CREATE = ActionCreate::class;
        public const ACTION_CANCEL = ActionCancel::class;
        public const ACTION_RESPOND = ActionRespond::class;
        public const ACTION_COMPLETE= ActionComplete::class;
        public const ACTION_REFUSE = ActionRefuse::class;

    // свойства класса TaskStatus
        public $clientId = 0; //id заказчика
        public $executorId = 0; //id исполнителя
        public $taskFinishDate = ""; //дата окончания работы по заказу
        public $activeStatus = 'new'; // активный статус заказа

         private static $actions = [
            0 => ActionCreate::class,
            1 => ActionCancel::class,
            2 => ActionCompleted::class,
            3 => ActionRespond::class,
            4 => ActionRefuse::class,

        ];

        private static $statuses = [
                        1 => self::STATUS_NEW,
                        2 => self::STATUS_CANCEL,
                        3 => self::STATUS_INPROCESS,
                        4 => self::STATUS_COMPLETED,
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

                case ActionComplete::class:
                    return self::STATUS_COMPLETED;

                case ActionRefuse::class:
                    return self::STATUS_FAILED;
            }
                return $this->activeStatus;
        }
    }
