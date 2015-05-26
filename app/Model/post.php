<?php

class Post extends AppModel{


	public $validate = array(
		'title' => array('rule' => 'notEmpty' , 'message' => '未入力です'),
		'body' => array('rule' => 'notEmpty')
	);






}