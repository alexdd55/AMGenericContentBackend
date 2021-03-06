<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttributeDateTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttributeDateTable Test Case
 */
class AttributeDateTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttributeDateTable
     */
    public $AttributeDate;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attribute_date',
        'app.contents',
        'app.model_attributes',
        'app.attributes_tables',
        'app.attribute_bool',
        'app.attribute_char',
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
        $config = TableRegistry::exists('AttributeDate') ? [] : ['className' => AttributeDateTable::class];
        $this->AttributeDate = TableRegistry::get('AttributeDate', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttributeDate);

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
