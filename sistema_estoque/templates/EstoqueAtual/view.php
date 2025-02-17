<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EstoqueAtual $estoqueAtual
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Estoque Atual'), ['action' => 'edit', $estoqueAtual->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Estoque Atual'), ['action' => 'delete', $estoqueAtual->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estoqueAtual->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Estoque Atual'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Estoque Atual'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="estoqueAtual view content">
            <h3><?= h($estoqueAtual->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Produto') ?></th>
                    <td><?= $estoqueAtual->hasValue('produto') ? $this->Html->link($estoqueAtual->produto->nome, ['controller' => 'Produtos', 'action' => 'view', $estoqueAtual->produto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($estoqueAtual->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantidade Atual') ?></th>
                    <td><?= $this->Number->format($estoqueAtual->quantidade_atual) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>