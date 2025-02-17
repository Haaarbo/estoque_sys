<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaidasEstoque $saidasEstoque
 * @var \Cake\Collection\CollectionInterface|string[] $produtos
 * @var \Cake\Collection\CollectionInterface|string[] $clientes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Saidas Estoque'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="saidasEstoque form content">
            <?= $this->Form->create($saidasEstoque) ?>
            <fieldset>
                <legend><?= __('Add Saidas Estoque') ?></legend>
                <?php
                    echo $this->Form->control('produto_id', ['options' => $produtos, 'empty' => true]);
                    echo $this->Form->control('quantidade');
                    echo $this->Form->control('data_saida', ['empty' => true]);
                    echo $this->Form->control('valor_total');
                    echo $this->Form->control('cliente_id', ['options' => $clientes, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
