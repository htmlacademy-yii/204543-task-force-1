<?php
    require_once '../vendor/autoload.php';

    /**
      * File for testing if class AvailableActions works right way
      */

    use YiiTaskForce\Actions\Action;
    use YiiTaskForce\Actions\ActionCancel;
    use YiiTaskForce\Actions\ActionRespond;
    use YiiTaskForce\Actions\ActionFinish;
    use YiiTaskForce\Actions\ActionPay;
    use YiiTaskForce\Actions\ActionRefuse;
    use YiiTaskForce\Actions\AvailableActions;

       //настройки assert()
    assert_options(ASSERT_ACTIVE, 1);
    assert_options(ASSERT_WARNING, 0);
    assert_options(ASSERT_CALLBACK, function () {
        echo '<hr />';
        echo func_get_arg(3);
    });


    $available = new AvailableActions();
    assert ($available->getActiveStatus(ActionCancel::class) == AvailableActions::STATUS_CANCEL, 'problem with cancel action');
    assert ($available->getActiveStatus(ActionRespond::class) == AvailableActions::STATUS_INPROCESS, 'problem with respond action');
    assert ($available->getActiveStatus(ActionFinish::class) == AvailableActions::STATUS_FINISH, 'problem with finish action');
    assert ($available->getActiveStatus(ActionPay::class) == AvailableActions::STATUS_PAID, 'problem with pay action');
    assert ($available->getActiveStatus(ActionRefuse::class) == AvailableActions::STATUS_FAILED, 'problem with refuse action');

    assert (false, 'test AvailableStatuses complete');


    // проверки для $actionsList;
    /*
      * примем для тестирования, что свойство $userId принимает след. значения
      * $user == 1; если это заказчик
      * $user == 2; если это исполнитель
     */


    /*

    */

    $unit = new AvailableActions;
    var_dump($unit->getAvailableActions (1, 'client', 'STATUS_NEW')) ;


    $unit = new AvailableActions;
    assert ($unit->getAvailableActions (1, 'client', 'STATUS_NEW') == 'to_cancel', 'problem with client actions for STATUS_NEW');

    $unit = new AvailableActions;
    assert ($unit->getAvailableActions (2, 'executor', 'STATUS_NEW') == 'to_respond', 'problem with executor actions for STATUS_NEW');

    $unit = new AvailableActions;
    assert ($unit->getAvailableActions (2, 'executor', 'STATUS_INPROCESS') == 'to_finish', 'problem with  executor actions for STATUS_INPROCESS');

    $unit = new AvailableActions;
    assert ($unit->getAvailableActions (1, 'client', 'STATUS_FINISH') == 'to_pay', 'problem with client actions for STATUS_FINISH');

    $unit = new AvailableActions;
    assert ($unit->getAvailableActions (1, 'client', 'STATUS_FINISH') == 'to_refuse', 'problem with client actions for STATUS_FINISH');

    assert (false, 'test AvailableActions complete');

/*
// проверка классов действий
    $actionclass = new ActionRespond;

    assert ($actionclass->checkUserAccess(1, 'executor') == true, 'problem with checkUserAccess in respond action');
    assert (false, 'test ActionClass complete');
    */
