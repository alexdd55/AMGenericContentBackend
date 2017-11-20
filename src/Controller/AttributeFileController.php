<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttributeFile Controller
 *
 * @property \App\Model\Table\AttributeFileTable $AttributeFile
 *
 * @method \App\Model\Entity\AttributeFile[] paginate($object = null, array $settings = [])
 */
class AttributeFileController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ModelAttributes', 'Contents']
        ];
        $attributeFile = $this->paginate($this->AttributeFile);

        $this->set(compact('attributeFile'));
        $this->set('_serialize', ['attributeFile']);
    }

    /**
     * View method
     *
     * @param string|null $id Attribute File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attributeFile = $this->AttributeFile->get($id, [
            'contain' => ['ModelAttributes', 'Contents']
        ]);

        $this->set('attributeFile', $attributeFile);
        $this->set('_serialize', ['attributeFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attributeFile = $this->AttributeFile->newEntity();
        if ($this->request->is('post')) {
            $attributeFile = $this->AttributeFile->patchEntity($attributeFile, $this->request->data);
            if ($this->AttributeFile->save($attributeFile)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute File'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute File'));
            }
        }
        $modelAttributes = $this->AttributeFile->ModelAttributes->find('list', ['limit' => 200]);
        $contents = $this->AttributeFile->Contents->find('list', ['limit' => 200]);
        $this->set(compact('attributeFile', 'modelAttributes', 'contents'));
        $this->set('_serialize', ['attributeFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribute File id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attributeFile = $this->AttributeFile->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attributeFile = $this->AttributeFile->patchEntity($attributeFile, $this->request->data);
            if ($this->AttributeFile->save($attributeFile)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute File'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute File'));
            }
        }
        $modelAttributes = $this->AttributeFile->ModelAttributes->find('list', ['limit' => 200]);
        $contents = $this->AttributeFile->Contents->find('list', ['limit' => 200]);
        $this->set(compact('attributeFile', 'modelAttributes', 'contents'));
        $this->set('_serialize', ['attributeFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attribute File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attributeFile = $this->AttributeFile->get($id);
        if ($this->AttributeFile->delete($attributeFile)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Attribute File'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Attribute File'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
