<?php
App::uses('AppController', 'Controller');

class ThreadController extends AppController {
    public $uses = array('UserTb','PartnerWork1Tb');

    public function index(){

    }


    public function thread1() {

        //ログイン関係
        $req = $this->request->data;   //post

        if(isset($req)){

            if($req['name'] != "" && $req['pass'] != ""){

                //送られてきた値で検索をかける
                $where = array('conditions' => array('UserTb.name =' => $req['name'] , 'UserTb.pass =' => $req['pass']));
                $datas =$this->UserTb->find('all' , $where);
                $this->set('login_data', $datas);
                var_dump($datas);

                //結果により分岐させる
                if(count($datas) != 1){
                    $this->redirect(array('controller' =>'less','action'=>'index', '?' => array('mode' => 2) ));
                }else{
                    // スレッド表示のための、データベース検索
                    $datas = $this->PartnerWork1Tb->find('all', array('order' => array('PartnerWork1Tb.id' => 'desc')));
                    $this->set('db_data', $datas);
                }

            }else {
                $this->redirect(array('controller' =>'less','action'=>'index', '?' => array('mode' => 1) ));
            }

        }else{
            $this->redirect(array('controller' =>'less','action'=>'index', '?' => array('mode' => 1) ));
        }


    }//thread1 終了

    public function thread2() {
    }

    public function run_regist(){
        // INSERT
        if($this->request->data['title'] != '' && $this->request->data['detail'] != ''){
            $this->PartnerWork1Tb->create();
            $this->PartnerWork1Tb->save(array('user_tb_id' => 6,'thread' => $this->request->data['title'], 'detail' => $this->request->data['detail']));
        }
        else
            echo '空白が入っていたのでスレッド作成ができませんでした。';

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