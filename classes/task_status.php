<?php
namespace yii-task-force\classes;
class TaskStatus
{
	//статусы задания
    public const STATUS_NEW = 'НОВОЕ';
    public const STATUS_CANСEL = 'ОТМЕНЕНО';
    public const STATUS_INPROCESS = 'ВЫПОЛНЯЕТСЯ';
    public const STATUS_FINISH = 'ЗАВЕРШЕНО';

    public const CLIENT = 'Заказчик';
    public const DOER = 'Исполнитель';
//действия заказчика
    public const ACTION_ORDER = 'Заказать';
    public const ACTION_CANCEL = 'Отменить задание';
    public const ACTION_PAY = 'Оплатить работу';
    public const ACTION_ = 'Работа принята';
// действия исполнителя
    public const ACTION_DO = 'Откликнуться на заявку';
    public const ACTION_FINISH = 'Работа по заказу завершена';
    public const ACTION_GETMONEY = 'Деньги за работу получены';

    public $id_client = []; //id заказчика
    public $id_doer = []; //id исполнителя
    public $task_finish_date = []; //дата окончания работы по заказу
    public $active_status = []; // активный статус заказа


}