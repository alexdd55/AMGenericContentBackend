<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttributeCharTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttributeCharTable Test Case
 */
class AttributeCharTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttributeCharTable
     */
    public $AttributeChar;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attribute_char',
        'app.model_attributes',
        'app.contents',
        'app.attributes_tables',
        'app.attribute_bool',
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
        $config = TableRegistry::exists('AttributeChar') ? [] : ['className' => AttributeCharTable::class];
        $this->AttributeChar = TableRegistry::get('AttributeChar', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttributeChar);

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
