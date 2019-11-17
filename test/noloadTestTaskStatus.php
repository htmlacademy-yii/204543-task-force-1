<?php require_once('../vendor/autoload.php');
    /**
      * File for testing if Class works right way
      */
    /*
     * loading function for Class TaskStatus
     */
    use YiiTaskForce\TaskStatus;

    $strategy = new TaskStatus();

    //настройки
    assert_options(ASSERT_ACTIVE, 1);
    assert_options(ASSERT_WARNING, 0);
    assert_options(ASSERT_CALLBACK, function () {
        echo '<hr />';
        echo func_get_arg(3);
    });

    assert($strategy->getActiveStatus(TaskStatus::ACTION_ORDER) == TaskStatus::STATUS_NEW, 'problem with order action');
    assert($strategy->getActiveStatus(TaskStatus::ACTION_CANCEL) == TaskStatus::STATUS_CANCEL, 'problem with cancel action');
    assert($strategy->getActiveStatus(TaskStatus::ACTION_DO) == TaskStatus::STATUS_INPROCESS, 'problem with do action');
    assert($strategy->getActiveStatus(TaskStatus::ACTION_FINISH) == TaskStatus::STATUS_FINISH, 'problem with finish action');
    assert($strategy->getActiveStatus(TaskStatus::ACTION_PAY) == TaskStatus::STATUS_PAID, 'problem with pay action');
