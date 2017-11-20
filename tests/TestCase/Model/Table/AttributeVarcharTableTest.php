<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttributeVarcharTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttributeVarcharTable Test Case
 */
class AttributeVarcharTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttributeVarcharTable
     */
    public $AttributeVarchar;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attribute_varchar',
        'app.attributes',
        'app.models',
        'app.projects',
        'app.users',
        'app.user_auths',
        'app.users_projects',
        'app.user_roles',
        'app.model_attributes',
        'app.attributes_tables',
        'app.datatypes',
        'app.attribute_bool',
        'app.attribute_date',
        'app.attribute_double',
        'app.attribute_int',
        'app.attribute_text'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AttributeVarchar') ? [] : ['className' => AttributeVarcharTable::class];
        $this->AttributeVarchar = TableRegistry::get('AttributeVarchar', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttributeVarchar);

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
