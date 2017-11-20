<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttributesTables;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttributesTables Test Case
 */
class AttributesTablesTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttributesTables
     */
    public $AttributesTables;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attribute_text',
        'app.model_attributes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Attributess') ? [] : ['className' => AttributesTables::class];
        $this->AttributesTables = TableRegistry::get('Attributess', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttributesTables);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
