<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SaidasEstoque Model
 *
 * @property \App\Model\Table\ProdutosTable&\Cake\ORM\Association\BelongsTo $Produtos
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\BelongsTo $Clientes
 *
 * @method \App\Model\Entity\SaidasEstoque newEmptyEntity()
 * @method \App\Model\Entity\SaidasEstoque newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\SaidasEstoque> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SaidasEstoque get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\SaidasEstoque findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\SaidasEstoque patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\SaidasEstoque> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SaidasEstoque|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\SaidasEstoque saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\SaidasEstoque>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SaidasEstoque>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SaidasEstoque>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SaidasEstoque> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SaidasEstoque>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SaidasEstoque>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SaidasEstoque>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SaidasEstoque> deleteManyOrFail(iterable $entities, array $options = [])
 */
class SaidasEstoqueTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('saidas_estoque');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Produtos', [
            'foreignKey' => 'produto_id',
        ]);
        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('produto_id')
            ->allowEmptyString('produto_id');

        $validator
            ->integer('quantidade')
            ->allowEmptyString('quantidade');

        $validator
            ->date('data_saida')
            ->allowEmptyDate('data_saida');

        $validator
            ->decimal('valor_total')
            ->allowEmptyString('valor_total');

        $validator
            ->integer('cliente_id')
            ->allowEmptyString('cliente_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'), ['errorField' => 'produto_id']);
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'), ['errorField' => 'cliente_id']);

        return $rules;
    }
}
