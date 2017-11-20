<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersProjects Controller
 *
 * @property \App\Model\Table\UsersProjectsTable $UsersProjects
 *
 * @method \App\Model\Entity\UsersProject[] paginate($object = null, array $settings = [])
 */
class UsersProjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'UserRoles', 'Projects']
        ];
        $usersProjects = $this->paginate($this->UsersProjects);

        $this->set(compact('usersProjects'));
        $this->set('_serialize', ['usersProjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Project id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersProject = $this->UsersProjects->get($id, [
            'contain' => ['Users', 'UserRoles', 'Projects']
        ]);

        $this->set('usersProject', $usersProject);
        $this->set('_serialize', ['usersProject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersProject = $this->UsersProjects->newEntity();
        if ($this->request->is('post')) {
            $usersProject = $this->UsersProjects->patchEntity($usersProject, $this->request->data);
            if ($this->UsersProjects->save($usersProject)) {
                $this->Flash->success(__('The {0} has been saved.', 'Users Project'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Users Project'));
            }
        }
        $users = $this->UsersProjects->Users->find('list', ['limit' => 200]);
        $userRoles = $this->UsersProjects->UserRoles->find('list', ['limit' => 200]);
        $projects = $this->UsersProjects->Projects->find('list', ['limit' => 200]);
        $this->set(compact('usersProject', 'users', 'userRoles', 'projects'));
        $this->set('_serialize', ['usersProject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Project id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersProject = $this->UsersProjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersProject = $this->UsersProjects->patchEntity($usersProject, $this->request->data);
            if ($this->UsersProjects->save($usersProject)) {
                $this->Flash->success(__('The {0} has been saved.', 'Users Project'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Users Project'));
            }
        }
        $users = $this->UsersProjects->Users->find('list', ['limit' => 200]);
        $userRoles = $this->UsersProjects->UserRoles->find('list', ['limit' => 200]);
        $projects = $this->UsersProjects->Projects->find('list', ['limit' => 200]);
        $this->set(compact('usersProject', 'users', 'userRoles', 'projects'));
        $this->set('_serialize', ['usersProject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Project id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersProject = $this->UsersProjects->get($id);
        if ($this->UsersProjects->delete($usersProject)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Users Project'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Users Project'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
