<?php
    require_once '../vendor/autoload.php';

    /**
      * File for testing if class AvailableActions works right way
      */

    use YiiTaskForce\Actions\Action;
    use YiiTaskForce\Actions\ActionCancel;
    use YiiTaskForce\Actions\ActionRespond;
    use YiiTaskForce\Actions\ActionComplete;
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
    assert ($available->getActiveStatus(ActionComplete::class) == AvailableActions::STATUS_COMPLETED, 'problem with complete action');
    assert ($available->getActiveStatus(ActionRefuse::class) == AvailableActions::STATUS_FAILED, 'problem with refuse action');

    assert (false, 'test AvailableStatuses complete');

   /**
    * Проверка работы функции AvailableActions::getAvailableActions();
    */

    $unit = new AvailableActions();

    $clientId = 1;
    $executorId = 2;
    $otherUserId = 3;

    $unit->activeStatus = $activeStatus = AvailableActions::STATUS_NEW;

    $unit->clientId = $clientId;
    $unit->executorId = $executorId;
    $unit->otherUserId = $otherUserId;


    assert ($unit->getAvailableActions(1, $clientId, $executorId, $activeStatus) == [ActionCancel::getInnerName()], 'problem with Cancel action for client in status NEW');
    assert ($unit->getAvailableActions(2, $clientId, $executorId, $activeStatus) == [ActionRespond::getInnerName()], 'problem with Respond action for executor in status NEW');
    assert ($unit->getAvailableActions(3, $clientId, $executorId, $activeStatus) == [], 'problem with action for other user in status NEW');


    $unit->activeStatus = $activeStatus = AvailableActions::STATUS_INPROCESS;

    assert ($unit->getAvailableActions(1, $clientId, $executorId, $activeStatus) == [ActionComplete::getInnerName()], 'problem with Complete action for client in status INPROCESS');
    assert ($unit->getAvailableActions(2, $clientId, $executorId, $activeStatus) == [ActionRefuse::getInnerName()], 'problem with Refuse action for executor in status INPROCESS');
    assert ($unit->getAvailableActions(3, $clientId, $executorId, $activeStatus) == [], 'problem with action for other user in status INPROCESS');

    assert (false, 'test AvailableActions complete');
