<?php 
App::uses('AppController', 'Controller');
class DownloadsController extends AppController{
/**
 * Downloads Controller
 * 
 * Este controllador contiene los metodos y componentes que se utilizaran en todos los controllers hijos.
 * Es un controlador donde se manejan las fuciones de los documentos cargados en la página web.
 *
 * @property Download $Download
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
  public $helpers=array('Html','Form');
  public $components = array('Paginator', 'Flash', 'Session');

/**
	 * beforeFilter method
	 * 
	 * Contiene los métodos a los cuales se permite llamar sin tener una sesión de usuario activa o sin los privilegios requeridos.
	 * 
	 * @param void
	 * @return void
	 */	
    public function beforeFilter() {
        parent::beforeFilter();
        //Métodos a los cuales se permite llamar
        $this->Auth->allow('index','logout', 'login', 'index_bio');
    }

/**
 * index method
 * 
 * Este método permite visualizar todos los documentos que contiene la página web desde la vista Documentos.
 *
 * 
 * @return void
 * @param void
 */
  /*function to display all files details*/
  public function index() {
      //Carga los datos desde la base da datos 
     $docs=$this->Download->find('all', array('conditions'=>array('Download.classification'=>!'Biomonitoreo')));
     $this->set('Downloads', $docs);
        }
  
  /**
 * index_bio method
 * 
 * Este método permite visualizar todos los documentos que contiene la página web desde la vista Biomonitoreo.
 *
 * 
 * @return void
 * @param void
 */
  public function index_bio() {
      //Carga los datos desde la base da datos 
      $this->loadModel('Link');
      $bio=$this->Download->find('all', array('conditions'=>array('Download.classification'=>'Biomonitoreo')));
      $link=$this->Link->find('all', array('conditions'=>array('Link.relatedpage'=>'Biomonitoreo')));
      $links=[];
      for($i=0; $i<count($link); $i++){
          array_push($links, $link[$i]['Link']);
      }
      $this->set('Enlace', $links);
      $this->set('Biomonitoreo', $bio);
      
        }
  
  
 /**
 * add method
 * 
 * Función que agregar un nuevo archivo a las base de datos para que sea descargable desde la aplicación web desde la vista Documentos.
 * 
 * @param void
 * @return void
 */
     public function add() {
      //Carga el modelo de Category
          if($this->Session->read('Auth')['User']['role'] == 'Administrador' || $this->Session->read('Auth')['User']['role'] == 'Colaborador') {
            $this->loadModel('User');
          	$this->loadModel('Administrator');
          	$adm_id=$this->Administrator->find('first',array('conditions' => array('Administrator.user_id'=>$this->Session->read('Auth')['User']['id'])));
    		//return debug($adm_id);
            if ($this->request->is('post')) {
                 //return debug($this->request->data);
                $this->Download->create();
                //Revisa si el archivo ya fue creado, elimina los datos que hay para despues volverlo a crear
            if(empty($this->data['Download']['report']['name'])){
                unset($this->request->data['Download']['report']);
            }
            //Revisa si el archivo exite y lo crea
            if(!empty($this->data['Download']['report']['name'])){
               
               $data =array('Download'=>array('title'=>$this->request->data['Download']['title'],
                                              'description'=>$this->request->data['Download']['description'],
                                              'abstract'=>$this->request->data['Download']['abstract'], 
                                              'report'=>$this->request->data['Download']['report'], 
                                              'administrator_id'=> $adm_id['Administrator']['id'],
                                              'name'=>$this->request->data['Download']['report']['name']));
                
    
                    $file=$this->request->data['Download']['report'];
                    $file['name']=$this->sanitize($file['name']);
                    $data['Download']['report'] = time().$file['name'];
                if($this->Download->save($data)) {
                    //Guarda el archivo en la ruta indicada
                    move_uploaded_file($file['tmp_name'], APP . 'webroot/files/download' .DS. $data['Download']['report']); 
                    $this->Flash->success(__('El documento se guardo correctamente.'));
                    return $this->redirect(array('controller'=>'downloads','action' => 'index'));
                
                 }
             }else{
                $this->Flash->error(__('El documento no se pudo guardar. Intentelo nuevamente.'));
             }
                
            }
        } else {
            $this->Flash->error(__('No puede acceder a esta sección.'));
            return $this->redirect(array('controller'=>'pages','action' => 'display'));
        }
     }
     
 /**
 * addbio method
 * 
 * Función que agregar un nuevo archivo a las base de datos para que sea descargable desde la aplicación web desde la vista Biomonitoreo.
 *
 * @param void
 * @return void
 */    
      public function add_bio() {
      //Carga el modelo de Category
          if($this->Session->read('Auth')['User']['role'] == 'Administrador' || $this->Session->read('Auth')['User']['role'] == 'Colaborador') {
            $this->loadModel('User');
          	$this->loadModel('Administrator');
          	$adm_id=$this->Administrator->find('first',array('conditions' => array('Administrator.user_id'=>$this->Session->read('Auth')['User']['id'])));
    		//return debug($adm_id);
            if ($this->request->is('post')) {
                    $bio='Biomonitoreo';
                 //return debug($this->request->data);
                $this->Download->create();
                //Revisa si el archivo ya fue creado, elimina los datos que hay para despues volverlo a crear
            if(empty($this->data['Download']['report']['name'])){
                unset($this->request->data['Download']['report']);
            }
            //Revisa si el archivo exite y lo crea
            if(!empty($this->data['Download']['report']['name'])){
               
               
               $data =array('Download'=>array('title'=>$this->request->data['Download']['title'],
                                              'description'=>$this->request->data['Download']['description'],
                                              'abstract'=>$this->request->data['Download']['abstract'], 
                                              'report'=>$this->request->data['Download']['report'], 
                                              'administrator_id'=> $this->Session->read('Auth')['User']['id'],
                                              'classification'=>$bio,
                                              'name'=>$this->request->data['Download']['report']['name']));
                //return debug($this->request->data);
    
                  $file=$this->request->data['Download']['report'];
                    $file['name']=$this->sanitize($file['name']);
                    $data['Download']['report'] = time().$file['name'];
    
                if($this->Download->save($data)) {
                    //Guarda el archivo en la ruta indicada
                    move_uploaded_file($file['tmp_name'], APP . 'webroot/files/download' .DS. $data['Download']['report']); 
                    $this->Flash->success(__('El documento se guardo correctamente.'));
                    return $this->redirect(array('controller'=>'downloads','action' => 'index_bio'));
                
                 }
             }else{
                 // de no poder ser guardados los datos notifica al usuario
                $this->Flash->error(__('El documento no se pudo guardar. Intentelo nuevamente.'));
            }
                
            }
          } else {
                $this->Flash->error(__('No puede acceder a esta sección.'));
                return $this->redirect(array('controller'=>'pages','action' => 'display'));
          }
          
     }
     
     
     
     
 
    /**
    * sanitize method
    * 
    *
    * Restringe el acceso al documento y estandariza los caracteres especiales del documento. 
    * 
    * @throws NotFoundException
    * @param string $string
    * @param string $force_lowercase
    * @param string $anal
    * @return void
    */
    
    function sanitize($string, $force_lowercase = true, $anal = false) {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]","}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;","â€”", "â€“", ",", "<",">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }
    
    /**
     * view method
     *
     * Función que permite ver todos los documentos disponibles para descargar en la aplicación web desde la vista Documentos
     * 
     * @throws NotFoundException
     * @param string $id
     * @param string $download
     * @return void
     */
    public function viewdown($id=null,$download=false) {
     if($download){
      $download=true;
     }
      $files=$this->Download->findById($id);
      $filename=$files['Download']['report'];
      $name=explode('.',$filename);
      $this->viewClass = 'Media';
     
      // path will be app/outsidefiles/yourfilename.pdf
      $params = array(
            'id'        => $filename,
            'name'      => $name[0],
            'download'  => $download,
            'extension' => 'pdf',
            'path'      => APP . 'webroot/files/download' . DS
        );
        
     $this->set($params);
    }
    
    
        
/**
 * edit method
 * 
 * Función que permite editar documentos disponibles para descargar en la aplicación web desde la vista Documentos.
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function edit($id = null) {
    // si no existe la descarga retorna error
		if (!$this->Download->exists($id)) {
			throw new NotFoundException(__('Invalid download'));
		}
		// edita todos los campos de descarga
		if ($this->request->is(array('post', 'put'))) {
		   // return debug($this->request->data);
           $data =array('Download'=>array('id'=>$id,
               'title'=>$this->request->data['Download']['title'],
                                          'description'=>$this->request->data['Download']['description'],
                                          'abstract'=>$this->request->data['Download']['abstract'],
                                          'name'=>$this->request->data['Download']['report']['name'],
                                          'report'=>$this->request->data['Download']['report']
                                          ));
            $file=$this->data['Download']['report'];
            $file['name']=$this->sanitize($file['name']);
            $data['Download']['report']=time().$file['name'];
			// si los datos se guardaron correctamente notifica al usuario
			if ($this->Download->save($data)) {
			    move_uploaded_file($file['tmp_name'], APP . 'webroot/files/download' .DS. $data['Download']['report']); 
				$this->Flash->success(__('El documento se guardo correctamente.'));
				return $this->redirect(array('action' => 'index'));
			    //Si los datos no pudieron ser guardados notifica al usuario
			} else {
				 $this->Flash->error(__('El documento no se pudo guardar. Intentelo nuevamente.'));
			}
		} else {
		    
			$options = array('conditions' => array('Download.' . $this->Download->primaryKey => $id));
			$this->request->data = $this->Download->find('first', $options);
		}
	}
	
/**
 * edit_bio method
 * 
 * Función que permite ver todos los documentos disponibles para descargar en la aplicación web desde la vista Biomonitoreo.
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit_bio($id = null) {
	    // si no existe la descarga retorna error
		if (!$this->Download->exists($id)) {
			throw new NotFoundException(__('Invalid download'));
		}
		// edita todos los campos de descarga
		if ($this->request->is(array('post', 'put'))) {
		     $bio='Biomonitoreo';
           $data =array('Download'=>array('id'=>$id,
               'title'=>$this->request->data['Download']['title'],
                                          'description'=>$this->request->data['Download']['description'],
                                          'abstract'=>$this->request->data['Download']['abstract'],
                                          'name'=>$this->request->data['Download']['report']['name'],
                                          'classification'=>$bio,
                                          'report'=>$this->request->data['Download']['report']
                                          ));
            $file=$this->data['Download']['report'];
            $file['name']=$this->sanitize($file['name']);
            $data['Download']['report']=time().$file['name'];
			if ($this->Download->save($data)) {
                //Si los datos se guardaron  notifica al usuario
			    move_uploaded_file($file['tmp_name'], APP . 'webroot/files/download' .DS. $data['Download']['report']); 
				$this->Flash->success(__('El documento se guardo correctamente.'));
				return $this->redirect(array('action' => 'index_bio'));
			} else {
				 $this->Flash->error(__('El documento no se pudo guardar. Intentelo nuevamente.'));
			}
			//Si los datos no pudieron ser guardados notifica al usuario
		} else {
			$options = array('conditions' => array('Download.' . $this->Download->primaryKey => $id));
			$this->request->data = $this->Download->find('first', $options);
		}
	}
	
 /**
 * edit_doc method
 * 
 * Función que permite ver todos los documentos disponibles para descargar en la aplicación web desde la vista Documentos
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
		public function edit_doc($id = null) {
		      // si no existe la descarga retorna error
		if (!$this->Download->exists($id)) {
			throw new NotFoundException(__('Invalid download'));
		}
		// edita todos los campos de descarga
		if ($this->request->is(array('post', 'put'))) {
		     $bio='Biomonitoreo';
           $data =array('Download'=>array('id'=>$id,
               'title'=>$this->request->data['Download']['title'],
                                          'description'=>$this->request->data['Download']['description'],
                                          'name'=>$this->request->data['Download']['report']['name'],
                                          'report'=>$this->request->data['Download']['report']
                                          ));
            $file=$this->data['Download']['report'];
            $file['name']=$this->sanitize($file['name']);
            $data['Download']['report']=time().$file['name'];
            $all=$this->Download->find('first', array('conditions'=>array('Download.id'=>$id)));
            $cat=$all['Download']['category_id'];
			if ($this->Download->save($data)) {
                //Si los datos se guardaron  notifica al usuario
			    move_uploaded_file($file['tmp_name'], APP . 'webroot/files/download' .DS. $data['Download']['report']); 
				$this->Flash->success(__('El documento se guardo correctamente.'));
				return $this->redirect(array('controller'=>'categories','action' => 'edit'.'/'.$cat));
			} else {
			   //Si los datos no pudieron ser guardados notifica al usuario
				 $this->Flash->error(__('El documento no se pudo guardar. Intentelo nuevamente.'));
			}
		} else {
			$options = array('conditions' => array('Download.' . $this->Download->primaryKey => $id));
			$this->request->data = $this->Download->find('first', $options);
		}
	}
	
	
	
//}
/**
 * delete method
 * 
 * Función que permite eliminar los documentos de la aplicación web desde la vista Documentos.
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Download->id = $id;
		  // si no existe la descarga retorna error
		if (!$this->Download->exists()) {
			throw new NotFoundException(__('Invalid download'));
		}
		$this->request->allowMethod('post', 'delete');
		//Si los datos se eliminaron  notifica al usuario
		if ($this->Download->delete()) {
			$this->Flash->success(__('El documento se elimino correctamente.'));
			//Si los datos no pudieron ser eliminados notifica al usuario
		} else {
			$this->Flash->error(__('El documento no se pudo eliminar. Intentelo de nuevo'));
		}
		return $this->redirect(array('action' => 'index'));
	}
    
 
} 
?>