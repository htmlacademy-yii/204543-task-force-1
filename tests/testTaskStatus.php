<?php require_once('../vendor/autoload.php');
    /**
      * File for testing if Class works right way
      */
    /*
     * loading function for Class TaskStatus
     */
    use YiiTaskForce\Strategy\TaskStatus;
    use YiiTaskForce\actions\Action;
    use YiiTaskForce\actions\ActionCancel;
    use YiiTaskForce\actions\ActionRespond;
    use YiiTaskForce\actions\ActionFinish;
    use YiiTaskForce\actions\ActionPay;
    use YiiTaskForce\actions\ActionRefuse;

    $strategy = new TaskStatus();

    //настройки assert()
    assert_options(ASSERT_ACTIVE, 1);
    assert_options(ASSERT_WARNING, 0);
    assert_options(ASSERT_CALLBACK, function () {
        echo '<hr />';
        echo func_get_arg(3);
    });

    $strategy->act = ActionCancel::getClassName();
    var_dump( $strategy->act);

    var_dump($strategy->getActiveStatus(ActionRespond::getClassName()));
    echo 'Статусы из TaskStatus::getActiveStatus()';

    $allActions = [
        ActionCancel::getClassName(),
        ActionRespond::getClassName(),
        ActionFinish::getClassName(),
        ActionPay::getClassName(),
        ActionRefuse::getClassName()
    ];

    foreach ($allActions as $allActions) {
        var_dump ($strategy->getActiveStatus($allActions)); "\n";
    }
    /*
    * assert'ы запустить не удалось...

    assert ($strategy->getActiveStatus(ActionCancel::getClassName()) == TaskStatus::STATUS_NEW, 'problem with cancel action');

    assert (false, 'test complete');
    */
