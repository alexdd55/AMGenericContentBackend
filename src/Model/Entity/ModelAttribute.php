<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ModelAttribute Entity
 *
 * @property int $id
 * @property int $content_id
 * @property int $attributes_table_id
 * @property string $name
 * @property int $sort
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Content $content
 * @property \App\Model\Entity\AttributesTable $attributes_table
 * @property \App\Model\Entity\AttributeBool[] $attribute_bool
 * @property \App\Model\Entity\AttributeChar[] $attribute_char
 * @property \App\Model\Entity\AttributeDate[] $attribute_date
 * @property \App\Model\Entity\AttributeDouble[] $attribute_double
 * @property \App\Model\Entity\AttributeFile[] $attribute_file
 * @property \App\Model\Entity\AttributeInt[] $attribute_int
 * @property \App\Model\Entity\AttributeText[] $attribute_text
 */
class ModelAttribute extends Entity
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
        'attributes_table_id' => true,
        'name' => true,
        'sort' => true,
        'created' => true,
        'modified' => true,
        'content' => true,
        'attributes_table' => true,
        'attribute_bool' => true,
        'attribute_char' => true,
        'attribute_date' => true,
        'attribute_double' => true,
        'attribute_file' => true,
        'attribute_int' => true,
        'attribute_text' => true
    ];
}
