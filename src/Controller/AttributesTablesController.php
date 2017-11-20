<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttributesTables Controller
 *
 * @property \App\Model\Table\AttributesTablesTable $AttributesTables
 *
 * @method \App\Model\Entity\AttributesTable[] paginate($object = null, array $settings = [])
 */
class AttributesTablesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $attributesTables = $this->paginate($this->AttributesTables);

        $this->set(compact('attributesTables'));
        $this->set('_serialize', ['attributesTables']);
    }

    /**
     * View method
     *
     * @param string|null $id Attributes Table id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attributesTable = $this->AttributesTables->get($id, [
            'contain' => ['ModelAttributes']
        ]);

        $this->set('attributesTable', $attributesTable);
        $this->set('_serialize', ['attributesTable']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attributesTable = $this->AttributesTables->newEntity();
        if ($this->request->is('post')) {
            $attributesTable = $this->AttributesTables->patchEntity($attributesTable, $this->request->data);
            if ($this->AttributesTables->save($attributesTable)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attributes Table'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attributes Table'));
            }
        }
        $this->set(compact('attributesTable'));
        $this->set('_serialize', ['attributesTable']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attributes Table id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attributesTable = $this->AttributesTables->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attributesTable = $this->AttributesTables->patchEntity($attributesTable, $this->request->data);
            if ($this->AttributesTables->save($attributesTable)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attributes Table'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attributes Table'));
            }
        }
        $this->set(compact('attributesTable'));
        $this->set('_serialize', ['attributesTable']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attributes Table id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attributesTable = $this->AttributesTables->get($id);
        if ($this->AttributesTables->delete($attributesTable)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Attributes Table'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Attributes Table'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
