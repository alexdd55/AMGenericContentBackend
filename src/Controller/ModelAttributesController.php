<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ModelAttributes Controller
 *
 * @property \App\Model\Table\ModelAttributesTable $ModelAttributes
 *
 * @method \App\Model\Entity\ModelAttribute[] paginate($object = null, array $settings = [])
 */
class ModelAttributesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contents', 'AttributesTables']
        ];
        $modelAttributes = $this->paginate($this->ModelAttributes);

        $this->set(compact('modelAttributes'));
        $this->set('_serialize', ['modelAttributes']);
    }

    /**
     * View method
     *
     * @param string|null $id Model Attribute id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modelAttribute = $this->ModelAttributes->get($id, [
            'contain' => ['Contents', 'AttributesTables', 'AttributeBool', 'AttributeChar', 'AttributeDate', 'AttributeDouble', 'AttributeFile', 'AttributeInt', 'AttributeText']
        ]);

        $this->set('modelAttribute', $modelAttribute);
        $this->set('_serialize', ['modelAttribute']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modelAttribute = $this->ModelAttributes->newEntity();
        if ($this->request->is('post')) {
            $modelAttribute = $this->ModelAttributes->patchEntity($modelAttribute, $this->request->data);
            if ($this->ModelAttributes->save($modelAttribute)) {
                $this->Flash->success(__('The {0} has been saved.', 'Model Attribute'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Model Attribute'));
            }
        }
        $contents = $this->ModelAttributes->Contents->find('list', ['limit' => 200]);
        $attributesTables = $this->ModelAttributes->AttributesTables->find('list', ['limit' => 200]);
        $this->set(compact('modelAttribute', 'contents', 'attributesTables'));
        $this->set('_serialize', ['modelAttribute']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Model Attribute id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modelAttribute = $this->ModelAttributes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modelAttribute = $this->ModelAttributes->patchEntity($modelAttribute, $this->request->data);
            if ($this->ModelAttributes->save($modelAttribute)) {
                $this->Flash->success(__('The {0} has been saved.', 'Model Attribute'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Model Attribute'));
            }
        }
        $contents = $this->ModelAttributes->Contents->find('list', ['limit' => 200]);
        $attributesTables = $this->ModelAttributes->AttributesTables->find('list', ['limit' => 200]);
        $this->set(compact('modelAttribute', 'contents', 'attributesTables'));
        $this->set('_serialize', ['modelAttribute']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Model Attribute id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modelAttribute = $this->ModelAttributes->get($id);
        if ($this->ModelAttributes->delete($modelAttribute)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Model Attribute'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Model Attribute'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
