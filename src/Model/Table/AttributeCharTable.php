<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttributeChar Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Contents
 * @property \App\Model\Table\ModelAttributesTable|\Cake\ORM\Association\BelongsTo $ModelAttributes
 *
 * @method \App\Model\Entity\AttributeChar get($primaryKey, $options = [])
 * @method \App\Model\Entity\AttributeChar newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AttributeChar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AttributeChar|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttributeChar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AttributeChar[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AttributeChar findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AttributeCharTable extends AppTable
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('attribute_char');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Content', [
            'foreignKey' => 'content_id'
        ]);
        $this->belongsTo('ModelAttributes', [
            'foreignKey' => 'model_attribute_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('value')
            ->allowEmpty('value');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['content_id'], 'Content'));
        $rules->add($rules->existsIn(['model_attribute_id'], 'ModelAttributes'));

        return $rules;
    }
}
