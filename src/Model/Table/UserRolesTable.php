<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserRoles Model
 *
 * @property \App\Model\Table\UsersProjectsTable|\Cake\ORM\Association\HasMany $UsersProjects
 *
 * @method \App\Model\Entity\UserRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserRole findOrCreate($search, callable $callback = null, $options = [])
 */
class UserRolesTable extends Table
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

        $this->setTable('user_roles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('UsersProjects', [
            'foreignKey' => 'user_role_id'
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
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->boolean('access_portal')
            ->requirePresence('access_portal', 'create')
            ->notEmpty('access_portal');

        $validator
            ->boolean('access_lounge')
            ->requirePresence('access_lounge', 'create')
            ->notEmpty('access_lounge');

        $validator
            ->scalar('access_list')
            ->allowEmpty('access_list');

        $validator
            ->boolean('access_lounge_welcome')
            ->requirePresence('access_lounge_welcome', 'create')
            ->notEmpty('access_lounge_welcome');

        $validator
            ->boolean('access_lounge_business')
            ->requirePresence('access_lounge_business', 'create')
            ->notEmpty('access_lounge_business');

        $validator
            ->boolean('access_lounge_senator')
            ->requirePresence('access_lounge_senator', 'create')
            ->notEmpty('access_lounge_senator');

        $validator
            ->boolean('access_lounge_firstclass')
            ->requirePresence('access_lounge_firstclass', 'create')
            ->notEmpty('access_lounge_firstclass');

        $validator
            ->scalar('controller')
            ->allowEmpty('controller');

        $validator
            ->scalar('action')
            ->allowEmpty('action');

        return $validator;
    }
}
