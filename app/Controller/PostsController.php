<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Pagination', 'Time');
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('view');
	}

	public function isAuthorized($user) {
		// All registered users can add posts
		if ($this->action === 'add') {
			return true;
		}

		// The owner of a post can edit and delete it
		if (in_array($this->action, array('edit', 'delete'))) {
			$postId = (int) $this->request->params['pass'][0];
			if ($this->Post->isOwnedBy($postId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}
    
        public function index() {
			$this->layout = 'blog';

            // we prepare our query, the cakephp way!
    $this->paginate = array(
        'limit' => 3,
        'order' => array('created' => 'desc')
    );
     
    $posts = $this->Paginate('Post');
     
    // pass the value to our view.ctp
    $this->set('posts', $posts);
    }
    
    public function view($id) {
			$this->layout = 'blog';
    $post = $this->Post->findById($id);
     
    // pass the value to our view.ctp
    $this->set('post', $post);
	}
	
	
	public function add() {
		$this->layout = 'admin';


        if ($this->request->is('post')) {
		$this->Post->create();
		$this->request->data['Post']['user_id'] = $this->Session->read('Auth')['User']['id'];
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'), 'success');
                return $this->redirect(array('action' => 'admin_index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }
	
	public function edit($id = null) {
		$this->layout = 'admin';
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}

		$post = $this->Post->findById($id);
		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is('put')) {
			$this->Post->id = $id;
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('Your post has been updated.'), 'success');
				return $this->redirect(array('action' => 'admin_index'));
			}
			$this->Session->setFlash(__('Unable to update your post.'));
		}

		if (!$this->request->data) {
			$this->request->data = $post;
		}

	}
	
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Post->delete($id)) {
			$this->Session->setFlash('The post has been deleted.', 'success');
			return $this->redirect(array('action' => 'admin_index'));
		}
	}

	public function admin_index()
	{
		$this->layout = 'admin';
		$this->paginate = array(
			'limit' => 10,
			'order' => array('id' => 'asc')
		);
		$posts = $this->paginate('Post');
		$this->set('posts', $posts);
	}
}
?>
