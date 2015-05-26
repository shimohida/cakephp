<?php
APP ::uses('AppModel', 'Model');

class UserTb extends AppModel {
	public  $belongsTo = array('UserTb', 'PartnerWork1Tb');
}
