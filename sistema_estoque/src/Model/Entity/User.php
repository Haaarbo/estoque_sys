<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
//HASHER DE SENHA
use Authentication\PasswordHasher\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property string $role
 */
class User extends Entity
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
        'email' => true,
        'senha' => true,
        'role' => true,
    ];

    //CRIPTOGRAFA SENHA
    protected function _setSenha(string $senha)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($senha);
    }
}
