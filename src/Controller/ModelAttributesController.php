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
class ModelAttributesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => [
                'Models' => [
                    'Projects'
                ],
                'AttributesTables'
            ]
        ];
        $modelAttributes = $this->paginate($this->ModelAttributes);

        $this->set(compact('modelAttributes'));
        $this->set('_serialize', ['modelAttributes']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $modelAttribute = $this->ModelAttributes->newEntity();
        if ($this->request->is('post')) {
            $modelAttribute = $this->ModelAttributes->patchEntity($modelAttribute, $this->request->getData());
            if ($this->ModelAttributes->save($modelAttribute)) {
                $this->Flash->success(__('The model attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The model attribute could not be saved. Please, try again.'));
        }
        $models = $this->ModelAttributes->Models->find('list', ['limit' => 200]);
        $attributesTables = $this->ModelAttributes->AttributesTables->find('list', ['limit' => 200]);
        $this->set(compact('modelAttribute', 'models', 'attributesTables'));
        $this->set('_serialize', ['modelAttribute']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Model Attribute id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $modelAttribute = $this->ModelAttributes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $modelAttribute = $this->ModelAttributes->patchEntity($modelAttribute, $this->request->getData());
            if ($this->ModelAttributes->save($modelAttribute)) {
                $this->Flash->success(__('The model attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The model attribute could not be saved. Please, try again.'));
        }
        $models = $this->ModelAttributes->Models->find('list', ['limit' => 200]);
        $attributesTables = $this->ModelAttributes->AttributesTables->find('list', ['limit' => 200]);
        $this->set(compact('modelAttribute', 'models', 'attributesTables'));
        $this->set('_serialize', ['modelAttribute']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Model Attribute id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $modelAttribute = $this->ModelAttributes->get($id);
        if ($this->ModelAttributes->delete($modelAttribute)) {
            $this->Flash->success(__('The model attribute has been deleted.'));
        } else {
            $this->Flash->error(__('The model attribute could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
