<?php
App::uses('AppController', 'Controller');

class LoginController extends AppController {
    public $uses = array('UserTb');

    public function login(){
    	session_start();

    	if(isset($_GET['mode']) && $_GET['mode'] == 'logout'){
    		unset($_SESSION['login_id']);
    	}

    	if(isset($_SESSION['login_id'])){
    		$this->redirect(array('controller' =>'thread','action'=>'thread1'));
    	}

    	// post
    	$login = $this->request->data;

    	if(isset($login['name']) && isset($login['pass'])){
    		//送られてきた値で検索をかける
    		$where = array('conditions' => array('UserTb.id' => $login['name'] , 'UserTb.pass' => $login['pass']));
    		$datas = $this->UserTb->find('all', $where);
    		$this->set('db_data', $datas);

			if(count($datas) > 0){
				$_SESSION['login_id'] = $login['name'];
    			$this->redirect(array('controller' =>'thread', 'action'=>'thread1', '?' => array('user_id' => $login['name'])));
			}
    	}
    }
}
?>