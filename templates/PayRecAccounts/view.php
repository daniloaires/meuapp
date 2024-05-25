<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayRecAccount $payRecAccount
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pay Rec Account'), ['action' => 'edit', $payRecAccount->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pay Rec Account'), ['action' => 'delete', $payRecAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payRecAccount->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pay Rec Accounts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pay Rec Account'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payRecAccounts view content">
            <h3><?= h($payRecAccount->descricao) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descricao') ?></th>
                    <td><?= h($payRecAccount->descricao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($payRecAccount->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor') ?></th>
                    <td><?= $this->Number->format($payRecAccount->valor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= $this->Number->format($payRecAccount->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($payRecAccount->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vencimento') ?></th>
                    <td><?= h($payRecAccount->vencimento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($payRecAccount->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($payRecAccount->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($payRecAccount->deleted) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
