<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserAuthsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserAuthsTable Test Case
 */
class UserAuthsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserAuthsTable
     */
    public $UserAuths;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_auths',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserAuths') ? [] : ['className' => UserAuthsTable::class];
        $this->UserAuths = TableRegistry::get('UserAuths', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserAuths);

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
