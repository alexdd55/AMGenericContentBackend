<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ModelAttributes Model
 *
 * @property \App\Model\Table\ContentsTable|\Cake\ORM\Association\BelongsTo $Contents
 * @property \App\Model\Table\AttributesTablesTable|\Cake\ORM\Association\BelongsTo $AttributesTables
 * @property \App\Model\Table\AttributeBoolTable|\Cake\ORM\Association\HasMany $AttributeBool
 * @property \App\Model\Table\AttributeCharTable|\Cake\ORM\Association\HasMany $AttributeChar
 * @property \App\Model\Table\AttributeDateTable|\Cake\ORM\Association\HasMany $AttributeDate
 * @property \App\Model\Table\AttributeDoubleTable|\Cake\ORM\Association\HasMany $AttributeDouble
 * @property \App\Model\Table\AttributeFileTable|\Cake\ORM\Association\HasMany $AttributeFile
 * @property \App\Model\Table\AttributeIntTable|\Cake\ORM\Association\HasMany $AttributeInt
 * @property \App\Model\Table\AttributeTextTable|\Cake\ORM\Association\HasMany $AttributeText
 *
 * @method \App\Model\Entity\ModelAttribute get($primaryKey, $options = [])
 * @method \App\Model\Entity\ModelAttribute newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ModelAttribute[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ModelAttribute|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ModelAttribute patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ModelAttribute[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ModelAttribute findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ModelAttributesTable extends AppTable
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

        $this->setTable('model_attributes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Models', [
            'foreignKey' => 'model_id'
        ]);
        $this->belongsTo('AttributesTables', [
            'foreignKey' => 'attributes_table_id'
        ]);
        $this->hasMany('AttributeBool', [
            'foreignKey' => 'model_attribute_id',
            'join' => 'left'
        ]);
        $this->hasMany('AttributeChar', [
            'foreignKey' => 'model_attribute_id'
        ]);
        $this->hasMany('AttributeDate', [
            'foreignKey' => 'model_attribute_id'
        ]);
        $this->hasMany('AttributeDouble', [
            'foreignKey' => 'model_attribute_id'
        ]);
        $this->hasMany('AttributeFile', [
            'foreignKey' => 'model_attribute_id'
        ]);
        $this->hasMany('AttributeInt', [
            'foreignKey' => 'model_attribute_id'
        ]);
        $this->hasMany('AttributeText', [
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
            ->scalar('name')
            ->allowEmpty('name');

        $validator
            ->integer('sort')
            ->requirePresence('sort', 'create')
            ->notEmpty('sort');

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
        $rules->add($rules->existsIn(['model_id'], 'Models'));
        $rules->add($rules->existsIn(['attributes_table_id'], 'AttributesTables'));

        return $rules;
    }

    public function getRelatedDataForContent($content_id) {

    }
}
