<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttributeDate Controller
 *
 * @property \App\Model\Table\AttributeDateTable $AttributeDate
 *
 * @method \App\Model\Entity\AttributeDate[] paginate($object = null, array $settings = [])
 */
class AttributeDateController extends AppController
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
        $attributeDate = $this->paginate($this->AttributeDate);

        $this->set(compact('attributeDate'));
        $this->set('_serialize', ['attributeDate']);
    }

    /**
     * View method
     *
     * @param string|null $id Attribute Date id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attributeDate = $this->AttributeDate->get($id, [
            'contain' => ['Contents', 'ModelAttributes']
        ]);

        $this->set('attributeDate', $attributeDate);
        $this->set('_serialize', ['attributeDate']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attributeDate = $this->AttributeDate->newEntity();
        if ($this->request->is('post')) {
            $attributeDate = $this->AttributeDate->patchEntity($attributeDate, $this->request->data);
            if ($this->AttributeDate->save($attributeDate)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute Date'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute Date'));
            }
        }
        $contents = $this->AttributeDate->Contents->find('list', ['limit' => 200]);
        $modelAttributes = $this->AttributeDate->ModelAttributes->find('list', ['limit' => 200]);
        $this->set(compact('attributeDate', 'contents', 'modelAttributes'));
        $this->set('_serialize', ['attributeDate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribute Date id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attributeDate = $this->AttributeDate->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attributeDate = $this->AttributeDate->patchEntity($attributeDate, $this->request->data);
            if ($this->AttributeDate->save($attributeDate)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute Date'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute Date'));
            }
        }
        $contents = $this->AttributeDate->Contents->find('list', ['limit' => 200]);
        $modelAttributes = $this->AttributeDate->ModelAttributes->find('list', ['limit' => 200]);
        $this->set(compact('attributeDate', 'contents', 'modelAttributes'));
        $this->set('_serialize', ['attributeDate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attribute Date id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attributeDate = $this->AttributeDate->get($id);
        if ($this->AttributeDate->delete($attributeDate)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Attribute Date'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Attribute Date'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
