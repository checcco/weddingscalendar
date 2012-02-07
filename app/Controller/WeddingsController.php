<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'apiClient', array('file' => 'google' . DS . 'apiClient.php'));
App::import('Vendor', 'apiCalendarService', array('file' => 'google' . DS . 'contrib' . DS . 'apiCalendarService.php'));

/**
 * Weddings Controller
 *
 * @property Wedding $Wedding
 */
class WeddingsController extends AppController {	
	
	var $helpers = array('Time');
	
	function beforeFilter() {
		
		
		if ($this->rightPassword() && !$this->Session->read('googletoken')) {
			list($client, $cal) = $this->createApiClientAndCalendar(false);
			/*if (isset($_REQUEST['code'])) {
				$client->authenticate();
				$this->Session->write('googletoken', $client->getAccessToken());
			} else {
				$this->redirect($client->createAuthUrl());
				exit();
			}*/
			$client->authenticate();
			$this->Session->write('googletoken', $client->getAccessToken());
		}
		
		parent::beforeFilter();
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
	
		$this->Wedding->recursive = 0;
		$this->set('weddings', $this->paginate());
		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Wedding->id = $id;
		if (!$this->Wedding->exists()) {
			throw new NotFoundException(__('Invalid wedding'));
		}
		$this->set('wedding', $this->Wedding->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Wedding->create();
			$evid = $this->addEvent($this->request->data);
			$this->request->data['Wedding']['evid'] = $evid;
			if ($this->Wedding->save($this->request->data)) {
				$this->Session->setFlash(__('Il matrimonio è stato aggiunto!'), 'default', array('class'=>'alert-box success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Questo matrimonio non può essere salvato.'), 'default', array('class'=>'alert-box error'));
			}
		}
		$players = $this->Wedding->Player->find('list');
		$this->set(compact('players'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Wedding->id = $id;
		if (!$this->Wedding->exists()) {
			throw new NotFoundException(__('Invalid wedding'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			//debug($this->request->data);exit();
			$this->updateEvent($this->request->data);
			if ($this->Wedding->save($this->request->data)) {
				$this->Session->setFlash(__('Il matrimonio è stato aggiornato!'), 'default', array('class'=>'alert-box success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Questo matrimonio non può essere aggiornato.'), 'default', array('class'=>'alert-box error'));
			}
		} else {
			$this->request->data = $this->Wedding->read(null, $id);
		}
		$players = $this->Wedding->Player->find('list');
		$this->set(compact('players'));
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
		$this->Wedding->id = $id;
		if (!$this->Wedding->exists()) {
			throw new NotFoundException(__('Invalid wedding'));
		}
		$wedd = $this->Wedding->read(null, $id);
		$evid = $wedd['Wedding']['evid'];
		if ($this->Wedding->delete()) {
			$this->deleteEvent($evid);
			$this->Session->setFlash(__('Il matrimonio è stato eliminato!'), 'default', array('class'=>'alert-box success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Il matrimonio non può essere eliminato!'), 'default', array('class'=>'alert-box error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function login() {
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Session->write('password', $this->request->data['password']);
			if ($this->rightPassword()) {
				$this->Session->setFlash(__('Accesso effettuato! Ciao Beppe!'), 'default', array('class'=>'alert-box success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Password errata.'), 'default', array('class'=>'alert-box error'));
			}
		}
		
	}
	
	private function addEvent($info) {
		$newDetails = $this->prepareDetails($info);
		list($client, $cal) = $this->createApiClientAndCalendar();
		$event = $this->prepareEvent($newDetails);
		$createdEvent = $cal->events->insert(Configure::read('Calendar'), $event);
		return $createdEvent['id'];
	}
	
	private function updateEvent($info) {
		$evid = $info['Wedding']['evid'];
		$newDetails = $this->prepareDetails($info);
		list($client, $cal) = $this->createApiClientAndCalendar();
		$eventData = $cal->events->get(Configure::read('Calendar'), $evid);
		$event = $this->prepareEvent($newDetails, $eventData);
		$updatedEvent = $cal->events->update(Configure::read('Calendar'), $evid, $event);
	}
	
	private function deleteEvent($evid) {
		list($client, $cal) = $this->createApiClientAndCalendar();
		$cal->events->delete(Configure::read('Calendar'), $evid);
	}
	
	private function prepareEvent($newDetails, $oldDetails = null) {
		$event = new Event($oldDetails);
		$event->setSummary($newDetails['summary']);
		$event->setLocation($newDetails['location']);
		$start = new EventDateTime();
		$start->setDateTime($newDetails['startTime']);
		$event->setStart($start);
		$end = new EventDateTime();
		$end->setDateTime($newDetails['endTime']);
		$event->setEnd($end);
		$attendee1 = new EventAttendee();
		$attendee1->setEmail('ezzi80@gmail.com');
		$attendees = array($attendee1);
		$event->attendees = $attendees;
		return $event;
	}
	
	private function prepareDetails($info) {
		$wedding = $info['Wedding'];
		$summary = "Matrimonio di ".$wedding['nomecognomelui']." e di ".$wedding['nomecognomelei'];
		$location = $wedding['sala']." - "-$wedding['cittasala'];
		$startTime = $wedding['datamatrimonio']['year']."-".$wedding['datamatrimonio']['month']."-".$wedding['datamatrimonio']['day'];
		$endTime = $startTime."T23:59:00.000".date('O');
		$startTime .= "T".$wedding['orario']['hour'].":".$wedding['orario']['min'].":00.000".date('O');
		$newDeatils = array('summary'=>$summary, 'location'=>$location, 'startTime'=>$startTime, 'endTime'=>$endTime);
		return $newDeatils;
	}
	
	private function createApiClientAndCalendar($withToken = true) {
		$client = new apiClient();
		$client->setApplicationName(Configure::read('ApplicationName'));
		$client->setClientId(Configure::read('ClientId'));
		$client->setClientSecret(Configure::read('ClientSecret'));
		$client->setRedirectUri(Configure::read('RedirectUri'));
		$cal = new apiCalendarService($client);
		if ($withToken) $client->setAccessToken($this->Session->read('googletoken'));
		return array($client, $cal);
	}
	
	
	
	
}
