<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttributeInt Controller
 *
 * @property \App\Model\Table\AttributeIntTable $AttributeInt
 *
 * @method \App\Model\Entity\AttributeInt[] paginate($object = null, array $settings = [])
 */
class AttributeIntController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ModelAttributes']
        ];
        $attributeInt = $this->paginate($this->AttributeInt);

        $this->set(compact('attributeInt'));
        $this->set('_serialize', ['attributeInt']);
    }

    /**
     * View method
     *
     * @param string|null $id Attribute Int id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attributeInt = $this->AttributeInt->get($id, [
            'contain' => ['ModelAttributes']
        ]);

        $this->set('attributeInt', $attributeInt);
        $this->set('_serialize', ['attributeInt']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attributeInt = $this->AttributeInt->newEntity();
        if ($this->request->is('post')) {
            $attributeInt = $this->AttributeInt->patchEntity($attributeInt, $this->request->data);
            if ($this->AttributeInt->save($attributeInt)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute Int'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute Int'));
            }
        }
        $modelAttributes = $this->AttributeInt->ModelAttributes->find('list', ['limit' => 200]);
        $this->set(compact('attributeInt', 'modelAttributes'));
        $this->set('_serialize', ['attributeInt']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribute Int id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attributeInt = $this->AttributeInt->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attributeInt = $this->AttributeInt->patchEntity($attributeInt, $this->request->data);
            if ($this->AttributeInt->save($attributeInt)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute Int'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute Int'));
            }
        }
        $modelAttributes = $this->AttributeInt->ModelAttributes->find('list', ['limit' => 200]);
        $this->set(compact('attributeInt', 'modelAttributes'));
        $this->set('_serialize', ['attributeInt']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attribute Int id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attributeInt = $this->AttributeInt->get($id);
        if ($this->AttributeInt->delete($attributeInt)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Attribute Int'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Attribute Int'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
