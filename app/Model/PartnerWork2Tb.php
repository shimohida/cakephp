<?php
APP ::uses('AppModel', 'Model');

class PartnerWork2Tb extends AppModel {
	public  $belongsTo = array('UserTb', 'PartnerWork1Tb');

	public $validate = array(
		'less' => array('rule' => 'notEmpty'),
	);

}
