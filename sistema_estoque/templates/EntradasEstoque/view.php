<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EntradasEstoque $entradasEstoque
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Entradas Estoque'), ['action' => 'edit', $entradasEstoque->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Entradas Estoque'), ['action' => 'delete', $entradasEstoque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entradasEstoque->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Entradas Estoque'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Entradas Estoque'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="entradasEstoque view content">
            <h3><?= h($entradasEstoque->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Produto') ?></th>
                    <td><?= $entradasEstoque->hasValue('produto') ? $this->Html->link($entradasEstoque->produto->nome, ['controller' => 'Produtos', 'action' => 'view', $entradasEstoque->produto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Fornecedor') ?></th>
                    <td><?= $entradasEstoque->hasValue('fornecedor') ? $this->Html->link($entradasEstoque->fornecedor->nome, ['controller' => 'Clientes', 'action' => 'view', $entradasEstoque->fornecedor->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($entradasEstoque->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantidade') ?></th>
                    <td><?= $entradasEstoque->quantidade === null ? '' : $this->Number->format($entradasEstoque->quantidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Total') ?></th>
                    <td><?= $entradasEstoque->valor_total === null ? '' : $this->Number->format($entradasEstoque->valor_total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Entrada') ?></th>
                    <td><?= h($entradasEstoque->data_entrada) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>