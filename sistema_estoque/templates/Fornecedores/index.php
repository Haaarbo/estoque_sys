<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fornecedore> $fornecedores
 */
?>
<div class="fornecedores index content">
    <?= $this->Html->link(__('New Fornecedore'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fornecedores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('contato') ?></th>
                    <th><?= $this->Paginator->sort('telefone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fornecedores as $fornecedore): ?>
                <tr>
                    <td><?= $this->Number->format($fornecedore->id) ?></td>
                    <td><?= h($fornecedore->nome) ?></td>
                    <td><?= h($fornecedore->contato) ?></td>
                    <td><?= h($fornecedore->telefone) ?></td>
                    <td><?= h($fornecedore->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fornecedore->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fornecedore->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fornecedore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedore->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>