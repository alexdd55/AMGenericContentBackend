<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Content Entity
 *
 * @property int $id
 * @property int $project_id
 * @property int $model_id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Model $model
 * @property \App\Model\Entity\AttributeBool[] $attribute_bool
 * @property \App\Model\Entity\AttributeDate[] $attribute_date
 * @property \App\Model\Entity\AttributeDouble[] $attribute_double
 * @property \App\Model\Entity\AttributeFile[] $attribute_file
 * @property \App\Model\Entity\ModelAttribute[] $model_attributes
 */
class Content extends Entity
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
        'project_id' => true,
        'model_id' => true,
        'name' => true,
        'created' => true,
        'modified' => true,
        'project' => true,
        'model' => true,
        'attribute_bool' => true,
        'attribute_date' => true,
        'attribute_double' => true,
        'attribute_file' => true,
        'model_attributes' => true
    ];
}
