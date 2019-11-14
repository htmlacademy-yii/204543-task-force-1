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
        public const STATUS_CANCEL = 'cancel';
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
                        1 => self::ACTION_ORDER,
                        2 => self::ACTION_CANCEL,
                        3 => self::ACTION_DO,
                        4 => self::ACTION_FINISH,
                        5 => self::ACTION_PAY
                        ];

        private  $statuses = [
                        1 => self::STATUS_NEW,
                        2 => self::STATUS_CANCEL,
                        3 => self::STATUS_INPROCESS,
                        4 => self::STATUS_FINISH,
                        5 => self::STATUS_PAID
                        ];
        public const ACTION_STATUS = [
                        self::ACTION_ORDER => self::STATUS_NEW,
                        self::ACTION_CANCEL => self::STATUS_CANCEL,
                        self::ACTION_PAY => self::STATUS_INPROCESS,
                        self::ACTION_DO => self::STATUS_FINISH,
                        self::ACTION_FINISH => self::STATUS_PAID
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
            $key = $this->actions;
            if (array_key_exists($key, self::ACTION_STATUS)) {
                $activeStatus = self::ACTION_STATUS[$key];
            }
              return $this->activeStatus;
        }
    }
