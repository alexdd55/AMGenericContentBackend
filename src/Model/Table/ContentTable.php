<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
use PhpParser\Node\Expr\Array_;
use function PHPSTORM_META\type;


/**
 * Content Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\ModelsTable|\Cake\ORM\Association\BelongsTo $Models
 * @property \App\Model\Table\AttributeBoolTable|\Cake\ORM\Association\HasMany $AttributeBool
 * @property \App\Model\Table\AttributeDateTable|\Cake\ORM\Association\HasMany $AttributeDate
 * @property \App\Model\Table\AttributeDoubleTable|\Cake\ORM\Association\HasMany $AttributeDouble
 * @property \App\Model\Table\AttributeFileTable|\Cake\ORM\Association\HasMany $AttributeFile
 * @property \App\Model\Table\AttributeCharTable|\Cake\ORM\Association\HasMany $AttributeChar
 * @property \App\Model\Table\AttributeIntTable|\Cake\ORM\Association\HasMany $AttributeInt
 * @property \App\Model\Table\AttributeTextTable|\Cake\ORM\Association\HasMany $AttributeText
 * @property \App\Model\Table\ModelAttributesTable|\Cake\ORM\Association\HasMany $ModelAttributes
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContentTable extends AppTable {


    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('content');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id'
        ]);
        $this->belongsTo('Models', [
            'foreignKey' => 'model_id'
        ]);
        $this->hasMany('AttributeBool', [
            'foreignKey' => 'content_id',
            'join' => 'left'
        ]);
        $this->hasMany('AttributeDate', [
            'foreignKey' => 'content_id'
        ]);
        $this->hasMany('AttributeDouble', [
            'foreignKey' => 'content_id'
        ]);
        $this->hasMany('AttributeFile', [
            'foreignKey' => 'content_id'
        ]);
        $this->hasMany('AttributeChar', [
            'foreignKey' => 'content_id'
        ]);
        $this->hasMany('AttributeInt', [
            'foreignKey' => 'content_id'
        ]);
        $this->hasMany('AttributeText', [
            'foreignKey' => 'content_id'
        ]);
        $this->hasMany('ModelAttributes', [
            'foreignKey' => 'content_id'
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
            ->scalar('name')
            ->allowEmpty('name');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['model_id'], 'Models'));

        return $rules;
    }


    /**
     * @param $model
     * @param $query
     * @return array
     */
    public function findApiContent($project, $model, $query) {

        $project_id = $this->Projects->getIdByName($project);
        $model_id = $this->Models->getIdByName($model);
        $contain = $this->mergeContainAttributes();

        $query = array_merge($query, [
            'Content.project_id' => $project_id,
            'Content.model_id' => $model_id
        ]);

        $results = $this->find()
            ->select([
                'id',
                'name',
                'model_id',
                'created'
            ])
            ->where($query)
            ->contain($contain)
            ->toArray();

        foreach ($results as $r) {
            $data = $this->findAttributes($r->model_id, $r->id);

        }

        $results = $this->createEasyKeyValueStructure($results);

        return $results;

    }

    private function findAttributes($model_id, $content_id) {
        $attributes = $this->ModelAttributes->find()
            ->where([
                'ModelAttributes.model_id' => $model_id
            ])
            ->orderAsc('sort');

        return $attributes;
    }

    private function mergeContainAttributes() {
        $contain = [
            'Models' => [
                'ModelAttributes' => [
                    'fields' => [
                        'id',
                        'model_id',
                        'attributes_table_id',
                        'name',
                        'sort'
                    ],
                    'sort' => ['sort' => 'ASC']
                ]
            ]
        ];
        $contain['Models']['ModelAttributes'] = array_merge($contain['Models']['ModelAttributes'], $this->createAttributeContains());
        return $contain;
    }

    public function createEasyKeyValueStructure($results) {
        $data = [];
        $i = 0;
        $AttributeTables = TableRegistry::get('AttributesTables');
        foreach ($results as $r) {

            $data[$i] = [
                'id' => $r->id,
                'name' => $r->name,
                'created' => $r->created,
                'attribute_values' => [],
                'content_data' => []
            ];
            $modelAttributes = $this->Models->ModelAttributes->find()->toArray();
            foreach($modelAttributes as $ma) {

                $data[$i]['attribute_values'][] = [
                    'id' => $ma->id,
                    'name' => $ma->name,
                    'table' => $AttributeTables->getTableNameById($ma->attributes_table_id)
                ];
            }
            $i++;
        }

        foreach($data as &$d) {
            foreach ($d['attribute_values'] as &$av) {
                $av['value'] = $this->ModelAttributes->{$av['table']}->getContentFromTable($av['id'], $d['id']);
            }
            array_push($d['content_data'], $this->convertArrayToKeyValue($d['attribute_values']));
            unset($d['attribute_values']);
        }
        return $data;
    }

    public function createEasyKeyValueStructureForElement($results,$content_id) {
        $data = [];
        $i = 0;
        $AttributeTables = TableRegistry::get('AttributesTables');
        foreach ($results as $r) {

            $data[$i] = [
                'id' => $r->id,
                'name' => $r->name,
                'created' => $r->created,
                'attribute_values' => [],
            ];
            $modelAttributes = $this->ModelAttributes->find()->toArray();
            foreach($modelAttributes as $ma) {
                if($ma->name == $r->name) {
                    $data[$i]['attribute_values'] = [
                        'id' => $ma->id,
                        'name' => $ma->name,
                        'table' => $AttributeTables->getTableNameById($ma->attributes_table_id)
                    ];
                }
            }
            $i++;
        }

        foreach($data as &$d) {
            $d['attribute_values']['value'] = $this->ModelAttributes->{$d['attribute_values']['table']}->getContentFromTable($d['attribute_values']['id'], $content_id);
            $d['attribute_values']['value_id'] = $this->ModelAttributes->{$d['attribute_values']['table']}->getContentIdFromTable($d['attribute_values']['id'], $content_id);

        }
        return $data;
    }

    private function createAttributeContains() {
        $tablelist = [];
        $tableclasses = $this->ModelAttributes->allAttributeTables();
        foreach ($tableclasses as $tableclass) {
            $tablelist[$tableclass] = [
                'fields' => [
                    $tableclass . '.id',
                    $tableclass . '.content_id',
                    $tableclass . '.model_attribute_id',
                    $tableclass . '.value'
                ]
            ];
        }
        return $tablelist;
    }

}


/*
 *  foreach ($this->ModelAttributes->allAttributeTableNames() as $t) {
                    if(isset($ma->$t[0])) {
                        $obj = $ma->{$t}[0];
                        if (!isset($data[$i]['attribute_values'][$ma->name]) || $data[$i]['attribute_values'][$ma->name] == null) {
                            if (count($obj) != 0) {
                                $data[$i]['attribute_values'][$ma->name] = $obj->value;
                            } else {
                                $data[$i]['attribute_values'][$ma->name] = null;
                            }
                        }
                    }
                }
 */