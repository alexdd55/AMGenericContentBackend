<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttributeTextTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttributeTextTable Test Case
 */
class AttributeTextTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttributeTextTable
     */
    public $AttributeText;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attribute_text',
        'app.model_attributes',
        'app.contents',
        'app.attributes_tables',
        'app.attribute_bool',
        'app.attribute_char',
        'app.attribute_date',
        'app.attribute_double',
        'app.attribute_file',
        'app.attribute_int'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AttributeText') ? [] : ['className' => AttributeTextTable::class];
        $this->AttributeText = TableRegistry::get('AttributeText', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttributeText);

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
