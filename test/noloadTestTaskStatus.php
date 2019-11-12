<?php require_once('../vendor/autoload.php');
    /**
      * File for testing if Class works right way
      */
    /*
     * loading function for Class TaskStatusOne
     */
    use YiiTaskForce\TaskStatusOne;

    $strategy = new TaskStatusOne();

    //настройки
    assert_options(ASSERT_ACTIVE, 1);
    assert_options(ASSERT_WARNING, 0);

    assert($strategy->getActiveStatus(TaskStatusOne::ACTION_ORDER) == TaskStatus::STATUS_NEW, 'problem with order action');
    assert($strategy->getActiveStatus(TaskStatusOne::ACTION_CANCEL) == TaskStatus::STATUS_CANCEL, 'problem with cancel action');
    assert($strategy->getActiveStatus(TaskStatusOne::ACTION_DO) == TaskStatus::STATUS_INPROCESS, 'problem with do action');
    assert($strategy->getActiveStatus(TaskStatusOne::ACTION_FINISH) == TaskStatus::STATUS_FINISH, 'problem with finish action');
    assert($strategy->getActiveStatus(TaskStatusOne::ACTION_PAY) == TaskStatus::STATUS_FINISH, 'problem with pay action');
