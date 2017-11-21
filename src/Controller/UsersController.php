<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DigestAuthenticate;
use Cake\I18n\Time;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * @return \Cake\Http\Response|null
     */
    public function login(){
        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if ($data['password'] != '') {
                $data['password'] = DigestAuthenticate::password(
                    $data['email'], $data['password'], 'EAP'
                );
                $user = $this->Users->findLoginUser($data);
                if ($user) {
                    $userrole = $user->user_role_id;
                    $user = $this->Users->patchEntity($user, [
                        'forgot' => '',
                        'lastlogin' => Time::now(),
                        'setnewpassword' => false
                    ]);

                    if ($this->Users->save($user)) {
                        $this->Auth->setUser($user->toArray());
                    }
                    if ($this->Auth->user('user_role_id') != 1 && Configure::read('maintenance') == 1) {
                        $this->Flash->error(__('GCE is in maintenance mode. Try again later.'));
                        return $this->redirect(['controller' => 'users', 'action' => 'login']);
                    }

                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $data['password'] = '';
                    $this->Flash->error(__('E-Mail or Passwort incorrect.'));
                }
            } else {
                $this->Flash->error(__('E-Mail or Passwort incorrect.'));
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
        };
    }

    /**
     * @return \Cake\Http\Response|null
     */
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }


    /**
     *
     */
    public function forgot() {
        $this->viewBuilder()->setLayout('signin');
        $sent = false;
        if ($this->request->is('post')) {
            $user = $this->Users->find()
                ->where(['email' => $this->request->getData('email')])
                ->first();
            if ($user) {
                $user = $this->Users->patchEntity($user, ['forgot' => md5($user->email . Time::now())]);
                if ($this->Users->save($user)) {
                    $data = [
                        'subject' => 'GEC - Create new password',
                        'email' => $user->email,
                        'template' => 'passwordlink',
                        'vars' => [
                            'email' => $user->email,
                            'forgot' => $user->forgot,
                            'app' => Configure::read('App')
                        ]
                    ];
                    $this->sendEmail($data);
                }
                $sent = true;
            }
        }
        $this->set(compact('sent'));
    }

    public function dashboard() {

    }

    /**
     * @param null $hash
     * @param null $email
     *
     * @return \Cake\Http\Response|null
     */
    public function setnewpassword($hash = null, $email = null) {
        $this->viewBuilder()->setLayout('login');
        $data = $this->request->getData();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->find()
                ->where([
                    'email' => $data['email'],
                    'forgot' => $data['forgot']
                ])
                ->first();
            if ($user) {
                $user = $this->Users->patchEntity($user, [
                    'setnewpassword' => true,
                    'password' => $data['password'],
                    'forgot' => ''
                ]);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your password was changed successfully.'));
                    return $this->redirect(['action' => 'login']);
                }
            }
        }
        $allowed = false;
        $user = $this->Users->find()
            ->where([
                'email' => $email,
                'forgot' => $hash
            ])
            ->first();
        if ($user) {
            $newhash = md5($user->email . Time::now());
            $user = $this->Users->patchEntity($user, ['forgot' => $newhash]);
            if ($this->Users->save($user)) {
                $allowed = true;
                $message = 'Enter your new password.';
            }
        }
        $this->set(compact('allowed', 'user', 'newhash', 'email', 'message'));
    }

    /**
     * @param $hash
     */
    public function confirmregistration($hash) {
        $this->viewBuilder()->setLayout('signin');
        $found = false;
        $data = $this->Users->find()
            ->where([
                'SHA2(email,256)' => $hash,
                'confirmed' => false
            ])
            ->first();
        if (isset($data)) {
            $data->confirmed = true;
            if ($this->Users->save($data)) {
                $found = true;
                $data = [
                    'subject' => 'Your account is activated',
                    'email' => $data->email,
                    'template' => 'confirmactivation',
                    'vars' => [
                        'app' => Configure::read('App')
                    ]
                ];
                if ($this->sendEmail($data)) {

                }
            }
        }
        $this->set('found', $found);
    }

    /**
     * @return \Cake\Http\Response|null
     */
    public function profile() {
        $user = $this->Users->get($this->Auth->user('id'));
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set('user', $user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Projects', 'UserAuths']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The {0} has been saved.', 'User'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
            }
        }
        $projects = $this->Users->Projects->find('list', ['limit' => 200]);
        $this->set(compact('user', 'projects'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Projects']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The {0} has been saved.', 'User'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
            }
        }
        $projects = $this->Users->Projects->find('list', ['limit' => 200]);
        $this->set(compact('user', 'projects'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The {0} has been deleted.', 'User'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'User'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
