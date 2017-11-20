<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AttributesTable Entity
 *
 * @property int $id
 * @property string $attribute_table
 * @property string $name
 * @property string $type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ModelAttribute[] $model_attributes
 */
class AttributesTable extends Entity
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
        'attribute_table' => true,
        'name' => true,
        'type' => true,
        'created' => true,
        'modified' => true,
        'model_attributes' => true
    ];
}
