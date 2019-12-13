<?php
    require_once '../vendor/autoload.php';

    /**
      * File
       for testing if Class works right way
      */
    /*
     * loading function for Class TaskStatus
     */
    use YiiTaskForce\Strategy\TaskStatus;

    //настройки assert()
    assert_options(ASSERT_ACTIVE, 1);
    assert_options(ASSERT_WARNING, 0);
    assert_options(ASSERT_CALLBACK, function () {
        echo '<hr />';
        echo func_get_arg(3);
    });

    $strategy = new TaskStatus();

    assert ($strategy->getActiveStatus(TaskStatus::ACTION_CANCEL) == TaskStatus::STATUS_CANCEL, 'problem with cancel action');
    assert ($strategy->getActiveStatus(TaskStatus::ACTION_RESPOND) == TaskStatus::STATUS_INPROCESS, 'problem with respond action');
    assert ($strategy->getActiveStatus(TaskStatus::ACTION_COMPLETE) == TaskStatus::STATUS_COMPLETED, 'problem with complete action');
    assert ($strategy->getActiveStatus(TaskStatus::ACTION_REFUSE) == TaskStatus::STATUS_FAILED, 'problem with refuse action');

    assert (false, 'test TaskStatus::getActiveStatus() complete');


