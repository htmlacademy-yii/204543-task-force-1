<?php
    /**
    *
    * Класс для определения активного статуса задания
    * @author <sevostyanova@gmail.com>
    */

    namespace YiiTaskForce;

    class TaskStatusOne
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

    // Методы класса TaskStatus

    public function getActions ()
        { //получение массива действий
            $actions = [
                1 => self::ACTION_ORDER,
                2 => self::ACTION_CANCEL,
                3 => self::ACTION_DO,
                4 => self::ACTION_FINISH,
                5 => self::ACTION_PAY
            ];
            return $this->actions;
        }


    public function getStatuses ()
        { //получение массива статусов задания
            $statuses = [
                1 => self::STATUS_NEW,
                2 => self::STATUS_CANCEL,
                3 => self::STATUS_INPROCESS,
                4 => self::STATUS_FINISH,
                5 => self::STATUS_PAID
            ];
            return $this->statuses;
        }

    public function getActiveStatus (string $actions)
        { // определяем активный статус
            $activeStatus = ($statuses == self::STATUS_NEW && $actions == self::ACTION_CANCEL) ? self::statuses[2] : self::statuses[1];
            $activeStatus = ($statuses == self::STATUS_NEW && $actions == self::ACTION_DO) ? self::statuses[3] : self::statuses[1];
            $activeStatus = ($statuses == self::STATUS_INPROCESS && $actions == self::ACTION_FINISH) ? self::statuses[4] : self::statuses[3];
            $activeStatus = ($statuses == self::STATUS_FINISH && $actions == self::ACTION_PAY) ? self::statuses[5] : self::statuses[4];

              return $this->activeStatus;
        }
    }
