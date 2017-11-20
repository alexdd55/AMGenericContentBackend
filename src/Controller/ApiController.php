<?php
/**
 * Created by PhpStorm.
 * User: alexandermarquardt
 * Date: 18.11.17
 * Time: 17:17
 */

namespace App\Controller;

use App\Model\Table\AppTable;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;


class ApiController extends AppController {

    public $return = [
        'success' => false,
        'hits' => 0,
        'pages' => 1,
        'page' => 1,
        'data' => []
    ];

    public $query = [];

    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }


    /**
     * @param Event $event
     */
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $tmp = $this->request->getQuery();
        foreach ($tmp as $k => $t) {
            if ($t != '') {
                $this->query['Content.'.$k] = $t;
            }
        }
        $tmp = $this->request->getData();
        foreach ($tmp as $k => $t) {
            if ($t != '') {
                $this->query['Content.'.$k] = $t;
            }
        }
        if (isset($this->query['limit'])) {
            $this->return['items_per_page'] = (int)$this->query['limit'];
        } else {
            $this->return['items_per_page'] = 1;
        }
        if (isset($this->query['page'])) {
            $this->return['page'] = (int)$this->query['page'];
        }
        $this->return['query'] = $this->query;
    }

    /**
     * @param Event $event
     */
    public function beforeRender(Event $event) {
        $this->RequestHandler->renderAs($this, 'json');
        $this->response->withType('application/json');
        $this->response->withEtag(hash('sha256', json_encode($this->return)));
        if (isset($this->return['data'])) {
            $this->return['success'] = true;
            $this->return['hits'] = count($this->return['data']);
        }
        $this->set('response', $this->return);
        $this->set('_serialize', true);
    }

    /**
     * @param $model
     */
    public function content($project, $model) {
        $Content = TableRegistry::get('Content');
        $this->return['data'] = $Content->findApiContent($project, $model, $this->query);
    }
}