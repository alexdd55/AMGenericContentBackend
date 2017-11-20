<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModelAttributesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModelAttributesTable Test Case
 */
class ModelAttributesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModelAttributesTable
     */
    public $ModelAttributes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.model_attributes',
        'app.contents',
        'app.attributes_tables',
        'app.attribute_bool',
        'app.attribute_char',
        'app.attribute_date',
        'app.attribute_double',
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
        $config = TableRegistry::exists('ModelAttributes') ? [] : ['className' => ModelAttributesTable::class];
        $this->ModelAttributes = TableRegistry::get('ModelAttributes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModelAttributes);

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
