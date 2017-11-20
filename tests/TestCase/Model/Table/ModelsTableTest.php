<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModelsTable Test Case
 */
class ModelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModelsTable
     */
    public $Models;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.models',
        'app.projects',
        'app.content',
        'app.attribute_bool',
        'app.contents',
        'app.model_attributes',
        'app.attributes_tables',
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
        $config = TableRegistry::exists('Models') ? [] : ['className' => ModelsTable::class];
        $this->Models = TableRegistry::get('Models', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Models);

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
