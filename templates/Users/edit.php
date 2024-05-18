<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger btn-block side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block side-nav-item']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="users form">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('username', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('password', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('role_id', ['options' => $roles, 'class' => 'form-control']) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
