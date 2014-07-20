<?php
class ProductsController extends AppController {
	public $name = 'Products';
	public $helpers = array('Html','Form','Number', 'Session');

	public function beforeFilter() {
			parent::beforeFilter();
			
			$this->Auth->authenticate = array(
				'Basic' => array(
                'userModel'=>'User'));
			$this->Auth->allow(array('search', 'index', 'view', 'latest','clear_cart', 'add_to_cart', 'cart_update', 'remove_item'));
		}
    
	public function admin_index()
{
	$this->layout = 'admin';
	$this->paginate = array(
		'limit' => 10,
		'order' => array('id' => 'asc')
	);
	$this->loadModel('Category');
	$this->set('categories', $this->Category->find('list'));
	$this->loadModel('ProductType');
	$this->set('types', $this->ProductType->find('list'));
	$products = $this->paginate('Product');
	$this->set('products', $products);
}

	/* START CRUD */
	public function index() {
	$this->layout = 'store';
	$this->loadModel('Category');
	$categories = $this->Category->find('all');
	$this->set('categories', $categories);
	$totalQuantity = 0;
	$cart = $this->Session->read('Cart');
	$this->set('cart', $cart);
	if(!($cart == null)){
			foreach($cart as $item)
			{
				
				
					$totalQuantity = $totalQuantity + $this->Session->read('Quantity.' . $item['Product']['id']);
				
			}
	}
		$amount = $totalQuantity;
		$this->set('amount', $amount);

	
	}
	
    public function view($id) {
		$this->layout = 'store';
		$this->loadModel('ProductType');
		$this->loadModel('Category');
		$categories = $this->Category->find('all');
		$this->set('categories', $categories);
		$this->set('types', $this->ProductType->find('list'));
		$product = $this->Product->findById($id);
			if($product){
			$this->set('product', $product);
			}
		$totalQuantity = 0;
		$cart = $this->Session->read('Cart');
		$this->set('cart', $cart);
		if(!($cart == null)){
			foreach($cart as $item)
			{
				
				
					$totalQuantity = $totalQuantity + $this->Session->read('Quantity.' . $item['Product']['id']);
				
			}
		}
		$amount = $totalQuantity;
		$this->set('amount', $amount);
	}

	public function upload($tmp, $file, $folder){
		$url = 'files' . DS . $folder . DS . urlencode($file);
		move_uploaded_file($tmp,  WWW_ROOT . $url);
		return $url;
		
	}
	public function add() {
		$this->layout = 'admin';
		$this->loadModel('Category');
		$this->set('categories', $this->Category->find('list'));
		$this->loadModel('ProductType');
		$this->set('types', $this->ProductType->find('list'));
		
		if (!empty($this->data)) {
			
			if ($this->request->is('post')) {
				if($this->request->data['Product']['preview']['name'])
				{
					Debugger::dump($this->data['Product']['preview']['tmp_name']);
					Debugger::dump($this->data['Product']['preview']['name']);
					$this->request->data['Product']['preview'] = $this->upload($this->data['Product']['preview']['tmp_name'], $this->data['Product']['preview']['name'], 'previews');
					
				}
				else
				{
					$this->request->data['Product']['preview'] =  '';
				}
			}
			
			if ($this->request->is('post')) {
				if($this->request->data['Product']['image']['name'])
				{
					$this->request->data['Product']['image'] = $this->upload($this->data['Product']['image']['tmp_name'], $this->data['Product']['image']['name'], 'product-images');
					
				}
				else
				{
					$this->request->data['Product']['image'] =  '';
				}
			}
		
		
			$this->Product->create();
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash('The product has been added!', 'success');
				return $this->redirect(array('action' => 'admin_index'));
			}
		}
		}
	

	
	public function edit($id = null) {
		$this->layout = 'admin';
		$this->loadModel('Category');
		$this->set('categories', $this->Category->find('list'));
		$this->loadModel('ProductType');
		$this->set('types', $this->ProductType->find('list'));
		$product = $this->Product->findById($id);
		$this->set('product', $product);
		if (!$id) {
			throw new NotFoundException(__('Invalid product'));
		}


		if (!$product) {
			throw new NotFoundException(__('Invalid product'));
		}
		if (!$this->request->data) {
				$this->request->data = $product;
		}
		if ($this->request->is('put')) {
			$this->Product->id = $id;
		if (!empty($this->data)) {
				
				if($this->request->data['Product']['preview']['name'])
				{
					$this->request->data['Product']['preview'] = $this->upload($this->data['Product']['preview']['tmp_name'], $this->data['Product']['preview']['name'], 'previews');
					Debugger::dump($this->request->data['Product']['preview']);
					
				}
				else
				{
					$this->request->data['Product']['preview'] =  $product['Product']['preview'];
				}
				if($this->request->data['Product']['image']['name'])
				{
					$this->request['Product']['image'] = $this->upload($this->data['Product']['image']['tmp_name'], $this->data['Product']['image']['name'], 'product-images');
					
				}
				else
				{
					Debugger::dump($product['Product']['image']);
					$this->request->data['Product']['image'] =  $product['Product']['image'];
				}
		}
			
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('Your product has been updated.'), 'success');
				return $this->redirect(array('action' => 'admin_index'));
			}
			$this->Session->setFlash(__('Unable to update product.'));
		
		}
	}
	
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Product->delete($id)) {
				$this->Session->setFlash('The product has been deleted.', 'success');
				return $this->redirect(array('action' => 'admin_index'));
			}
		}
		
		public function cart_update() {
				if ($this->request->is('post')) {
					foreach($this->request->data['Product'] as $key => $quantity) {
					$this->Session->write('Quantity.' . $key, $quantity);
					}
					$this->Session->setFlash('Shopping Cart is updated.', 'success');
				}
				return $this->redirect(array('action' => 'index'));
			}
			
		public function add_to_cart($id = null) {
			$this->autoRender =false;
			$product = $this->Product->findById($id);
			//check if product exists in database
		   if (empty($product)) {
				throw new NotFoundException(__('Invalid product'));
			}

			//check if prodocut is in a cart
			$productsInCart = $this->Session->read('Cart');
			$alreadyIn = false;
			$quantity = 1;
			foreach ($productsInCart as $productInCart) {
				if ($productInCart['Product']['id'] == $product['Product']['id']) {
					$alreadyIn = true;
					//$this->Session->write('Cart' . $product['Product']['id'], $quantity + 1);
				}
			}
			//if product isn't in a cart add it and set counter value
			if (!$alreadyIn) {
				$amount = count($productsInCart);
				$quantity = 1;
				$this->Session->write('Cart.' . $amount, $this->Product->read(null, $product['Product']['id']));
				$this->Session->write('Counter', $amount + 1);
				$this->Session->write('Quantity.' . $product['Product']['id'], $quantity);
				
				$this->Session->setFlash(__('Product added to cart'), 'success');
			} else {
				$this->Session->setFlash(__('Product already in cart, updated quantity.'), 'warning');
				$quantity = $this->Session->read('Quantity.' . $product['Product']['id']);
				$this->Session->write('Quantity.' . $product['Product']['id'], $quantity+1);

			}
			

	/* END CRUD */
		 $this->redirect(array('controller' => 'categories', 'action' => 'index'));
		
		}
			   public function clear_cart() {
			//delete cart with all elements and counter
			$this->Session->delete('Cart');
			$this->Session->delete('Counter');
			$this->Session->delete('Quantity');
			$this->Session->setFlash(__('Cart Emptied!'), 'success');
			$this->redirect(array('controller' => 'products', 'action' => 'index'));
		}
				 
		public function remove_item($id = null) {
			if (is_null($id)) {
				throw new NotFoundException(__l('Invalid request'));
			}
			//delete product from cart
			$totalQuantity = 0;
			if ($this->Session->delete('Cart.' . $id)) {
				//sort cart elements 
				$cart = $this->Session->read('Cart');
				foreach($cart as $item)
				{
						$totalQuantity = $totalQuantity + $this->Session->read('Quantity.' . $item['Product']['id']);
				}
				$amount = $totalQuantity;
				sort($cart);
				$this->Session->write('Cart', $cart);
				//update counter
				$this->Session->write('Counter', count($cart));
				$this->Session->setFlash(__('Product has been deleted'), 'success');
			}
			return $this->redirect(array('action' => 'index'));
		}
}
?>
