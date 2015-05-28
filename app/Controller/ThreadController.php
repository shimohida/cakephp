<?php
App::uses('AppController', 'Controller');

class ThreadController extends AppController {
	public $uses = array('UserTb','PartnerWork1Tb');

	public function thread1() {
		// データベース
		$datas = $this->PartnerWork1Tb->find('all', array('order' => array('PartnerWork1Tb.id' => 'desc')));
		$this->set('db_data', $datas);
		$this->set('msg', '空白が入っていたのでスレッド作成ができませんでした。');
	}

	public function thread2() {
	}

	public function run_regist(){
		// INSERT
		if($this->request->data['title'] != '' && $this->request->data['detail'] != ''){
			$this->PartnerWork1Tb->create();
			$this->PartnerWork1Tb->save(array('user_tb_id' => 6,'thread' => $this->request->data['title'], 'detail' => $this->request->data['detail']));
		}
// 		else
// 			echo '空白が入っていたのでスレッド作成ができませんでした。';
// 		exit;

		$this->redirect("/thread/thread1");
	}

	public function delete_user(){
		// DELETE
		if(isset($this->request->data['id'])){
			$this->PartnerWork1Tb->delete($this->request->data['id']);
		}
		$this->redirect("/thread/thread1");
	}
}
?>