<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedore $fornecedore
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Fornecedore'), ['action' => 'edit', $fornecedore->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Fornecedore'), ['action' => 'delete', $fornecedore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedore->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Fornecedores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Fornecedore'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="fornecedores view content">
            <h3><?= h($fornecedore->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($fornecedore->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contato') ?></th>
                    <td><?= h($fornecedore->contato) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone') ?></th>
                    <td><?= h($fornecedore->telefone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($fornecedore->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fornecedore->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Endereco') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($fornecedore->endereco)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>