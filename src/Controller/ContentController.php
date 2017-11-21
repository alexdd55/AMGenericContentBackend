<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
    public function index($project, $model) {
        $model_id = $this->Content->Models->getIdByName($model);
        $project_id = $this->Content->Projects->getIdByName($project);
        $this->paginate = [
            'contain' => [
                'Projects',
                'Models'
            ]
        ];
        $mycontent = $this->Content->find()
            ->where([
                'Content.model_id' => $model_id,
                'Content.project_id' => $project_id
            ]);

        $content = $this->paginate($mycontent);

        $this->set(compact('content', 'project', 'model'));
        $this->set('_serialize', ['content']);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($project, $model) {
        $model_id = $this->Content->Models->getIdByName($model);
        $project_id = $this->Content->Projects->getIdByName($project);
        $content = $this->Content->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $content = $this->Content->patchEntity($content, $data);
            if ($this->Content->save($content)) {


                $attributes = $this->Content->ModelAttributes->find()
                    ->where([
                        'ModelAttributes.model_id' => $content->model_id
                    ])
                    ->contain($this->Content->ModelAttributes->containAttributesWithContentId($content->id))
                    ->orderAsc('sort')
                    ->toArray();

                $attributes = $this->Content->createEasyKeyValueStructureForElement($attributes, $content->id);
                foreach ($attributes as $attr) {
                    $newdata = [];
                    $newdata['model_attribute_id'] = $attr['attribute_values']['id'];
                    $newdata['content_id'] = $content->id;
                    $myTable = TableRegistry::get($attr['attribute_values']['table']);
                    $entity = $myTable->newEntity($newdata);

                    if ($myTable->save($entity)) {

                    }

                }

                $this->Flash->success(__('The {0} has been saved.', 'Content'));
                return $this->redirect([
                    'action' => 'edit',
                    $project,
                    $model,
                    $content->id
                ]);

            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Content'));
            }
        }
        $this->set(compact('content', 'model_id', 'project_id', 'project', 'model'));
        $this->set('_serialize', ['content']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Content id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($project, $model, $id = null) {
        $model_id = $this->Content->Models->getIdByName($model);
        $project_id = $this->Content->Projects->getIdByName($project);
        $content = $this->Content->get($id, [
            'contain' => []
        ]);
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $data = $this->request->getData();

            $content = $this->Content->patchEntity($content, $data);
            if ($this->Content->save($content)) {

                foreach ($data['attributes'] as $key => $val) {
                    foreach ($val as $k => $v) {
                        $entity = $this->Content->ModelAttributes->{$key}->get($k);
                        $entity = $this->Content->ModelAttributes->{$key}->patchEntity($entity, ['value' => $v['value']]);
                        if ($this->Content->ModelAttributes->{$key}->save($entity)) {

                        }
                    }
                }

                $this->Flash->success(__('The {0} has been saved.', 'Content'));

                return $this->redirect([
                    'action' => 'index',
                    $project,
                    $model
                ]);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Content'));
            }
        }

        $attributes = $this->Content->ModelAttributes->find()
            ->where([
                'ModelAttributes.model_id' => $content->model_id
            ])
            ->contain($this->Content->ModelAttributes->containAttributesWithContentId($id))
            ->orderAsc('sort')
            ->toArray();

        $attributes = $this->Content->createEasyKeyValueStructureForElement($attributes, $id);

        $this->set(compact('content', 'project', 'model', 'project_id', 'model_id', 'attributes'));
        $this->set('_serialize', ['content']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Content id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public
    function delete($id = null) {
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
