<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Produto'), ['action' => 'edit', $produto->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Produto'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Produtos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Produto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="produtos view content">
            <h3><?= h($produto->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($produto->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fornecedor') ?></th>
                    <td><?= $produto->hasValue('fornecedor') ? $this->Html->link($produto->fornecedor->nome, ['controller' => 'Fornecedors', 'action' => 'view', $produto->fornecedor->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($produto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Preco Custo') ?></th>
                    <td><?= $produto->preco_custo === null ? '' : $this->Number->format($produto->preco_custo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Preco Venda') ?></th>
                    <td><?= $produto->preco_venda === null ? '' : $this->Number->format($produto->preco_venda) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantidade Estoque') ?></th>
                    <td><?= $produto->quantidade_estoque === null ? '' : $this->Number->format($produto->quantidade_estoque) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Entrada') ?></th>
                    <td><?= h($produto->data_entrada) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($produto->descricao)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Entradas Estoque') ?></h4>
                <?php if (!empty($produto->entradas_estoque)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Produto Id') ?></th>
                            <th><?= __('Quantidade') ?></th>
                            <th><?= __('Data Entrada') ?></th>
                            <th><?= __('Valor Total') ?></th>
                            <th><?= __('Fornecedor Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($produto->entradas_estoque as $entradasEstoque) : ?>
                        <tr>
                            <td><?= h($entradasEstoque->id) ?></td>
                            <td><?= h($entradasEstoque->produto_id) ?></td>
                            <td><?= h($entradasEstoque->quantidade) ?></td>
                            <td><?= h($entradasEstoque->data_entrada) ?></td>
                            <td><?= h($entradasEstoque->valor_total) ?></td>
                            <td><?= h($entradasEstoque->fornecedor_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'EntradasEstoque', 'action' => 'view', $entradasEstoque->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'EntradasEstoque', 'action' => 'edit', $entradasEstoque->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EntradasEstoque', 'action' => 'delete', $entradasEstoque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entradasEstoque->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Estoque Atual') ?></h4>
                <?php if (!empty($produto->estoque_atual)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Produto Id') ?></th>
                            <th><?= __('Quantidade Atual') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($produto->estoque_atual as $estoqueAtual) : ?>
                        <tr>
                            <td><?= h($estoqueAtual->id) ?></td>
                            <td><?= h($estoqueAtual->produto_id) ?></td>
                            <td><?= h($estoqueAtual->quantidade_atual) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'EstoqueAtual', 'action' => 'view', $estoqueAtual->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'EstoqueAtual', 'action' => 'edit', $estoqueAtual->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EstoqueAtual', 'action' => 'delete', $estoqueAtual->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estoqueAtual->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Saidas Estoque') ?></h4>
                <?php if (!empty($produto->saidas_estoque)) : ?>
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
                        <?php foreach ($produto->saidas_estoque as $saidasEstoque) : ?>
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