<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EntradasEstoque $entradasEstoque
 * @var string[]|\Cake\Collection\CollectionInterface $produtos
 * @var string[]|\Cake\Collection\CollectionInterface $fornecedors
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $entradasEstoque->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $entradasEstoque->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Entradas Estoque'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="entradasEstoque form content">
            <?= $this->Form->create($entradasEstoque) ?>
            <fieldset>
                <legend><?= __('Edit Entradas Estoque') ?></legend>
                <?php
                    echo $this->Form->control('produto_id', ['options' => $produtos, 'empty' => true]);
                    echo $this->Form->control('quantidade');
                    echo $this->Form->control('data_entrada', ['empty' => true]);
                    echo $this->Form->control('valor_total');
                    echo $this->Form->control('fornecedor_id', ['options' => $fornecedors, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
