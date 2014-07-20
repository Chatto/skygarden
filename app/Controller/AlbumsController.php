<?

class AlbumsController extends AppController {
	//public $scaffold;
	public $name = 'Albums';
	public $helpers = array('Js', 'Html', 'Session');
	public function beforeFilter(){
			parent::beforeFilter();
			$productsInCart = $this->Session->read('Cart');
			$this->set('productsInCart', $productsInCart);
			$totalQuantity = 0;
			$cart = $this->Session->read('Cart');
			if($cart !== null){
				foreach($cart as $item){
							$totalQuantity = $totalQuantity + $this->Session->read('Quantity.' . $item['Product']['id']);
					}
				}
				else
				{
						$cart = array();
				}
				$amount = $totalQuantity;
				$this->set('amount', $amount);
	}
	/* START CRUD */
	public function index() {
	$this->layout = 'store';
	$this->loadModel('Cart');
	
	$categories = $this->Category->find('all');
	$this->set('categories', $categories);
	$popular = $this->Category->Product->find('all', array(
			'recursive' => -1,
			'order' => array(
				'Product.purchases' => 'ASC'
			),
			'limit' => 4
		));
		$this->set(compact('popular'));
	$latest = $this->Category->Product->find('all', array(
			'recursive' => -1,
			'order' => array(
				'Product.created' => 'DESC'
			),
			'limit' => 4
		));
		$this->set(compact('latest'));
			
	 }
	 
	 /*
	 public function view($id){
		$this->layout = 'store';
		$categories = $this->Category->find('all', array(
			'order' => 'id ASC'
			));
	$this->set('categories', $categories);
		$category = $this->Category->findById($id);
	 $this->set('category', $category);
	 }
	*/

	public function view($id = null) {
		$this->layout = 'store';
		$this->loadModel('ProductType');
		$this->set('types', $this->ProductType->find('list'));
		$categories = $this->Category->find('all');
		$this->set('categories', $categories);
		$category = $this->Category->findById($id);
		if(empty($category)) {
			return $this->redirect(array('action' => 'index'));
		}
		$this->set(compact('category'));
		$parents = $this->Category->getPath($category['Category']['id']);
		$this->set(compact('parents'));
		$directChildren = $this->Category->children($category['Category']['id']);
		$directChildrenIds = Hash::extract($directChildren, '{n}.Category.id');
		array_push($directChildrenIds, $category['Category']['id']);
		$products = $this->Category->Product->find('all', array(
			'recursive' => -1,
			'conditions' => array(
				'Product.category_id' => $directChildrenIds
			),
			'order' => array(
				'Product.name' => 'ASC'
			),
			'limit' => 50
		));
		$this->set(compact('products'));
	}
	 
	public function add() {
		 if (!empty($this->data)) {
		 $this->Category->save($this->data);
		 $this->redirect(array('action'=>'index'));
		 } else {
		 $parents[0] = "[ No Parent ]";
		 $Categorylist = $this->Category->generatetreelist(null,null,null," - ");
		 if($Categorylist){
		 foreach ($Categorylist as $key=>$value){
		 $parents[$key] = $value;
		 }
		 $this->set(compact('parents'));
		 }
		 }
	 }
 
	function edit($id=null) {
	 if (!empty($this->data)) {
	 if($this->Category->save($this->data)==false)
	 $this->Session->setFlash('Error saving Category.');
	 $this->redirect(array('action'=>'index'));
	 } else {
	 if($id==null) die("No ID received");
	 $this->data = $this->Category->read(null, $id);
	 $parents[0] = "[ No Parent ]";
	 $Categorylist = $this->Category->generatetreelist(null,null,null," - ");
	 if($Categorylist)
	 foreach ($Categorylist as $key=>$value)
	 $parents[$key] = $value;
	 $this->set(compact('parents'));
	 }
	 }
 
	function delete($id=null) {
	 if($id==null)
	 die("No ID received");
	 $this->Category->id=$id;
	 if($this->Category->delete()==false)
		$this->Session->setFlash('The Category could not be deleted.');
	 $this->redirect(array('action'=>'index'));
	 }
	 
 


	/* END CRUD */


	/* ADMIN INDEX WITH SORT */
	public function admin_index() {
		$this->loadModel('Track');
		$this->loadModel('Product');
		
		$this->layout = 'admin';
		$this->paginate = array(
			'limit' => 10,
			'order' => array('id' => 'asc')
		);
		$albums = $this->paginate('Album');
		$this->set('albums', $albums);
	}
	
	/* ADMIN REORDER */
	public function reorder() {
		foreach ($this->data['Albim'] as $key => $value) {
			$this->Album->id = $value;
			$this->Album->saveField("sort_id",$key + 1);
		}
		
		$this->Session->setflash(
		'Albums successfully reordered!',
		'success'
		);
		exit();
	}
}
?>
