<?php
App::uses('AppModel', 'Model');
/**
 * Wedding Model
 *
 * @property Player $Player
 */
class Wedding extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'datamatrimonio';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Player' => array(
			'className' => 'Player',
			'joinTable' => 'players_weddings',
			'foreignKey' => 'wedding_id',
			'associationForeignKey' => 'player_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
