<?

class MenusController extends AppController {
	//public $scaffold;
	public $name = 'Menus';
	public $helpers = array('Js', 'Html', 'Session');
	
	/* START CRUD */
	public function index() {
		if (isset($this->params['requested']) && $this->params['requested'] == true) {
			$menus = $this->Menu->find('all', array(
			'order' => 'sort_order ASC'
			));
			return $menus;
		} else {
			$this->set('menus', $this->Menu->find('all'));
		}
	}
	
    public function view($id) {
    $menu = $this->Menu->findById($id);
    if($menu){
    return $this->redirect(array('controller'=>$menu['Menu']['controller'],'action'=>$menu['Menu']['action']));
	}
	
	}
	
	public function add() {
		$this->layout = 'admin';
		if (!empty($this->data)) {
			if ($this->Menu->save($this->data)) {
				$this->Session->setFlash('The menu item has been saved', 'success');
				return $this->redirect(array('action' => 'admin_index'));
			}
		}
	}
	
	
	
	public function edit($id = null) {
		$this->layout = 'admin';
		if (!$id) {
			throw new NotFoundException(__('Invalid menu'));
		}

		$menu = $this->Menu->findById($id);
		if (!$menu) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->request->is('put')) {
			$this->Menu->id = $id;
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('Your menu has been updated.'), 'success');
				return $this->redirect(array('action' => 'admin_index'));
			}
			$this->Session->setFlash(__('Unable to update your post.'));
		}

		if (!$this->request->data) {
			$this->request->data = $menu;
		}

	}
	
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Menu->delete($id)) {
				$this->Session->setFlash('The menu has been deleted.', 'success');
				return $this->redirect(array('action' => 'admin_index'));
			}
		}
	/* END CRUD */

	/* ADMIN INDEX WITH SORT */
	public function admin_index() {
	$this->layout = 'admin';
    $this->paginate = array(
        'limit' => 10,
        'order' => array('sort_order' => 'asc')
    );
    $menus = $this->paginate('Menu');
	$this->set('menus', $menus);
}
	/* ADMIN REORDER */
	public function reorder() {
		foreach ($this->data['Menu'] as $key => $value) {
			$this->Menu->id = $value;
			$this->Menu->saveField("sort_order",$key + 1);
		}
		
		$this->Session->setflash(
		'Menus successfully reordered!',
		'success'
		);
		exit();
	}
}
