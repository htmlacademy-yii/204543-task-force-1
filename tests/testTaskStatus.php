<?php require_once('../vendor/autoload.php');
    /**
      * File for testing if Class works right way
      */
    /*
     * loading function for Class TaskStatus
     */
    use YiiTaskForce\Strategy\TaskStatus;
    /*
    use YiiTaskForce\Actions\Action;
    use YiiTaskForce\Actions\ActionCancel;
    use YiiTaskForce\Actions\ActionRespond;
    use YiiTaskForce\Actions\ActionFinish;
    use YiiTaskForce\Actions\ActionPay;
    use YiiTaskForce\Actions\ActionRefuse;
    */

    //настройки assert()
    assert_options(ASSERT_ACTIVE, 1);
    assert_options(ASSERT_WARNING, 0);
    assert_options(ASSERT_CALLBACK, function () {
        echo '<hr />';
        echo func_get_arg(3);
    });

    $strategy = new TaskStatus();

    assert ($strategy->getActiveStatus(TaskStatus::ACTION_CANCEL) == TaskStatus::STATUS_NEW, 'problem with cancel action');
    assert ($strategy->getActiveStatus(TaskStatus::ACTION_RESPOND) == TaskStatus::STATUS_INPROCESS, 'problem with respond action');
    assert ($strategy->getActiveStatus(TaskStatus::ACTION_FINISH) == TaskStatus::STATUS_FINISH, 'problem with finish action');
    assert ($strategy->getActiveStatus(TaskStatus::ACTION_PAY) == TaskStatus::STATUS_PAID, 'problem with pay action');
    assert ($strategy->getActiveStatus(TaskStatus::ACTION_REFUSE) == TaskStatus::STATUS_FAILED, 'problem with cancel action');

    assert (false, 'test complete');
