<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DatatypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DatatypesTable Test Case
 */
class DatatypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DatatypesTable
     */
    public $Datatypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.datatypes',
        'app.attributes_tables',
        'app.attributes',
        'app.models',
        'app.projects',
        'app.users',
        'app.user_auths',
        'app.users_projects',
        'app.user_roles',
        'app.model_attributes',
        'app.attribute_bool',
        'app.attribute_date',
        'app.attribute_double',
        'app.attribute_int',
        'app.attribute_text',
        'app.attribute_varchar'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Datatypes') ? [] : ['className' => DatatypesTable::class];
        $this->Datatypes = TableRegistry::get('Datatypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Datatypes);

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
}
