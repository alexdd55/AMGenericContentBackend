<?php

namespace App\Model\Table;

use Cake\Chronos\Chronos;
use Cake\Chronos\Date;
use Cake\I18n\FrozenDate;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Symfony\Component\Config\Definition\Builder\NormalizationBuilder;
use DateTime;

/**
 * Projects Model
 *
 * @property \App\Model\Table\ModelsTable|\Cake\ORM\Association\HasMany $Models
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 */
class AppTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);


    }

    /**
     * @param $name
     * @return mixed
     */
    public function getIdByName($name) {
        $Table = TableRegistry::get($this->_table);
        $result = $Table->find()
            ->select()
            ->where([
                'name' => $name
            ])
            ->first();
        return $result['id'];
    }

    /**
     * @return array
     */
    public function allAttributeTables() {
        $Table = TableRegistry::get($this->_table);
        $ass = $Table->_associations->keys();
        $tablelist = [];
        foreach ($ass as $a) {
            if ($a != 'attributestables' && $a != 'modelattributes' && stristr($a, 'attribute') == true) {
                $tableclass = TableRegistry::get($a)->getEntityClass();
                $tableclass = str_replace("App\\Model\\Entity\\", '', $tableclass);
                array_push($tablelist, $tableclass);
            }
        }
        return $tablelist;
    }

    /**
     * @return array
     */
    public function allAttributeTableNames() {
        $Table = TableRegistry::get($this->_table);
        $ass = $Table->_associations->keys();
        $tablelist = [];
        foreach ($ass as $a) {
            if ($a != 'attributestables' && $a != 'modelattributes' && stristr($a, 'attribute') == true) {
                array_push($tablelist, $tableclass = TableRegistry::get($a)->_table);
            }
        }
        return $tablelist;
    }

    public function getContentFromTable($model_attribute_id, $content_id) {
        $results = $this->find()
            ->where([
                'content_id' => $content_id,
                'model_attribute_id' => $model_attribute_id
            ])
            ->first();
        if (gettype($results['value']) == 'object') {
            $c = new FrozenDate($results['value']);
            return $c->toDateString();
        }
        return $results['value'];
    }

    public function convertArrayToKeyValue($data) {
        $newdata = [];
        foreach ($data as $d) {
            $newdata[$d['name']] = $d['value'];
        }
        return $newdata;
    }

    public function containAttributesWithContentId($content_id) {
        $tables = $this->allAttributeTables();
        $data = [];
        foreach ($tables as $t) {
            $data[$t] = [
                'conditions' => [
                    'content_id' => $content_id
                ]
            ];
        }
        return $data;
    }
}