<?php
    require_once '../vendor/autoload.php';

    /**
      * File for testing if class AvailableActions works right way
      */

use YiiTaskForce\Actions\ActionCancel;
use YiiTaskForce\Actions\ActionRespond;
use YiiTaskForce\Actions\ActionComplete;
use YiiTaskForce\Actions\ActionRefuse;
use YiiTaskForce\Actions\AvailableActions;
use YiiTaskForce\Exceptions\AllowedActionException;
use YiiTaskForce\Exceptions\AllowedStatusException;
use YiiTaskForce\Exceptions\WrongUserRoleException;

//настройки assert()
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_CALLBACK, function () {
        echo '<hr />';
        echo func_get_arg(3);
    });


$available = new AvailableActions(AvailableActions::STATUS_NEW);

assert ($available->getActiveStatus(ActionCancel::class) == AvailableActions::STATUS_CANCEL, 'problem with cancel action');
assert ($available->getActiveStatus(ActionRespond::class) == AvailableActions::STATUS_INPROCESS, 'problem with respond action');
assert ($available->getActiveStatus(ActionComplete::class) == AvailableActions::STATUS_COMPLETED, 'problem with complete action');
assert ($available->getActiveStatus(ActionRefuse::class) == AvailableActions::STATUS_FAILED, 'problem with refuse action');

assert (false, 'test AvailableStatuses complete');



   /**
    * Проверка исключений для корректного значения действия в методе AvailableActions::getActiveStatus()
    */

$available = new AvailableActions(AvailableActions::STATUS_NEW);

$available->act = 'nonameAction';
try {
    $available->getActiveStatus($act);
}   catch(AllowedActionException $e) {
    assert($e instanceof AllowedActionException, 'error call getActiveStatus object with wrong user action');
}

    /**
    * Проверка исключений для корректного значения статуса в методе AvailableActions::getAvailableActions()
    * try-catch для исключений класса AllowedStatusException
    */
$available = new AvailableActions();
$available->activeStatus = setActiveStatus($status);

try {
   $available->setActiveStatus($status);
} catch(AllowedStatusException $e) {
  assert($e instanceof AllowedStatusException, 'error call AvailableActions object with wrong task status');
}

  /**
    * Проверка исключений для корректного значения статуса в методе AvailableActions::getAvailableActions()
    * try-catch для исключений класса WrongUserRoleException
    */


$unit = new AvailableActions(AvailableActions::STATUS_NEW);

$clientId = 1;
$executorId = 2;
$otherUserId = 3;

$unit->clientId = $clientId;
$unit->executorId = $executorId;


//вариант user = client

try {
    $unit->getAvailableActions($clientId, $clientId, $executorId) == [ActionCancel::getInnerName()];
} catch(WrongUserRoleException $e) {
    assert($e instanceof WrongUserRoleException, 'problem with cancel action for client in status NEW');
}

assert ($unit->getAvailableActions($clientId, $clientId, $executorId) == [ActionCancel::getInnerName()], 'problem with Cancel action for executor in status NEW');

//вариант user = executor

try {
    $unit->getAvailableActions($executorId, $clientId, $executorId);
}   catch (WrongUserRoleException $e) {
    assert($e instanceof WrongUserRoleException, 'problem with Respond action for client in status NEW');
}

assert ($unit->getAvailableActions($executorId, $clientId, $executorId) == [ActionRespond::getInnerName()], 'problem with Respond action for executor in status NEW');


assert ($unit->getAvailableActions($otherUserId, $clientId, $executorId) == [], 'problem with action for other user in status NEW');

// Для статуса INPROCESS отключены проверки

/*
$unit->setActiveStatus(AvailableActions::STATUS_INPROCESS);

try {
    $unit->getAvailableActions($clientId, $clientId, $executorId) == [ActionComplete::getInnerName()];
} catch(Exception $e) {
    assert($e instanceof WrongUserRoleException, $e);
}

assert ($unit->getAvailableActions($executorId, $clientId, $executorId) == [ActionRefuse::getInnerName()], 'problem with Refuse action for executor in status INPROCESS');
assert ($unit->getAvailableActions($otherUserId, $clientId, $executorId) == [], 'problem with action for other user in status INPROCESS'); */

assert (false, 'test AvailableActions complete');
