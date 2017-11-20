<?php
namespace App\Test\TestCase\Controller;

use App\Controller\DatatypesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\DatatypesController Test Case
 */
class DatatypesControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
