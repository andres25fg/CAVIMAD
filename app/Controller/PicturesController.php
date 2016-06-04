<?php
App::uses('AppController', 'Controller');
/**
 * Pictures Controller
 *
 * @property Picture $Picture
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PicturesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function beforeFilter() {
        parent::beforeFilter();
        //Métodos a los cuales se permite llamar
        $this->Auth->allow('logout', 'login', 'view');
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$fotosGenero = $this->Picture->find('all', array('conditions' => array('Picture.genre_id' => $id)));
		if (empty($fotosGenero)) {
			throw new NotFoundException(__('Taxón no válido'));
		}
		$this->set('pictures', $fotosGenero);
		$this->set('id', $id);
		
	}

	public function debugController($id) {
			$this->request->data = $id;
	}
	
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) { 
		 //debug($this->request->data);
		 //debug($this->request->data['Picture']['genre_id']);
			
			$this->loadModel('Category');
			$this->loadModel('Gender');
			
			$categoryId = $this->Gender->find('first', array('conditions' => array('Gender.id' => $this->request->data['Picture']['genre_id'])));
			$phylo = null;
			$subphylo = null;
			$class = null;
			$subclass = null;
			$order = null;
			$suborder = null;
			$family = null;
			$subfamily = null;
			$genre = null;
			$subgenre = null;
			
			$parents = $this->Category->getPath($categoryId['Gender']['category_id']);
			 
			 //debug($parents['1']);
			 //debug($parents);
			// $i=0;
			// debug($parents[$i]['Category']['id']);

			for($i=0 ;$parents[$i]['Category']['id'] !=  $categoryId['Gender']['category_id']; $i++){
				$clasificacion = $parents[$i]['Category']['classification'];
				switch ($clasificacion) {
				    case "Filo":
				    	$phylo = $parents[$i]['Category']['id'];
				        break;
				    case "Subfilo":
				        $subphylo=$parents[$i]['Category']['id'];
				        break;
				    case "Clase":
				        $class=$parents[$i]['Category']['id'];
				        break;
				    case "Subclase":
				        $subclass=$parents[$i]['Category']['id'];
				        break;
				    case "Orden":
				        $order=$parents[$i]['Category']['id'];
				        break;  
				    case "Suborden":
				        $suborder = $parents[$i]['Category']['id'];
				        break;
				    case "Familia":
				        $family = $parents[$i]['Category']['id'];
				        break;
				    case "Subfamilia":
				        $subfamily = $parents[$i]['Category']['id'];
				        break;
				    case "Genero":
				        $genre = $parents[$i]['Category']['id'];
				        break;
				    case "Subgenero":
				        $subgenre = $parents[$i]['Category']['id'];
				        break;
				    default:
				        // no haga nada
				} //Cierra switch
			} //Cierra for
			$this->request->data['Picture']['phylo_id']=$phylo;
			$this->request->data['Picture']['subphylo_id']=$subphylo;
			$this->request->data['Picture']['class_id']=$class;
			$this->request->data['Picture']['subclass_id']=$subclass;
			$this->request->data['Picture']['order_id'] = $order;
			$this->request->data['Picture']['suborder_id'] = $suborder;
			$this->request->data['Picture']['family_id'] = $family;
			$this->request->data['Picture']['subfamily_id'] = $subfamily;
			//$this->request->data['Picture']['genre_id'] = $categoryId['Gender']['category_id'];
			$this->request->data['Picture']['subgenre_id'] = $subgenre;
			

			 //debug($this->request->data);

			$this->Picture->create();
			if ($this->Picture->save($this->request->data)) {
				
				$this->Flash->success(__('The picture has been saved.'));
				
				return $this->redirect(array('action' => 'view',$this->request->data['Picture']['genre_id']));
			} else {
				$this->Flash->error(__('The picture could not be saved. Please, try again.'));
			}
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
		$this->Picture->id = $id;
		if (!$this->Picture->exists()) {
			throw new NotFoundException(__('Invalid picture'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Picture->delete()) {
			$this->Flash->success(__('The picture has been deleted.'));
		} else {
			$this->Flash->error(__('The picture could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
