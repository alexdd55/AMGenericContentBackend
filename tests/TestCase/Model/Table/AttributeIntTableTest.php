<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttributeIntTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttributeIntTable Test Case
 */
class AttributeIntTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttributeIntTable
     */
    public $AttributeInt;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attribute_int',
        'app.model_attributes',
        'app.contents',
        'app.attributes_tables',
        'app.attribute_bool',
        'app.attribute_char',
        'app.attribute_date',
        'app.attribute_double',
        'app.attribute_file',
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
        $config = TableRegistry::exists('AttributeInt') ? [] : ['className' => AttributeIntTable::class];
        $this->AttributeInt = TableRegistry::get('AttributeInt', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttributeInt);

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
