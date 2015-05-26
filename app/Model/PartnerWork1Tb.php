<?php
APP ::uses('AppModel', 'Model');

class PartnerWork1Tb extends AppModel {
	public  $belongsTo = 'UserTb';
	public  $hasMany = 'PartnerWork2Tb';
}
