<?php

namespace app\views;

use app\user\forms\SupportForm;
use yii\base\View;
use steroids\auth\UserInterface;
use steroids\notifier\NotifierMessage;

/* @var $this View */
/* @var $message NotifierMessage */
/* @var $user UserInterface */

/** @var SupportForm $form */
$form = $message->params['form'];

$message->title = \Yii::t('steroids', 'Орион Трекинг. Сообщение от пользователя {name}', [
    'name' => $form->user->name,
]);
?>

<p>
    <?= \Yii::t('steroids', 'Пользователь:')?> #<?= $form->user->id ?> <?= $form->user->name ?>
</p>
<p>
    <?= \Yii::t('steroids', 'Телефон:')?> <?= $form->user->phone ?>
</p>
<p>
    <?= \Yii::t('steroids', 'Email:')?> <?= $form->user->email ?>
</p>
<p>
    <?= \Yii::t('steroids', 'Категория:')?> <?= $form->category ?>
</p>
<p>
    <?= \Yii::t('steroids', 'Тема:')?> <?= $form->subject ?>
</p>
<p>
    <?= \Yii::t('steroids', 'Автомобиль:')?> <?= $form->car ? $form->car->title : '' ?>
</p>
<p>
    <?= \Yii::t('steroids', 'Текст сообщения:')?> <?= $form->description ?>
</p>
