<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AttributeInt Entity
 *
 * @property int $id
 * @property int $content_id
 * @property int $model_attribute_id
 * @property int $value
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ModelAttribute $model_attribute
 */
class AttributeInt extends Entity
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
        'content_id' => true,
        'model_attribute_id' => true,
        'value' => true,
        'created' => true,
        'modified' => true,
        'model_attribute' => true
    ];
}