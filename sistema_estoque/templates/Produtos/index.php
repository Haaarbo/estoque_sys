<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Produto> $produtos
 */
?>
<div class="produtos index content">
    <?= $this->Html->link(__('New Produto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Produtos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('preco_custo') ?></th>
                    <th><?= $this->Paginator->sort('preco_venda') ?></th>
                    <th><?= $this->Paginator->sort('quantidade_estoque') ?></th>
                    <th><?= $this->Paginator->sort('data_entrada') ?></th>
                    <th><?= $this->Paginator->sort('fornecedor_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= $this->Number->format($produto->id) ?></td>
                    <td><?= h($produto->nome) ?></td>
                    <td><?= $produto->preco_custo === null ? '' : $this->Number->format($produto->preco_custo) ?></td>
                    <td><?= $produto->preco_venda === null ? '' : $this->Number->format($produto->preco_venda) ?></td>
                    <td><?= $produto->quantidade_estoque === null ? '' : $this->Number->format($produto->quantidade_estoque) ?></td>
                    <td><?= h($produto->data_entrada) ?></td>
                    <td><?= $produto->hasValue('fornecedor') ? $this->Html->link($produto->fornecedor->nome, ['controller' => 'Fornecedors', 'action' => 'view', $produto->fornecedor->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $produto->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produto->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?>
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