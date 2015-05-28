<?php
APP ::uses('AppModel', 'Model');

class PartnerWork1Tb extends AppModel {
	public  $hasMany = 'PartnerWork2Tb';
		public  $belongsTo = 'UserTb';
}