<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserRole Entity
 *
 * @property int $id
 * @property bool $active
 * @property string $name
 * @property bool $access_portal
 * @property bool $access_lounge
 * @property string $access_list
 * @property bool $access_lounge_welcome
 * @property bool $access_lounge_business
 * @property bool $access_lounge_senator
 * @property bool $access_lounge_firstclass
 * @property string $controller
 * @property string $action
 *
 * @property \App\Model\Entity\UsersProject[] $users_projects
 */
class UserRole extends Entity
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
        'name' => true,
        'access_portal' => true,
        'access_lounge' => true,
        'access_list' => true,
        'access_lounge_welcome' => true,
        'access_lounge_business' => true,
        'access_lounge_senator' => true,
        'access_lounge_firstclass' => true,
        'controller' => true,
        'action' => true,
        'users_projects' => true
    ];
}
