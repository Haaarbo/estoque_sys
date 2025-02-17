<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\EntradasEstoque> $entradasEstoque
 */
?>
<div class="entradasEstoque index content">
    <?= $this->Html->link(__('New Entradas Estoque'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Entradas Estoque') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('produto_id') ?></th>
                    <th><?= $this->Paginator->sort('quantidade') ?></th>
                    <th><?= $this->Paginator->sort('data_entrada') ?></th>
                    <th><?= $this->Paginator->sort('valor_total') ?></th>
                    <th><?= $this->Paginator->sort('fornecedor_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entradasEstoque as $entradasEstoque): ?>
                <tr>
                    <td><?= $this->Number->format($entradasEstoque->id) ?></td>
                    <td><?= $entradasEstoque->hasValue('produto') ? $this->Html->link($entradasEstoque->produto->nome, ['controller' => 'Produtos', 'action' => 'view', $entradasEstoque->produto->id]) : '' ?></td>
                    <td><?= $entradasEstoque->quantidade === null ? '' : $this->Number->format($entradasEstoque->quantidade) ?></td>
                    <td><?= h($entradasEstoque->data_entrada) ?></td>
                    <td><?= $entradasEstoque->valor_total === null ? '' : $this->Number->format($entradasEstoque->valor_total) ?></td>
                    <td><?= $entradasEstoque->hasValue('fornecedor') ? $this->Html->link($entradasEstoque->fornecedor->nome, ['controller' => 'Clientes', 'action' => 'view', $entradasEstoque->fornecedor->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $entradasEstoque->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $entradasEstoque->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $entradasEstoque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entradasEstoque->id)]) ?>
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