<?php
APP ::uses('AppModel', 'Model');

class UserTb extends AppModel {
	public  $belongsTo = 'UserTb';
	public  $hasMany = 'PartnerWork2Tb';
}
