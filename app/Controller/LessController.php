<?php
	APP::uses('AppController', 'Controller');


	class LessController extends AppController {


		public $uses = array('PartnerWork1Tb' , 'PartnerWork2Tb');



		//レス の表示関係
		public function less1(){

			//送られたれたデータを受け取る
			$req = $this->request->data;   //post
			$req1 = $this->request->query; //get

			//post されたデータをview で使えるように変数に set する
			$this->set('user_id', 2);     //$req[""]
			$this->set('thread_id', $req1['thread_id']);   //$req[""]


			//今回 PartnerWork1Tb に検索をかけてみる
			//なお、スレッド一覧から 送られた ID をもとに検索をかける
			//id しか検索しないから findById を使う
			$where = $this->PartnerWork1Tb->findById($req1['thread_id']);
			$this->set('db_data', $where);


			//order を使用した並べ替え
			//なお、ここでもスレッド一覧から post されたid をもとに検索をかけて、特定のスレッドだけを表示させる
			//仮に、１を入れておく  のちにpostされたデータを入れる

			$where = array(
						'conditions' => array('PartnerWork2Tb.partner_work1_tb_id =' => $req1['thread_id'])
						,'order' => array('PartnerWork2Tb.created')
						);
			$datas2 =$this->PartnerWork2Tb->find('all' , $where);
			$this->set('db_order', $datas2);

		}//less1 終了



		public function less2(){

			$req1 = $this->request->query; //get

			$this->set('user_id', $req1['user_id']);
			$this->set('thread_id',  $req1['thread_id']);

			//INSERT
			if(isset($req1['less']) && $req1['less'] != ""){
				$this->PartnerWork2Tb->create();
				$this->PartnerWork2Tb->save(array('user_tb_id' => $req1['user_id'] , 'partner_work1_tb_id' => $req1['thread_id'] ,'less' => $req1['less'] , 'created' => time(), 'updated' => time()));

				$this->redirect(array('controller' =>'less','action'=>'less1', '?' => array('thread_id' => $req1['thread_id'] , 'user_id' =>  $req1['user_id']) ));
			}



		}//less2 終了


		//レスの削除関係
		public function delete_less(){

			$req = $this->request->data;   //post
			$req1 = $this->request->query; //get

			//DELETE
			if(isset($req['delete_less'])){
				$this->PartnerWork2Tb->delete($req['delete_less']);  // （）の中にはＩＤを入れる

				$this->redirect(array('controller' =>'less','action'=>'less1', '?' => array('thread_id' => $req1['thread_id'] , 'user_id' =>  $req1['user_id']) ));
			}

		}//レスの削除関係 終了

		//最新版




	}


