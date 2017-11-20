<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttributesTables Model
 *
 * @property \App\Model\Table\ModelAttributesTable|\Cake\ORM\Association\HasMany $ModelAttributes
 *
 * @method \App\Model\Entity\AttributesTable get($primaryKey, $options = [])
 * @method \App\Model\Entity\AttributesTable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AttributesTable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AttributesTable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttributesTable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AttributesTable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AttributesTable findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AttributesTablesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('attributes_tables');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ModelAttributes', [
            'foreignKey' => 'attributes_table_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('attribute_table')
            ->allowEmpty('attribute_table');

        $validator
            ->scalar('name')
            ->allowEmpty('name');

        $validator
            ->scalar('type')
            ->allowEmpty('type');

        return $validator;
    }

    public function getTableNameById($id) {
        $result = $this->get($id);
        return $result->tablemodelname;
    }
}
