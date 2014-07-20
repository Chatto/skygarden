<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');
App::uses('Folder', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
	'Session', 
	'RequestHandler',
	'DebugKit.Toolbar',
	'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'posts',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
            )
        )
    );
			
	
	
public function isAuthorized($user) {
    // Admin can access every action
		return true;
	}
	/*
	 * Helpers
	 *
	 * @var array
	 */
	 
	public $helpers = array(
		'Form' => array(
			'className' => 'BootstrapForm'
		),
		'Html',
		'Session' => array(
			'className' => 'BootstrapSession'
		),
		'Paginator' => array(
			'className' => 'BootstrapPaginator'
		),
		'Js'
	);
	
	/**
	 * Scaffold
	 *
	 * @var string
	 */
	//public $scaffold;

	/**
	 * Before Filter
	 *
	 * @return void
	 */
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow(array('index', 'view'));
		$this->loadModel('AdminCategory');
		$this->loadModel('AdminLink');
		$admin_categories = $this->AdminCategory->find('all');
		$this->set('admin_categories', $admin_categories);
		$admin_links = $this->AdminLink->find('all');
		$this->set('admin_links', $admin_links);
			$this->loadModel('AdminSetting');
			$settings = $this->AdminSetting->find('list',  array('fields' => array('AdminSetting.key', 'AdminSetting.value')));
			$this->set(compact('settings'));
	}
}
