<?php
App::uses('AppController', 'Controller');

class LoginController extends AppController {
    public $uses = array('UserTb');

    public function login(){
    	session_start();

    	if(isset($_SESSION['login_id']) && $_SESSION['login_id'] === 1){
    		$this->redirect(array('controller' =>'thread','action'=>'thread1'));
    	}

    	if(isset($_GET['mode']) && $_GET['mode'] == 'logout'){
    		unset($_SESSION['login_id']);
    	}

    	// post
    	$login = $this->request->data;

//     	if(isset($login['name'])){
// 	    	echo '<pre>';
// 	    	echo $this->Session->id();
// 	    	echo '</pre>';
//     	}

    	if(isset($login['name']) && isset($login['pass'])){
    		//送られてきた値で検索をかける
    		$where = array('conditions' => array('UserTb.id' => $login['name'] , 'UserTb.pass' => $login['pass']));
    		$datas =$this->UserTb->find('all', $where);

			if(count($datas) > 0){
				$_SESSION['login_id'] = 1;
    			$this->redirect(array('controller' =>'thread','action'=>'thread1', '?' => array('user_id' => $login['name'])));
			}
    	}
    }
}
?>