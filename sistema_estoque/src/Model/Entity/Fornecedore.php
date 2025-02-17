<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fornecedore Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $contato
 * @property string|null $telefone
 * @property string|null $email
 * @property string|null $endereco
 */
class Fornecedore extends Entity
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
        'contato' => true,
        'telefone' => true,
        'email' => true,
        'endereco' => true,
    ];
}
