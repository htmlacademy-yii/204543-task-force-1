<?php
namespace yiiTaskForce\classes;
class TaskStatus
{
	//статусы задания
    public const STATUS_NEW = 'НОВОЕ';
    public const STATUS_CANСEL = 'ОТМЕНЕНО';
    public const STATUS_INPROCESS = 'ВЫПОЛНЯЕТСЯ';
    public const STATUS_FINISH = 'ЗАВЕРШЕНО';
    public const STATUS_PAID = 'РАБОТА ОПЛАЧЕНА';

    public const CLIENT = 'Заказчик';
    public const DOER = 'Исполнитель';

    //действия заказчика
    public const ACTION_ORDER = 'Опубликовать';
    public const ACTION_CANCEL = 'Отменить задание';
    public const ACTION_PAY = 'Оплатить работу';
   
    // действия исполнителя
    public const ACTION_DO = 'Откликнуться на заявку';
    public const ACTION_FINISH = 'Работа по заказу завершена';

    //переменные    
    public $user_role;//кто пользователь
    public $status; //состояние задания
    public $action; //действие
    public $id_client = []; //id заказчика
    public $id_doer = []; //id исполнителя
    public $task_finish_date = []; //дата окончания работы по заказу
    public $active_status = []; // активный статус заказа

//методы
    
    //массив действий 
      public function getActiones()
      {
        $actions = array(
          1 => const ACTION_ORDER,
          2 => const ACTION_CANCEL,
          3 => const ACTION_DO,
          3 => const ACTION_PAY,
         );  
          return $action; 
      }
      
    //массив статусов задания
      public function getStatuses()
      {
        $status = array(
          1 => const STATUS_NEW,
          2 => const STATUS_CANCEL,
          3 => const STATUS_INPROCESS,
          4 => const STATUS_FINISH,
          5 => const STATUS_PAID
        );  
          return $status; 
      }  
      //получаем активный статус
      public function getActiveStatus()
        {
          $active_status = $status['STATUS_NEW'];
          $active_status = ($user_role = const CLIENT && $action = $actions['ACTION_CANCEL']) ? $status['STATUS_CANCEL'] : $active_status;         
          
          $active_status = ($user_role = const DOER && $action = $actions['ACTION_DO']) ? $status['STATUS_INPROCESS'] : $status['STATUS_NEW'];
          
          $active_status = $status['STATUS_INPROCESS'];
          $active_status = ($user_role = const DOER && $action = $actions['ACTION_FINISH']) ? $status['STATUS_FINISH'] : $active_status;

          $active_status = $status['STATUS_FINISH'];
          $active_status = ($user_role = const CLIENT && $action = $actions['ACTION_PAID']) ? $status['STATUS_PAID'] $status['STATUS_FINISH'];

          return $active_status; 
        }
}
