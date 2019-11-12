<?php
    /**
    *
    * Класс для определения активного статуса задания
    * @author <sevostyanova@gmail.com>
    */

    namespace YiiTaskForce;

    class TaskStatusTwo
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
        {
            $actions = [
                1 => self::ACTION_ORDER,
                2 => self::ACTION_CANCEL,
                3 => self::ACTION_PAY,
                4 => self::ACTION_DO,
                5 => self::ACTION_FINISH
            ];
            return $this->actions = $actions;
        }

    //Получение массива статусов задания
    public function getStatuses()
        {
            $statuses = [
                1 => self::STATUS_NEW,
                2 => self::STATUS_CANCEL,
                3 => self::STATUS_INPROCESS,
                4 => self::STATUS_FINISH,
                5 => self::STATUS_PAID
            ];
            return $this->statuses = $statuses;
        }
    public function getMapActionStatus ()
        {
            $mapActionStatus = [
                self::ACTION_ORDER => self::STATUS_NEW,
                self::ACTION_CANCEL => self::STATUS_CANCEL,
                self::ACTION_PAY => self::STATUS_INPROCESS,
                self::ACTION_DO => self::STATUS_FINISH,
                self::ACTION_FINISH => self::STATUS_PAID
            ];
            return $this->mapActionStatus = $mapActionStatus;
        }

    public function getActiveStatus(string $action)
        { //получаем активный статус

            $activeStatus = (array_key_exists($action, array $mapActionStatus)) ? self::mapActionStatus[$action] : "";
            }
               return $this->activeStatus = $activeStatus;
        }
}
