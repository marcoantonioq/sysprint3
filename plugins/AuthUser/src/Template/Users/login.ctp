<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
        <legend><?= __('Por favor informe seu usuário e senha') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>