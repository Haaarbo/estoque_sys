<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EstoqueAtual $estoqueAtual
 * @var string[]|\Cake\Collection\CollectionInterface $produtos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $estoqueAtual->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $estoqueAtual->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Estoque Atual'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="estoqueAtual form content">
            <?= $this->Form->create($estoqueAtual) ?>
            <fieldset>
                <legend><?= __('Edit Estoque Atual') ?></legend>
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
