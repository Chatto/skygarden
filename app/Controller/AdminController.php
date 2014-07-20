<?php
/**
 * Admin App Controller
 *
 * PHP 5
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the below copyright notice.
 *
 * @author     Robert Love <robert@pollenizer.com>
 * @copyright  Copyright 2012, Pollenizer Pty. Ltd. (http://pollenizer.com)
 * @license    MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @since      CakePHP(tm) v 2.1.1
 */

App::uses('AppController', 'Controller');

class AdminController extends AppController
{
	//public $helpers = array('Form');
    
    	public function admin_index() {
		$this->layout = 'admin';
	}
		public function settings(){
			$this->layout = 'admin';
			$this->loadModel('AdminSetting');
			$admin_settings = $this->AdminSetting->find('all');
			$this->set('admin_settings', $admin_settings);

			//Debugger::dump($this->data);
			if ($this->request->is('post')){
				Debugger::dump($this->request->data);
				if ($this->AdminSetting->SaveMany($this->request->data)) {
					$this->Session->setFlash(__('Settings have been updated.'), 'success');
					return $this->redirect(array('action' => 'settings'));
				}
			}
			else
			{
			$this->request->data = $admin_settings;
			}
	}
	public function category($id = null)
	{
		$this->layout = 'admin';
		$category = $this->AdminCategory->findById($id);
		$this->set('category', $category);
	}
	
}
