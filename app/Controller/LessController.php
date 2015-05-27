<?php
	APP::uses('AppController', 'Controller');


	class LessController extends AppController {


		public $uses = array('PartnerWork1Tb' , 'PartnerWork2Tb');



		//レス の表示関係
		public function less1(){

			//post されたデータを受け取る
			$req = $this->request->data;   //post

			//post されたデータをview で使えるように変数に set する
			$this->set('user_id', 2);     //$req[""]
			$this->set('thread_id', 1);   //$req[""]

			//test
			//今回 PartnerWork1Tb に検索をかけてみる
			//なお、スレッド一覧からpost された ID をもとに検索をかけるが、今回は仮に「１」を入れておく

			//id しか検索しないから findById を使う
			$where = $this->PartnerWork1Tb->findById(1);
			$this->set('db_data', $where);



			//order を使用した並べ替え
			//なお、ここでもスレッド一覧から post されたid をもとに検索をかけて、特定のスレッドだけを表示させる
			//仮に、１を入れておく  のちにpostされたデータを入れる

			$where = array('conditions' => array('PartnerWork2Tb.partner_work1_tb_id =' => 1));    //$req[""]
			$datas2 =$this->PartnerWork2Tb->find('all' , $where);
			$this->set('db_order', $datas2);

		}//less1 終了



		public function less2(){

			//test
			//今回 PartnerWork2Tb に 仮の

			$req = $this->request->data;   //post

			//INSERT
			if(isset($req['less'])){
			$this->PartnerWork2Tb->create();
			$this->PartnerWork2Tb->save(array('user_tb_id' => $req['user_id'] , 'partner_work1_tb_id' => $req['thread_id'] ,'less' => $req['less'] , 'created' => $req['created'], 'updated' => $req['created']));

			$this->redirect(array('controller' =>'less','action'=>'less1'));
			}



		}//less2 終了


		//レスの削除関係
		public function delete_less(){

			//削除
			if(count($this->request->data) != 0 ){
				$req = $this->request->data;   //post

				//DELETE
				$this->PartnerWork2Tb->delete($req['delete_less']);  // （）の中にはＩＤを入れる
			}

			$this->redirect(array('controller' =>'less','action'=>'less1'));

		}




	}


