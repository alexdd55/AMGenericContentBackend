<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttributeText Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Contents
 * @property \App\Model\Table\ModelAttributesTable|\Cake\ORM\Association\BelongsTo $ModelAttributes
 *
 * @method \App\Model\Entity\AttributeText get($primaryKey, $options = [])
 * @method \App\Model\Entity\AttributeText newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AttributeText[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AttributeText|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttributeText patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AttributeText[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AttributeText findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AttributeTextTable extends AppTable
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

        $this->setTable('attribute_text');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Contents', [
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
        $rules->add($rules->existsIn(['content_id'], 'Contents'));
        $rules->add($rules->existsIn(['model_attribute_id'], 'ModelAttributes'));

        return $rules;
    }
}
