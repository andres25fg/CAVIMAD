<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class NewsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->loadModel('NewsEventsPicture');
		$this->set('pictures', $this->NewsEventsPicture->find('all'));
		// $this->News->recursive = 1;
		// $this->set('news', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		$this->loadModel('NewsEventsPicture');

		if ($this->request->is('post')) {
			//return
			//debug($this->request->data);	
			$this->News->create();
			if ($this->News->save($this->request->data)) {
				$this->request->data['NewsEventsPicture']['0']['news_id']= $this->News->id;
				//return debug($this->request->data['NewsEventsPicture']['0']);
				if($this->NewsEventsPicture->saveAll($this->request->data['NewsEventsPicture']['0'])){
					$this->Flash->success(__('The news has been saved.'));
				}
				else{
					$this->Flash->error(__('The news could not be saved. Please, try again.'));
				}
				
				
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The news could not be saved. Please, try again.'));
			}
		}
		else{
			$position = array(0 => 'Omitir comentario de imagen',1 => 'Abajo a la derecha',2 => 'Abajo a la izquierda');
			$this->set('position',$position);
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->News->save($this->request->data)) {
				$this->Flash->success(__('The news has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The news could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
			$this->request->data = $this->News->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->News->delete()) {
			$this->Flash->success(__('The news has been deleted.'));
		} else {
			$this->Flash->error(__('The news could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
