<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DigestAuthenticate;
use Cake\Event\Event;

/**
 * Users Model
 *
 * @property \App\Model\Table\UserAuthsTable|\Cake\ORM\Association\HasMany $UserAuths
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsToMany $Projects
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserAuths', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Projects', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'project_id',
            'joinTable' => 'users_projects'
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }


    /**
     * @param Event $event
     * @return bool
     */
    public function beforeSave(Event $event) {
        $entity = $event->data['entity'];
        // Make a password for digest auth.
        if ($entity->isNew() == true || $entity->setnewpassword == true) {
            $entity->password = DigestAuthenticate::password(
                $entity->email, $entity->password, 'EAP'
            );

            return true;
        }
    }


    /**
     * @param $data
     *
     * @return array|\Cake\Datasource\EntityInterface|null
     */
    public function findLoginUser($data) {
        return $this->find()
            ->where([
                'Users.email' => $data['email'],
                'password' => $data['password'],
                'Users.active' => true
            ])
            ->contain([
                'Projects'
            ])
            ->first();
    }
}
