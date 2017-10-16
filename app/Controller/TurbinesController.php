<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');
App::uses('Turbina', 'Model');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class TurbinesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Turbina');

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function home() {

		$turbines = $this->Turbina->find('all',array(
			'conditions' => array(),
			'recursive' => -1,
			/*'joins' => array(
					array(
          			 	'table' => 'report_states',
            			'alias' => 'ReportState',
            			'type' => 'INNER',
            			'conditions' => array(
                			'ReportState.id=UserReport.report_state_id'
            			)
            		),
            		array(
          			 	'table' => 'users',
            			'alias' => 'User',
            			'type' => 'INNER',
            			'conditions' => array(
                			'UserReport.user_id=User.id'
            			)
            		)
				),
			'order' => array('UserReport.date' => 'DESC'),*/
			'fields' => array('Turbina.*')
			
		));

		//$this->printWithFormat($turbines,true);

		$this->set(compact('turbines')); 
		
	}

	public function saveTurbine(){
		$this->layout=false;
		$this->autoRender=false;
		$turbineDataRaw = $_POST; 

		//$this->printWithFormat($turbineDataRaw,true);

		$turbineData = array (	'name' => $_POST['name'],
								'type' => $_POST['type'], 
	                            'created_at' => date('Y-m-d H:i:s'));

		if($this->Turbina->save($turbineData)){
			$this->redirect('/');
		}

		//echo json_encode(array("success" => $success));

	}

	public function deleteTurbine(){
		$this->layout=false;
		$this->autoRender=false;
		$id = $_POST['id']; 

		//$this->printWithFormat($id,true);

		if($this->Turbina->delete($id)){
			$this->redirect('/');
		}

		//echo json_encode(array("success" => $success));

	}

	public function editTurbine(){
		$this->layout=false;
		$this->autoRender=false;
		$id = $_POST['id']; 
		$name = $_POST['name']; 
		$type = $_POST['type']; 

		//$this->printWithFormat($_POST,true);

		$this->Turbina->id=$id;                
		$this->Turbina->set(array('name' => $name, 'type' => $type));                
		$this->Turbina->save();

		$this->redirect('/');
		//echo json_encode(array("success" => $success));

	}
}