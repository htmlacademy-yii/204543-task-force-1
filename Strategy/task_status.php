<?php
/**
  *
  * Класс для определения активного статуса задания
  * @author <sevostyanova@gmail.com>
  */

namespace YiiTaskForce\Strategy;

class TaskStatus
{
	/**
   *статусы задания
   */
    public const STATUS_NEW = 'new';
    public const STATUS_CANСEL = 'cancel';
    public const STATUS_INPROCESS = 'inprogress';
    public const STATUS_FINISH = 'finished';
    public const STATUS_PAID = 'paid';

    public const CLIENT = 'client';
    public const DOER = 'executor';

  /**
   * действия заказчика
   */
    public const ACTION_ORDER = 'create';
    public const ACTION_CANCEL = 'cancel';
    public const ACTION_PAY = 'pay';
   
   /**
    *действия исполнителя
    */
    public const ACTION_DO = 'respond';
    public const ACTION_FINISH = 'job_is_done';

    /**
     * свойства класса TaskStatus
     */     
    public $user_role;//кто пользователь
    public $status; //состояние задания
    public $action; //действие
    public $id_client = []; //id заказчика
    public $id_doer = []; //id исполнителя
    public $task_finish_date = []; //дата окончания работы по заказу
    public $active_status = []; // активный статус заказа

   /**
     * Методы класса TaskStatus
     * @methods_class_TaskStatus
     */
  
   /**
     * Получение массива действий 
     */
    
      public function getActions()
      {
        $actions = [self::const ACTION_ORDER, self::const ACTION_CANCEL,self::const ACTION_DO, self::const ACTION_PAY];
        return $action; 
      }
    /**
     *  Получение массива статусов задания
     */  
    //
      public function getStatuses()
      {
        $statuses = [self::const STATUS_NEW, self::const STATUS_CANCEL, self::const STATUS_INPROCESS,
          self::const STATUS_FINISH, self::const STATUS_PAID
        ];  
          return $statuses; 
      }  
      //получаем активный статус
      public function getActiveStatus()
        {
          /**
           * Исходное состояние - нет статуса
           */
          $active_status == Null;
          $active_status = ($action => self::$actions['ACTION_ORDER']?
                 self::$statuses['STATUS_NEW'] : $active_status; 
          /**
           * Активный статус - новое задание
           */
          
          switch (self::$statuses['STATUS_NEW'] && $action) {
              case self::$actions['ACTION_CANCEL']:
                $active_status == self::$actions['ACTION_CANCEL'];
                break;
              case self::$actions['ACTION_DO']:
                $active_status == self::$statuses['STATUS_INPROCESS']; 
              case self::$actions['ACTION_FINISH']:
                $active_status == self::$statuses['STATUS_FINISH'];
                break;
            }
          /**
           * Активный статус - задание выполнено
           */

           $active_status =(self::$statuses['STATUS_FINISH'] && self::$actions['ACTION_PAY'])? self::$statuses['STATUS_PAID'] : self::$statuses['STATUS_FINISH'];

            return self::$active_status; 
        }
}
