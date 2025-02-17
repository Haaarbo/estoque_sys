<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EstoqueAtual Model
 *
 * @property \App\Model\Table\ProdutosTable&\Cake\ORM\Association\BelongsTo $Produtos
 *
 * @method \App\Model\Entity\EstoqueAtual newEmptyEntity()
 * @method \App\Model\Entity\EstoqueAtual newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\EstoqueAtual> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EstoqueAtual get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\EstoqueAtual findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\EstoqueAtual patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\EstoqueAtual> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EstoqueAtual|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\EstoqueAtual saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\EstoqueAtual>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EstoqueAtual>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EstoqueAtual>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EstoqueAtual> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EstoqueAtual>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EstoqueAtual>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EstoqueAtual>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EstoqueAtual> deleteManyOrFail(iterable $entities, array $options = [])
 */
class EstoqueAtualTable extends Table
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

        $this->setTable('estoque_atual');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Produtos', [
            'foreignKey' => 'produto_id',
            'joinType' => 'INNER',
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
            ->notEmptyString('produto_id');

        $validator
            ->integer('quantidade_atual')
            ->notEmptyString('quantidade_atual');

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

        return $rules;
    }
}
