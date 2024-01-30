<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'worker';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * An associative array of the available groups in the system, where the keys
     * are the group names and the values are arrays of the group info.
     *
     * Whatever value you assign as the key will be used to refer to the group
     * when using functions such as:
     *      $user->addGroup('superadmin');
     *
     * @var array<string, array<string, string>>
     *
     * @see https://codeigniter4.github.io/shield/quick_start_guide/using_authorization/#change-available-groups for more info
     */
    public array $groups = [
        'admin' => [
            'title'       => 'Admin',
            'description' => 'Day to day administrators of the site.',
        ],
        'boss' => [
            'title'       => 'Boos',
            'description' => 'General users of the site.',
        ],
        'worker' => [
            'title'       => 'Worker',
            'description' => 'General users of the site.',
        ],
        'secretary' => [
            'title'       => 'Secretary',
            'description' => 'General users of the site.',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system.
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'admin.access'        => 'Can access the sites admin area',
        'admin.settings'      => 'Can access the main site settings',
        'boss.access'         => 'Can access the sites boss area',
        'worker.access'       => 'Can access the sites worker area',
        'secretary.access'    => 'Can access the sites secretary area',
        'users.manage-admins' => 'Can manage other admins',
        'users.create'        => 'Can create new non-admin users',
        'users.edit'          => 'Can edit existing non-admin users',
        'users.delete'        => 'Can delete existing non-admin users',
        'users.create-hours'  => 'Can create new tasks',
        'users.tasks'         => 'Can access the tasks',
        'users.create-tasks'  => 'Can create new tasks',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     *
     * This defines group-level permissions.
     */
    public array $matrix = [
        'admin' => [
            'admin.*',
            'boss.*',
            'worker.*',
            'secretary.*',
            'users.*',
        ],
        'boss' => [
            'boss.*',
        ],
        'worker' => [
            'worker.*',
            'users.create-hours',
        ],
        'secretary' => [
            'secretary.*',
            'users.create-tasks',
        ],
    ];
}
