<?php
    /**
      * File for testing if Class works right way
      */
    /*
     * loading function for Class TaskStatus
     */

    use YiiTaskForce\Strategy\TaskStatusOne;

    $strategy = new TaskStatusOne();

    //настройки
    assert_options(ASSERT_ACTIVE, true);
    assert_options(ASSERT_WARNING, true);

    assert($strategy->getActiveStatus(TaskStatusOne::ACTION_ORDER) == TaskStatus::STATUS_NEW, 'order action');
    assert($strategy->getActiveStatus(TaskStatusOne::ACTION_CANCEL) == TaskStatus::STATUS_CANCEL, 'cancel action');
    assert($strategy->getActiveStatus(TaskStatusOne::ACTION_DO) == TaskStatus::STATUS_INPROCESS, 'do action');
    assert($strategy->getActiveStatus(TaskStatusOne::ACTION_FINISH) == TaskStatus::STATUS_FINISH, 'finish action');
    assert($strategy->getActiveStatus(TaskStatusOne::ACTION_PAY) == TaskStatus::STATUS_FINISH, 'pay action');
