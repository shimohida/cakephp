<?php
App::uses('AppController', 'Controller');

class ThreadController extends AppController {
    public $uses = array('UserTb','PartnerWork1Tb');


    public function thread1() {

    	$req1 = $this->request->query; //get
    	$this->set('get_data', $req1);

    	// スレッド表示のための、データベース検索
    	$datas = $this->PartnerWork1Tb->find('all', array('order' => array('PartnerWork1Tb.id' => 'desc')));
    	$this->set('db_data', $datas);

    }//thread1 終了


    public function thread2() {
    }


    public function run_regist(){
        // INSERT
        if($this->request->data['title'] != '' && $this->request->data['detail'] != ''){
            $this->PartnerWork1Tb->create();
            $this->PartnerWork1Tb->save(array('user_tb_id' => 1,'thread' => $this->request->data['title'], 'detail' => $this->request->data['detail']));
            $this->redirect("/thread/thread1");
        }

        $this->redirect("/thread/thread1");
    }


    public function delete_thread(){

    	//削除関係
    	$req = $this->request->data;   //post

        if(isset($req)){

        	if($req['user_id'] != "" && $req['delete_id'] != ""){

        		//送られてきた値でPartnerWork1Tbを検索する
                $where = array('conditions' => array('PartnerWork1Tb.id =' => $req['delete_id'] ));
                $thread =$this->PartnerWork1Tb->find('all' , $where);


        		//結果により分岐させる
        		if($req['user_id'] != $thread[0]['PartnerWork1Tb']['user_tb_id']){

        			//スレッドのIDとuser が不一致
        			$this->redirect(array('controller' =>'thread','action'=>'thread1', '?' => array('user_id' => $req['user_id'] ,'delete' => 2) ));
        		}else{
        			// スレッドの削除を行う
        			$this->PartnerWork1Tb->delete($req['delete_id']);
        			$this->redirect(array('controller' =>'thread','action'=>'thread1', '?' => array('user_id' => $req['user_id'] ,'delete' => 3) ));
        		}

        	}else {
        		$this->redirect(array('controller' =>'thread','action'=>'thread1', '?' => array('user_id' => $req['user_id'] ,'delete' => 1) ));
        	}

        }else{
        	$this->redirect(array('controller' =>'thread','action'=>'thread1', '?' => array('user_id' => $req['user_id'] ,'delete' => 1) ));
        }
    } //delete_user 終了

} //クラスの終了

















?>