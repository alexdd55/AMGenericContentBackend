<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserAuths Controller
 *
 * @property \App\Model\Table\UserAuthsTable $UserAuths
 *
 * @method \App\Model\Entity\UserAuth[] paginate($object = null, array $settings = [])
 */
class UserAuthsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $userAuths = $this->paginate($this->UserAuths);

        $this->set(compact('userAuths'));
        $this->set('_serialize', ['userAuths']);
    }

    /**
     * View method
     *
     * @param string|null $id User Auth id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userAuth = $this->UserAuths->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userAuth', $userAuth);
        $this->set('_serialize', ['userAuth']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userAuth = $this->UserAuths->newEntity();
        if ($this->request->is('post')) {
            $userAuth = $this->UserAuths->patchEntity($userAuth, $this->request->data);
            if ($this->UserAuths->save($userAuth)) {
                $this->Flash->success(__('The {0} has been saved.', 'User Auth'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User Auth'));
            }
        }
        $users = $this->UserAuths->Users->find('list', ['limit' => 200]);
        $this->set(compact('userAuth', 'users'));
        $this->set('_serialize', ['userAuth']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Auth id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userAuth = $this->UserAuths->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userAuth = $this->UserAuths->patchEntity($userAuth, $this->request->data);
            if ($this->UserAuths->save($userAuth)) {
                $this->Flash->success(__('The {0} has been saved.', 'User Auth'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User Auth'));
            }
        }
        $users = $this->UserAuths->Users->find('list', ['limit' => 200]);
        $this->set(compact('userAuth', 'users'));
        $this->set('_serialize', ['userAuth']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Auth id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userAuth = $this->UserAuths->get($id);
        if ($this->UserAuths->delete($userAuth)) {
            $this->Flash->success(__('The {0} has been deleted.', 'User Auth'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'User Auth'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
