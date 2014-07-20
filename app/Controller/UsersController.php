
<?php
class UsersController extends AppController {
	public $name = 'Users';
	public $helpers = array('Html','Form');

	public function beforeFilter() {
			parent::beforeFilter();
			//$this->Security->requireAuth();
			//$this->Security->setHash('sha128');
			//$this->Auth->authenticate = array('Form');
			$this->Auth->authenticate = array(
				'Basic' => array(
                'userModel'=>'User'));
			/*$this->Auth->authenticate = array(
				'Blowfish' => array(
                'userModel'=>'User')
                );*/
			$this->Auth->allow('login');
		}
		

	public function login() {
			 $this->autoRender = false;
			//if already logged-in, redirect
			if($this->Session->check('Auth.User')){
				$this->redirect(array('controller'=>'admin','action' => 'admin_index'));      
			}
			 
			// if we get the post information, try to authenticate
			//if ($this->request->is('post')) {
				
				if ($this->Auth->login()) {
					//$this->redirect('http://www.google.com');
					$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
					$this->redirect($this->Auth->redirectUrl());
				} else {
					$this->Session->setFlash(__('Invalid username or password'));
				}
			} 
		//}
	
	
	public function logout() {
		    return $this->redirect($this->Auth->logout());
	}
	
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
		$this->layout = 'admin';
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
		$this->layout = 'admin';
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'admin_index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }
	public function upload($tmp, $file, $folder){
		$url = 'files' . DS . $folder . DS . urlencode($file);
		move_uploaded_file($tmp,  WWW_ROOT . $url);
		return $url;
		
	}
	public function edit($id = null) {
		$this->layout = 'admin';
		if (!$id) {
			throw new NotFoundException(__('Invalid user'));
		}

		$user = $this->User->findById($id);
		if (!$this->request->data) {
			$this->request->data = $user;
			$this->set('user', $user);
		}
		if (!$user) {
			throw new NotFoundException(__('Invalid user'));
			
		}
		if ($this->request->is('put')) {
			$this->User->id = $id;
			if($this->request->data['User']['avatar']['name'])
				{
					$this->request->data['User']['avatar'] = $this->upload($this->data['User']['avatar']['tmp_name'], $this->data['User']['avatar']['name'], 'avatars');
					Debugger::dump($this->request->data['User']['avatar']);
					
				}
				else
				{
					$this->request->data['User']['avatar'] =  $user['User']['avatar'];
				}
			if(empty($this->request->data['User']['password'])) {
			unset($this->request->data['User']['password']);
			}
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('User has been updated.'), 'success');
				return $this->redirect(array('action' => 'admin_index'));
			}
			$this->Session->setFlash(__('Unable to update user.'));
		}



	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->User->delete($id)) {
			$this->Session->setFlash('The user has been deleted.', 'success');
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
	$users = $this->paginate('User');
	$this->set('users', $users);
}

}
?>
