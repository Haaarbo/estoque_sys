<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SaidasEstoque Entity
 *
 * @property int $id
 * @property int|null $produto_id
 * @property int|null $quantidade
 * @property \Cake\I18n\Date|null $data_saida
 * @property string|null $valor_total
 * @property int|null $cliente_id
 *
 * @property \App\Model\Entity\Produto $produto
 * @property \App\Model\Entity\Cliente $cliente
 */
class SaidasEstoque extends Entity
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
        'produto_id' => true,
        'quantidade' => true,
        'data_saida' => true,
        'valor_total' => true,
        'cliente_id' => true,
        'produto' => true,
        'cliente' => true,
    ];
}
