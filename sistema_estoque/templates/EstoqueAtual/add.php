<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EstoqueAtual $estoqueAtual
 * @var \Cake\Collection\CollectionInterface|string[] $produtos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Estoque Atual'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="estoqueAtual form content">
            <?= $this->Form->create($estoqueAtual) ?>
            <fieldset>
                <legend><?= __('Add Estoque Atual') ?></legend>
                <?php
                    echo $this->Form->control('produto_id', ['options' => $produtos]);
                    echo $this->Form->control('quantidade_atual');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
