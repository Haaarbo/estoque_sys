<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $descricao
 * @property string|null $preco_custo
 * @property string|null $preco_venda
 * @property int|null $quantidade_estoque
 * @property \Cake\I18n\Date|null $data_entrada
 * @property int|null $fornecedor_id
 *
 * @property \App\Model\Entity\Fornecedor $fornecedor
 * @property \App\Model\Entity\EntradasEstoque[] $entradas_estoque
 * @property \App\Model\Entity\EstoqueAtual[] $estoque_atual
 * @property \App\Model\Entity\SaidasEstoque[] $saidas_estoque
 */
class Produto extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nome' => true,
        'descricao' => true,
        'preco_custo' => true,
        'preco_venda' => true,
        'quantidade_estoque' => true,
        'data_entrada' => true,
        'fornecedor_id' => true,
        'fornecedor' => true,
        'entradas_estoque' => true,
        'estoque_atual' => true,
        'saidas_estoque' => true,
    ];
}
