<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EntradasEstoque $entradasEstoque
 * @var \Cake\Collection\CollectionInterface|string[] $produtos
 * @var \Cake\Collection\CollectionInterface|string[] $fornecedors
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Entradas Estoque'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="entradasEstoque form content">
            <?= $this->Form->create($entradasEstoque) ?>
            <fieldset>
                <legend><?= __('Add Entradas Estoque') ?></legend>
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
