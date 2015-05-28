<?php
App::uses('AppController', 'Controller');

class ThreadController extends AppController {
    public $uses = array('UserTb','PartnerWork1Tb');


    public function thread1() {

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
        }
        else
        $this->redirect("/thread/thread1");
    }


    public function delete_user(){

    	//削除関係
    	$req = $this->request->data;   //post

        if(isset($req)){

        	if($req['user_name'] != "" && $req['delete_id'] != ""){

        		//送られてきた値で２か所に検索をかける
        		//UserTb を検索」
        		$where = array('conditions' => array('UserTb.name =' => 'shimohida' ));
                $user =$this->UserTb->find('all' , $where);

                //PartnerWork1Tb を検索
                $where = array('conditions' => array('PartnerWork1Tb.id =' => $req['delete_id'] ));
                $thread =$this->PartnerWork1Tb->find('all' , $where);


        		//結果により分岐させる
        		if($user[0]['UserTb']['id'] != $thread[0]['PartnerWork1Tb']['user_tb_id']){
        			//スレッドのIDとuser が不一致
        			$this->redirect(array('controller' =>'thread','action'=>'thread1', '?' => array('delete' => 2) ));
        		}else{
        			// スレッドの削除を行う
        			$this->PartnerWork1Tb->delete($req['delete_id']);
        			$this->redirect(array('controller' =>'thread','action'=>'thread1', '?' => array('delete' => 3) ));
        		}

        	}else {
        		$this->redirect(array('controller' =>'thread','action'=>'thread1', '?' => array('delete' => 1) ));
        	}

        }else{
        	$this->redirect(array('controller' =>'thread','action'=>'thread1', '?' => array('delete' => 1) ));
        }
    } //delete_user 終了

} //クラスの終了

















?>