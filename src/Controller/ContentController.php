<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Content Controller
 *
 * @property \App\Model\Table\ContentTable $Content
 *
 * @method \App\Model\Entity\Content[] paginate($object = null, array $settings = [])
 */
class ContentController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => [
                'Projects',
                'Models'
            ]
        ];
        $content = $this->paginate($this->Content);

        $this->set(compact('content'));
        $this->set('_serialize', ['content']);
    }

    /**
     * View method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $content = $this->Content->get($id, [
            'contain' => [
                'Projects',
                'Models',
                'AttributeBool',
                'AttributeDate',
                'AttributeDouble',
                'AttributeFile',
                'ModelAttributes'
            ]
        ]);

        $this->set('content', $content);
        $this->set('_serialize', ['content']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $content = $this->Content->newEntity();
        if ($this->request->is('post')) {
            $content = $this->Content->patchEntity($content, $this->request->data);
            if ($this->Content->save($content)) {
                $this->Flash->success(__('The {0} has been saved.', 'Content'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Content'));
            }
        }
        $projects = $this->Content->Projects->find('list', ['limit' => 200]);
        $models = $this->Content->Models->find('list', ['limit' => 200]);
        $this->set(compact('content', 'projects', 'models'));
        $this->set('_serialize', ['content']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Content id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $content = $this->Content->get($id, [
            'contain' => []
        ]);
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $content = $this->Content->patchEntity($content, $this->request->data);
            if ($this->Content->save($content)) {
                $this->Flash->success(__('The {0} has been saved.', 'Content'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Content'));
            }
        }
        $projects = $this->Content->Projects->find('list', ['limit' => 200]);
        $models = $this->Content->Models->find('list', ['limit' => 200]);


        $attributes = $this->Content->ModelAttributes->find()
            ->where([
                'ModelAttributes.model_id' => $content->model_id
            ])
            ->contain($this->Content->ModelAttributes->containAttributesWithContentId($id))
            ->orderAsc('sort')
            ->toArray();

        $attributes = $this->Content->createEasyKeyValueStructureForElement($attributes, $id);

        $this->set(compact('content', 'projects', 'models', 'attributes'));
        $this->set('_serialize', ['content']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Content id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $content = $this->Content->get($id);
        if ($this->Content->delete($content)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Content'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Content'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
