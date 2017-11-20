<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttributeDouble Controller
 *
 * @property \App\Model\Table\AttributeDoubleTable $AttributeDouble
 *
 * @method \App\Model\Entity\AttributeDouble[] paginate($object = null, array $settings = [])
 */
class AttributeDoubleController extends AppController
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
        $attributeDouble = $this->paginate($this->AttributeDouble);

        $this->set(compact('attributeDouble'));
        $this->set('_serialize', ['attributeDouble']);
    }

    /**
     * View method
     *
     * @param string|null $id Attribute Double id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attributeDouble = $this->AttributeDouble->get($id, [
            'contain' => ['Contents', 'ModelAttributes']
        ]);

        $this->set('attributeDouble', $attributeDouble);
        $this->set('_serialize', ['attributeDouble']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attributeDouble = $this->AttributeDouble->newEntity();
        if ($this->request->is('post')) {
            $attributeDouble = $this->AttributeDouble->patchEntity($attributeDouble, $this->request->data);
            if ($this->AttributeDouble->save($attributeDouble)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute Double'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute Double'));
            }
        }
        $contents = $this->AttributeDouble->Contents->find('list', ['limit' => 200]);
        $modelAttributes = $this->AttributeDouble->ModelAttributes->find('list', ['limit' => 200]);
        $this->set(compact('attributeDouble', 'contents', 'modelAttributes'));
        $this->set('_serialize', ['attributeDouble']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribute Double id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attributeDouble = $this->AttributeDouble->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attributeDouble = $this->AttributeDouble->patchEntity($attributeDouble, $this->request->data);
            if ($this->AttributeDouble->save($attributeDouble)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute Double'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute Double'));
            }
        }
        $contents = $this->AttributeDouble->Contents->find('list', ['limit' => 200]);
        $modelAttributes = $this->AttributeDouble->ModelAttributes->find('list', ['limit' => 200]);
        $this->set(compact('attributeDouble', 'contents', 'modelAttributes'));
        $this->set('_serialize', ['attributeDouble']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attribute Double id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attributeDouble = $this->AttributeDouble->get($id);
        if ($this->AttributeDouble->delete($attributeDouble)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Attribute Double'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Attribute Double'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
