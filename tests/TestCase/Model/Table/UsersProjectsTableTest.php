<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersProjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersProjectsTable Test Case
 */
class UsersProjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersProjectsTable
     */
    public $UsersProjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_projects',
        'app.users',
        'app.user_auths',
        'app.projects',
        'app.content',
        'app.models',
        'app.attribute_bool',
        'app.contents',
        'app.model_attributes',
        'app.attributes_tables',
        'app.attribute_char',
        'app.attribute_date',
        'app.attribute_double',
        'app.attribute_file',
        'app.attribute_int',
        'app.attribute_text',
        'app.user_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersProjects') ? [] : ['className' => UsersProjectsTable::class];
        $this->UsersProjects = TableRegistry::get('UsersProjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersProjects);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
