<?php
assert($strategy->getActiveStatus(TaskStatus::ACTION_ORDER) == TaskStatus::STATUS_NEW, 'problem with order action');
assert($strategy->getActiveStatus(TaskStatus::ACTION_CANCEL) == TaskStatus::STATUS_CANCEL, 'problem with cancel action');
assert($strategy->getActiveStatus(TaskStatus::ACTION_DO) == TaskStatus::STATUS_INPROCESS, 'problem with do action');
assert($strategy->getActiveStatus(TaskStatus::ACTION_FINISH) == TaskStatus::STATUS_FINISH, 'problem with finish action');
assert($strategy->getActiveStatus(TaskStatus::ACTION_PAY) == TaskStatus::STATUS_FINISH, 'problem with pay action');
