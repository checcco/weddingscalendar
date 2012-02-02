<?php
App::uses('AppModel', 'Model');
/**
 * Player Model
 *
 * @property Wedding $Wedding
 */
class Player extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ruolo';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Wedding' => array(
			'className' => 'Wedding',
			'joinTable' => 'players_weddings',
			'foreignKey' => 'player_id',
			'associationForeignKey' => 'wedding_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => 'Wedding.datamatrimonio ASC',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
