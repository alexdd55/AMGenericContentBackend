<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttributesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttributesTable Test Case
 */
class AttributesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttributesTable
     */
    public $Attributes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attributes',
        'app.projects',
        'app.models',
        'app.model_attributes',
        'app.attribute_bool',
        'app.attribute_char',
        'app.attribute_date',
        'app.attribute_double',
        'app.attribute_int',
        'app.attribute_text',
        'app.users',
        'app.user_auths',
        'app.users_projects',
        'app.user_roles',
        'app.attributes_tables'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Attributes') ? [] : ['className' => AttributesTable::class];
        $this->Attributes = TableRegistry::get('Attributes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Attributes);

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
