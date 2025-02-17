<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Clientes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cliente'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="clientes view content">
            <h3><?= h($cliente->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($cliente->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cpf') ?></th>
                    <td><?= h($cliente->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cliente->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Saidas Estoque') ?></h4>
                <?php if (!empty($cliente->saidas_estoque)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Produto Id') ?></th>
                            <th><?= __('Quantidade') ?></th>
                            <th><?= __('Data Saida') ?></th>
                            <th><?= __('Valor Total') ?></th>
                            <th><?= __('Cliente Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($cliente->saidas_estoque as $saidasEstoque) : ?>
                        <tr>
                            <td><?= h($saidasEstoque->id) ?></td>
                            <td><?= h($saidasEstoque->produto_id) ?></td>
                            <td><?= h($saidasEstoque->quantidade) ?></td>
                            <td><?= h($saidasEstoque->data_saida) ?></td>
                            <td><?= h($saidasEstoque->valor_total) ?></td>
                            <td><?= h($saidasEstoque->cliente_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SaidasEstoque', 'action' => 'view', $saidasEstoque->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SaidasEstoque', 'action' => 'edit', $saidasEstoque->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SaidasEstoque', 'action' => 'delete', $saidasEstoque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saidasEstoque->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>