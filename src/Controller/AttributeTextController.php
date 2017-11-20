<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttributeText Controller
 *
 * @property \App\Model\Table\AttributeTextTable $AttributeText
 *
 * @method \App\Model\Entity\AttributeText[] paginate($object = null, array $settings = [])
 */
class AttributeTextController extends AppController
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
        $attributeText = $this->paginate($this->AttributeText);

        $this->set(compact('attributeText'));
        $this->set('_serialize', ['attributeText']);
    }

    /**
     * View method
     *
     * @param string|null $id Attribute Text id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attributeText = $this->AttributeText->get($id, [
            'contain' => ['ModelAttributes']
        ]);

        $this->set('attributeText', $attributeText);
        $this->set('_serialize', ['attributeText']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attributeText = $this->AttributeText->newEntity();
        if ($this->request->is('post')) {
            $attributeText = $this->AttributeText->patchEntity($attributeText, $this->request->data);
            if ($this->AttributeText->save($attributeText)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute Text'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute Text'));
            }
        }
        $modelAttributes = $this->AttributeText->ModelAttributes->find('list', ['limit' => 200]);
        $this->set(compact('attributeText', 'modelAttributes'));
        $this->set('_serialize', ['attributeText']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribute Text id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attributeText = $this->AttributeText->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attributeText = $this->AttributeText->patchEntity($attributeText, $this->request->data);
            if ($this->AttributeText->save($attributeText)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attribute Text'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribute Text'));
            }
        }
        $modelAttributes = $this->AttributeText->ModelAttributes->find('list', ['limit' => 200]);
        $this->set(compact('attributeText', 'modelAttributes'));
        $this->set('_serialize', ['attributeText']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attribute Text id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attributeText = $this->AttributeText->get($id);
        if ($this->AttributeText->delete($attributeText)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Attribute Text'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Attribute Text'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
