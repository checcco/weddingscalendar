<?php
App::uses('AppController', 'Controller');
/**
 * Players Controller
 *
 * @property Player $Player
 */
class PlayersController extends AppController {
	
	var $helpers = array('Time');
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Player->recursive = 0;
		$this->set('players', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		$this->set('player', $this->Player->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Player->create();
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('La nuova comparsa è stata salvata!'), 'default', array('class'=>'alert-box success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Non è stato possibile salvare questa comparsa!'), 'default', array('class'=>'alert-box error'));
			}
		}
		$weddings = $this->Player->Wedding->find('list');
		$this->set(compact('weddings'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('La comparsa è stata aggiornata!'), 'default', array('class'=>'alert-box success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Non è stato possibile aggiornare questa comparsa!'), 'default', array('class'=>'alert-box error'));
			}
		} else {
			$this->request->data = $this->Player->read(null, $id);
		}
		$weddings = $this->Player->Wedding->find('list');
		$this->set(compact('weddings'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->Player->delete()) {
			$this->Session->setFlash(__('Comparsa eliminata!'), 'default', array('class'=>'alert-box success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Non è stato possibile eliminarec questa comparsa!'), 'default', array('class'=>'alert-box error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function pdf($id = null) {
		$this->Player->id = $id;
		$this->set('player', $this->Player->read(null, $id));
		$this->layout = 'pdf';
        $this->render();
	}
	
}
