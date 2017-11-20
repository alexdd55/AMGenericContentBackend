<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModelContentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModelContentTable Test Case
 */
class ModelContentTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModelContentTable
     */
    public $ModelContent;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.model_content',
        'app.models',
        'app.projects',
        'app.attributes',
        'app.attributes_tables',
        'app.attribute_bool',
        'app.attribute_char',
        'app.attribute_date',
        'app.attribute_double',
        'app.attribute_int',
        'app.attribute_text',
        'app.model_attributes',
        'app.users',
        'app.user_auths',
        'app.users_projects',
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
        $config = TableRegistry::exists('ModelContent') ? [] : ['className' => ModelContentTable::class];
        $this->ModelContent = TableRegistry::get('ModelContent', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModelContent);

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
