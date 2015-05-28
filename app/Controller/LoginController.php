<?php
App::uses('AppController', 'Controller');

class LoginController extends AppController {
    public $uses = array('UserTb');

    public function login(){
    	session_start();

    	if(!isset($_GET['mode']) && isset($_SESSION['is_login']) && $_SESSION['is_login'] === 1){
    		header("Location: ./index2.php");
    	}

    	if(isset($_GET['mode']) && $_GET['mode'] == 'logout'){
    		unset($_SESSION['is_login']);
    	}

//     	// post
    	$login = $this->request->data;

//     	if(isset($login['name'])){
//     	echo '<pre>';
//     	var_dump($login['name']);
//     	echo '</pre>';
//     	}

    	if(isset($login['name']) && isset($login['pass'])){
    		//送られてきた値で検索をかける
    		$where = array('conditions' => array('UserTb.id' => $login['name'] , 'UserTb.pass' => $login['pass']));
    		$datas =$this->UserTb->find('all', $where);

			if(count($datas) > 0){
    			$this->redirect(array('controller' =>'thread','action'=>'thread1', '?' => array('user_id' => $login['name'])));
			}

//     		//結果により分岐させる
//     		if(count($datas) != 1){
//     			$this->redirect(array('controller' =>'less','action'=>'index', '?' => array('mode' => 2) ));
//     		}else{
//     			//スレッド表示のための、データベース検索
//     			$datas = $this->PartnerWork1Tb->find('all', array('order' => array('PartnerWork1Tb.id' => 'desc')));
//     			$this->set('db_data', $datas);
// 	    	}
    	}
    }
}
?>