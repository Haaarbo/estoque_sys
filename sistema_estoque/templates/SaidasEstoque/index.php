<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\SaidasEstoque> $saidasEstoque
 */
?>
<div class="saidasEstoque index content">
    <?= $this->Html->link(__('New Saidas Estoque'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Saidas Estoque') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('produto_id') ?></th>
                    <th><?= $this->Paginator->sort('quantidade') ?></th>
                    <th><?= $this->Paginator->sort('data_saida') ?></th>
                    <th><?= $this->Paginator->sort('valor_total') ?></th>
                    <th><?= $this->Paginator->sort('cliente_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($saidasEstoque as $saidasEstoque): ?>
                <tr>
                    <td><?= $this->Number->format($saidasEstoque->id) ?></td>
                    <td><?= $saidasEstoque->hasValue('produto') ? $this->Html->link($saidasEstoque->produto->nome, ['controller' => 'Produtos', 'action' => 'view', $saidasEstoque->produto->id]) : '' ?></td>
                    <td><?= $saidasEstoque->quantidade === null ? '' : $this->Number->format($saidasEstoque->quantidade) ?></td>
                    <td><?= h($saidasEstoque->data_saida) ?></td>
                    <td><?= $saidasEstoque->valor_total === null ? '' : $this->Number->format($saidasEstoque->valor_total) ?></td>
                    <td><?= $saidasEstoque->hasValue('cliente') ? $this->Html->link($saidasEstoque->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $saidasEstoque->cliente->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $saidasEstoque->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $saidasEstoque->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $saidasEstoque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saidasEstoque->id)]) ?>
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