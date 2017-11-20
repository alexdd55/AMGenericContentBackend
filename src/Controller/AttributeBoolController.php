<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttributeBool Controller
 *
 * @property \App\Model\Table\AttributeBoolTable $AttributeBool
 *
 * @method \App\Model\Entity\AttributeBool[] paginate($object = null, array $settings = [])
 */
class AttributeBoolController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contents', 'ModelAttributes']
        ];
        $attributeBool = $this->paginate($this->AttributeBool);

        $this->set(compact('attributeBool'));
        $this->set('_serialize', ['attributeBool']);
    }

    /**
     * View method
     *
     * @param string|null $id Attribute Bool id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attributeBool = $this->AttributeBool->get($id, [
            'contain' => ['Contents', 'ModelAttributes']
        ]);

        $this->set('attributeBool', $attributeBool);
        $this->set('_serialize', ['attributeBool']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attributeBool = $this->AttributeBool->newEntity();
        if ($this->request->is('post')) {
            $attributeBool = $this->AttributeBool->patchEntity($attributeBool, $this->request->data);
            if ($this->AttributeBool->save($attributeBool)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute Bool'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute Bool'));
            }
        }
        $contents = $this->AttributeBool->Contents->find('list', ['limit' => 200]);
        $modelAttributes = $this->AttributeBool->ModelAttributes->find('list', ['limit' => 200]);
        $this->set(compact('attributeBool', 'contents', 'modelAttributes'));
        $this->set('_serialize', ['attributeBool']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribute Bool id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attributeBool = $this->AttributeBool->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attributeBool = $this->AttributeBool->patchEntity($attributeBool, $this->request->data);
            if ($this->AttributeBool->save($attributeBool)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute Bool'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute Bool'));
            }
        }
        $contents = $this->AttributeBool->Contents->find('list', ['limit' => 200]);
        $modelAttributes = $this->AttributeBool->ModelAttributes->find('list', ['limit' => 200]);
        $this->set(compact('attributeBool', 'contents', 'modelAttributes'));
        $this->set('_serialize', ['attributeBool']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attribute Bool id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attributeBool = $this->AttributeBool->get($id);
        if ($this->AttributeBool->delete($attributeBool)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Attribute Bool'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Attribute Bool'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
