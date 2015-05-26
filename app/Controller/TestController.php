<?php

	APP::uses('AppController', 'Controller');


	class TestController extends AppController {


		public $uses = array('SampleTb');




		public function index(){

			//$this->set('test' , 9999);

			//テスト 確認
			//$req1 = $this->request->query; //get
			//var_dump($req1);
			//$req2 = $this->request->data;   //post
			//var_dump($req2);

// 			 $post = $this->request->data;
// 			 $get  = $this->request->query;

// 			 var_dump($post);




			//検索方法
			//$where = array('conditions' => array('SampleTb.name ==' => 'saitou'));
// 			$datas =$this->SampleTb->find('all' , $where);
//			var_dump($datas);
// 			$this->set('datas', $datas);


// 			$where = array('conditions' => array('SampleTb.name =' => 'test'));
// 			$test =$this->SampleTb->find('all' , $where);
// 			$this->set('db_data', $test);
// 			var_dump($test);


			// INSERT
// 			$this->SampleTb->create();
// 			$this->SampleTb->save(array('name' => 'test' , 'value' => 99));


			// UPDATE

			//更新するＩＤを検索
// 			$target = $this->SampleTd->findById(5);

// 			//更新（上書き）する値を検索
// 			$target['SampleTb']['name'] = 'test1';
// 			$target['SampleTb']['value'] = '88888';
// 			$this->SampleTb->id = $target['SampleTb']['id'];
// 			$this->SampleTb->save($target);


			// DELETE
			//$this->SampleTb->delete(1);  // （）の中にはＩＤを入れる


// 			//全検索（全表示）
			$datas = $this->SampleTb->find('all');
			$this->set('db_data', $datas);



			//order を使用した並べ替え
// 			$where = array('order' => array('SampleTb.id DESC'));
// 			$datas =$this->SampleTb->find('all' , $where);
// 			$this->set('db_data', $datas);

			//group を使用
// 			$where = array('group' => array('SampleTb.value'));
// 			$datas =$this->SampleTb->find('all' , $where);
// 			$this->set('db_data', $datas);

			//limit を使用
// 			$where = array('limit' => 3);
// 			$datas =$this->SampleTb->find('all' , $where);
// 			$this->set('db_data', $datas);

			//複数のものを使用してみる
			//降順で、３件しか表示しないようにする
// 			$where = array('order' => array('SampleTb.id DESC'),'limit' => 3);
// 			$datas =$this->SampleTb->find('all' , $where);
// 			$this->set('db_data', $datas);




		}


		public function  show_regist_view(){

			//更新時の動作に必要な、値の検索
			$req1 = $this->request->query; //get

			if(count($req1) == 1){
// 				$where = array('conditions' => array('SampleTb.id =' => $req1['id']));
// 				$datas =$this->SampleTb->find('all', $where);
// 				$this->set('up_data', $datas);

				//id しか検索しないから findById を使う
				$where = $this->SampleTb->findById($req1['id']);
				$this->set('up_data', $where);
			}

		}


		public function run_regist(){

			//登録
			if(count($this->request->data) != 0 ){
				$req = $this->request->data;   //post

				//update の値があるかによって、「挿入」か「更新」への分岐
				if($req['update'] == ""){
					//INSERT
					$this->SampleTb->create();
					$this->SampleTb->save(array('name' => $req['name'] , 'value' => $req['value']));

				}else{
					//UPDATE
					//更新するＩＤを検索
					$target = $this->SampleTb->findById($req['update']);

					//更新（上書き）する値を検索
					$target['SampleTb']['name'] = $req['name'];
					$target['SampleTb']['value'] = $req['value'];
					$this->SampleTb->id = $target['SampleTb']['id'];
					$this->SampleTb->save($target);

				}
			}

			$this->redirect(array('controller' =>'test','action'=>'index'));

		}


		public function delete_ib(){

			//削除
			if(count($this->request->data) != 0 ){
				$req = $this->request->data;   //post

				//DELETE
				$this->SampleTb->delete($req['delete_id']);  // （）の中にはＩＤを入れる
			}

			$this->redirect(array('controller' =>'test','action'=>'index'));

		}



	}//class  の終わり







