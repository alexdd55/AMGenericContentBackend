<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property bool $active
 * @property string $email
 * @property string $password
 * @property string $firstname
 * @property string $name
 * @property \Cake\I18n\FrozenDate $birthday
 * @property int $sex
 * @property string $street
 * @property string $number
 * @property string $zip
 * @property string $city
 * @property bool $push_allowed
 * @property \Cake\I18n\FrozenTime $lastlogin
 * @property string $forgot
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $deleted
 * @property string $invite
 * @property bool $agreed
 * @property \Cake\I18n\FrozenTime $agreed_date
 * @property bool $confirmed
 *
 * @property \App\Model\Entity\UserAuth[] $user_auths
 * @property \App\Model\Entity\Project[] $projects
 */
class User extends Entity
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
        'active' => true,
        'email' => true,
        'password' => true,
        'firstname' => true,
        'name' => true,
        'birthday' => true,
        'sex' => true,
        'street' => true,
        'number' => true,
        'zip' => true,
        'city' => true,
        'push_allowed' => true,
        'lastlogin' => true,
        'forgot' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'invite' => true,
        'agreed' => true,
        'agreed_date' => true,
        'confirmed' => true,
        'user_auths' => true,
        'projects' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
