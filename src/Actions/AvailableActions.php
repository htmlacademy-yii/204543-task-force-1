<?php
    /**
    *
    * Класс для определения активного статуса задания
    * @author <sevostyanova@gmail.com>
    */

    namespace YiiTaskForce\Actions;

    require_once '../../vendor/autoload.php';

    use YiiTaskForce\Exceptions\AllowedActionException;
    use YiiTaskForce\Exceptions\AllowedStatusException;
    use YiiTaskForce\Exceptions\WrongUserRoleException;

    class AvailableActions
    {
        // роли пользователей
       public const CLIENT = 'client';
       public const DOER = 'executor';

    // статусы задания
        public const STATUS_NEW = 'new';
        public const STATUS_CANCEL = 'cancel';
        public const STATUS_INPROCESS = 'inprocess';
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
            2 => ActionComplete::class,
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

        public function getActions () : array
        { //получение массива действий
            return self::$actions;
        }

        public function getStatuses () : array
        { //получение массива статусов задания
            return self::$statuses;
        }


   /**
    * функция для получения статуса задания в зависимости  от произведенного действия
    * @param string $act;
    * @return string $activeStatus;
    */

        public function getActiveStatus (string $act) : string
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

              if (array_search($this->activeStatus, $statuses) === false) {
                    throw new AllowedStatusException("Cтатус не является допустимым для задания");
            }
                return $this->activeStatus;
        }

   /**
    * функция для получения списка доступных действий для заказчика и исполнителя
    * @param $userId;
    * @param $clientId;
    * @param $executorId;
    * @return array $actionsList;
    */

    public function getAvailableActions (int $userId, int $clientId, int $executorId) : array
    {
        $actionsList = [];

        if ($userId !== $clientId || $userId !== $executorId) {
            throw new WrongUserRoleException("Введен Id незарегистрированного пользователя");
        }

        if ($this->activeStatus == self::STATUS_NEW) {
            if ( ActionCancel::checkUserAccess ($userId, $clientId, $executorId)) {
                $actionsList[] = ActionCancel::getInnerName();
            }
            if (ActionRespond::checkUserAccess($userId, $clientId, $executorId)) {
                $actionsList[] = ActionRespond::getInnerName();
            }
        }

        if ($this->activeStatus == self::STATUS_INPROCESS) {
            if (ActionComplete::checkUserAccess($userId, $clientId, $executorId)) {
                $actionsList[] = ActionComplete::getInnerName();
            }
            if (ActionRefuse::checkUserAccess($userId, $clientId, $executorId)) {
                $actionsList[] = ActionRefuse::getInnerName();
            }
        }
            return $actionsList;
    }
}

    //настройки assert()

    assert_options(ASSERT_ACTIVE, 1);
    assert_options(ASSERT_WARNING, 0);
    assert_options(ASSERT_CALLBACK, function () {
        echo '<hr />';
        echo func_get_arg(3);
    });

    $unit = new AvailableActions();

    $clientId = 1;
    $executorId = 2;
    $otherUserId = 3;

    $unit->clientId = $clientId;
    $unit->executorId = $executorId;
    //$unit->userId = $userId;


    // обработка ошибки try catch

    try {
        $unit->getAvailableActions($otherUserId, $clientId, $executorId);

    } catch (WrongUserRoleException $e) {

        assert($unit->userId == $clientId || $unit->user == $clientId, $e->getMessage());
    }

     assert (false, 'test complete');
