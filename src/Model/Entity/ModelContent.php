<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ModelContent Entity
 *
 * @property int $id
 * @property int $model_id
 * @property int $project_id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Model $model
 * @property \App\Model\Entity\Project $project
 */
class ModelContent extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'model_id' => true,
        'project_id' => true,
        'name' => true,
        'created' => true,
        'modified' => true,
        'model' => true,
        'project' => true
    ];
}
