<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UserRolesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UserRolesController Test Case
 */
class UserRolesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_roles',
        'app.users_projects',
        'app.users',
        'app.user_auths',
        'app.projects',
        'app.content',
        'app.models',
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
