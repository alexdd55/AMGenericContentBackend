<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttributeDoubleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttributeDoubleTable Test Case
 */
class AttributeDoubleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttributeDoubleTable
     */
    public $AttributeDouble;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attribute_double',
        'app.contents',
        'app.model_attributes',
        'app.attributes_tables',
        'app.attribute_bool',
        'app.attribute_char',
        'app.attribute_date',
        'app.attribute_file',
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
        $config = TableRegistry::exists('AttributeDouble') ? [] : ['className' => AttributeDoubleTable::class];
        $this->AttributeDouble = TableRegistry::get('AttributeDouble', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttributeDouble);

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
