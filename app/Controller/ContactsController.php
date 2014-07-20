<?php
class ContactsController extends AppController {

    var $components = array('Email');

    function send() {
        if(!empty($this->data)) {
            $this->Contact->set($this->data);

            if(!empty($this->data['Contact']['email']) && $this->Contact->validates()) {
                $this->Email->from = $this->data['Contact']['name'] . ' <' . $this->data['Contact']['email'] . '>';
                $this->Email->to = 'kazunanakama@gmail.com';
                $this->Email->subject = 'Skygarden Webform';
				$this->Email->send($this->data['Contact']['message']);
				$this->Contact->save($this->data);
				$this->Session->setFlash('Your message has been sent.');
				// Display the success.ctp page instead of the form again
				$this->render('success');
            } else {
				$this->Session->setFlash('Please Fix errors!');
				$this->render('index');
            }
        }
    }

    public function index() {
                        
    }
    	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Contact->delete($id)) {
			$this->Session->setFlash('The contact has been deleted.', 'success');
			return $this->redirect(array('action' => 'admin_index'));
		}
	}
    function admin_index() {
		$this->layout = 'admin';
		$this->paginate = array(
			'limit' => 10,
			'order' => array('id' => 'asc')
		);
		$contacts = $this->paginate('Contact');
		$this->set('contacts', $contacts);
                        
    }

}
?>
