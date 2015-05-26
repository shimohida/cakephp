<?php
APP ::uses('AppModel', 'Model');

class UserTb extends AppModel {
	public  $hasMany = array('PartnerWork1Tb', 'PartnerWork2Tb');
}
