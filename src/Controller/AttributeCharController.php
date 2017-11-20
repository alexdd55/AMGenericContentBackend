<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttributeChar Controller
 *
 * @property \App\Model\Table\AttributeCharTable $AttributeChar
 *
 * @method \App\Model\Entity\AttributeChar[] paginate($object = null, array $settings = [])
 */
class AttributeCharController extends AppController
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
        $attributeChar = $this->paginate($this->AttributeChar);

        $this->set(compact('attributeChar'));
        $this->set('_serialize', ['attributeChar']);
    }

    /**
     * View method
     *
     * @param string|null $id Attribute Char id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attributeChar = $this->AttributeChar->get($id, [
            'contain' => ['ModelAttributes']
        ]);

        $this->set('attributeChar', $attributeChar);
        $this->set('_serialize', ['attributeChar']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attributeChar = $this->AttributeChar->newEntity();
        if ($this->request->is('post')) {
            $attributeChar = $this->AttributeChar->patchEntity($attributeChar, $this->request->data);
            if ($this->AttributeChar->save($attributeChar)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute Char'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute Char'));
            }
        }
        $modelAttributes = $this->AttributeChar->ModelAttributes->find('list', ['limit' => 200]);
        $this->set(compact('attributeChar', 'modelAttributes'));
        $this->set('_serialize', ['attributeChar']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribute Char id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attributeChar = $this->AttributeChar->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attributeChar = $this->AttributeChar->patchEntity($attributeChar, $this->request->data);
            if ($this->AttributeChar->save($attributeChar)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute Char'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute Char'));
            }
        }
        $modelAttributes = $this->AttributeChar->ModelAttributes->find('list', ['limit' => 200]);
        $this->set(compact('attributeChar', 'modelAttributes'));
        $this->set('_serialize', ['attributeChar']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attribute Char id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attributeChar = $this->AttributeChar->get($id);
        if ($this->AttributeChar->delete($attributeChar)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Attribute Char'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Attribute Char'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
