<?php
    /**
    *
    * Класс для определения активного статуса задания
    * @author <sevostyanova@gmail.com>
    */

    namespace YiiTaskForce;

    class TaskStatus
    {
    // роли пользователей
       public const CLIENT = 'client';
       public const DOER = 'executor';

    // статусы задания
        public const STATUS_NEW = 'new';
        public const STATUS_CANСEL = 'cancel';
        public const STATUS_INPROCESS = 'inprogress';
        public const STATUS_FINISH = 'finished';
        public const STATUS_PAID = 'paid';

    // действия заказчика и исполнителя
        public const ACTION_ORDER = 'create';
        public const ACTION_CANCEL = 'cancel';
        public const ACTION_PAY = 'pay';
        public const ACTION_DO ='respond';
        public const ACTION_FINISH = 'job_is_done';

    // свойства класса TaskStatus
        public $clientId = 0; //id заказчика
        public $doerId = 0; //id исполнителя
        public $taskFinishDate = ""; //дата окончания работы по заказу
        public $activeStatus = 'new'; // активный статус заказа

        private $actions = [
                        1 => ACTION_ORDER,
                        2 => ACTION_CANCEL,
                        3 => ACTION_DO,
                        4 => ACTION_FINISH,
                        5 => ACTION_PAY
                        ];

        private  $statuses = [
                        1 => STATUS_NEW,
                        2 => STATUS_CANCEL,
                        3 => STATUS_INPROCESS,
                        4 => STATUS_FINISH,
                        5 => STATUS_PAID
                        ];
        public const ACTION_STATUS = [
                        ACTION_ORDER => STATUS_NEW,
                        ACTION_CANCEL => STATUS_CANCEL,
                        ACTION_PAY => STATUS_INPROCESS,
                        ACTION_DO => STATUS_FINISH,
                        ACTION_FINISH =>STATUS_PAID
                        ];
    // методы класса TaskStatus

        public function getActions ()
        { //получение массива действий
            return $this->actions;
        }

        public function getStatuses ()
        { //получение массива статусов задания
            return $this->statuses;
        }

        public function getActiveStatus (string $actions)
        { // определяем активный статус
            $key = self::ACTION_DO;
            if (array_key_exists($key, self::ACTION_STATUS)) {
                $activeStatus = self::ACTION_STATUS[$key];
            }
              return $this->activeStatus;
        }
    }
