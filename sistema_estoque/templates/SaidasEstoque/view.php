<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaidasEstoque $saidasEstoque
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Saidas Estoque'), ['action' => 'edit', $saidasEstoque->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Saidas Estoque'), ['action' => 'delete', $saidasEstoque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saidasEstoque->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Saidas Estoque'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Saidas Estoque'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="saidasEstoque view content">
            <h3><?= h($saidasEstoque->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Produto') ?></th>
                    <td><?= $saidasEstoque->hasValue('produto') ? $this->Html->link($saidasEstoque->produto->nome, ['controller' => 'Produtos', 'action' => 'view', $saidasEstoque->produto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cliente') ?></th>
                    <td><?= $saidasEstoque->hasValue('cliente') ? $this->Html->link($saidasEstoque->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $saidasEstoque->cliente->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($saidasEstoque->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantidade') ?></th>
                    <td><?= $saidasEstoque->quantidade === null ? '' : $this->Number->format($saidasEstoque->quantidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Total') ?></th>
                    <td><?= $saidasEstoque->valor_total === null ? '' : $this->Number->format($saidasEstoque->valor_total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Saida') ?></th>
                    <td><?= h($saidasEstoque->data_saida) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>