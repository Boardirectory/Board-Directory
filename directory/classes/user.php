<?php
/**
 *
 * @author Jeroen Bollen jbollensb@gmail.com
 * @package BIS
 * @version 3.1.0
 * @copyright (c) 2012 Jeroen Bollen
 * @license http://opensource.org/licenses/gpl-3.0.html GNU Public License
 *
 */
 
if(!defined('IN_DIRECTORY')) {
	exit;
}

class User {
	public $data = array();	
	public $loggedIn = false;
	
	public function User() {

	}
	
	/**
	 * Setup the user with the specified ID.
	 * @param int $id Grab the data matching the specified user from the database and feed it into the current object. 
	 * @return bool Returns true if the user exists, false if not
	 */
	public function setup($id) {
		global $db;
		$query = $db->query('SELECT * FROM users WHERE user_id = ' . $id);
		$this->data = $query->fetch(PDO::FETCH_ASSOC);
		if(!$this->data) return false;
		return true;
	}
	
	/**
	 * Check a user's login details and if valid create a session for the current user. 
	 * @param String $username The username of the user that should be logged in. 
	 * @return bool Returns true if the login details were correct and the session is created. False if the details were incorrect. 
	 */
	public function login($username, $password) {
		global $db, $directory_root_path;
		$query = $db->prepare('SELECT * FROM users WHERE user_name = :name');
		$query->bindValue(':name', $username, PDO::PARAM_STR);
		$query->execute();
		$this->data = $query->fetch(PDO::FETCH_ASSOC);
		if(!$this->data)
			return false;
		require_once($directory_root_path . 'includes/databasephpBB.php');
		$query = $dbphpBB->prepare('SELECT user_password FROM users WHERE user_id = ' . $this->data['user_phpbb_id']);
		$query->execute();
		if(!$hash = $query->fetch(PDO::FETCH_ASSOC)['user_password'])
			return false;
		require_once($directory_root_path . 'includes/phpbbfunctions.php');
		if(!phpbb_check_hash($password, $hash))
				return false;
		$this->createSession();
		return true;
	}

	/**
	 * Destroys the old session and creates a new session for the current user. 
	 * @param String $username The username of the user that should be logged in. 
	 * @return bool Returns true if the login details were correct and the session is created. False if the details were incorrect. 
	 */
	private function createSession() {
		session_regenerate_id(true);
		$SID = session_id();
		$time = time();
		$_SESSION['user_id'] = $this->data['user_id'];
		$_SESSION['session_start'] = $_SESSION['session_time'] = $time;
		global $db;
		$query = $db->prepare('INSERT INTO sessions (session_id, user_id, session_start, session_time, session_ip)
			VALUES (:sid, :uid, :ss, :ss, :sip)');
		$query->execute(array(
			':sid'	=> $SID,
			':uid'	=> $this->data['user_id'],
			':ss'	=> $time,
			':sip'	=> $_SERVER['REMOTE_ADDR'],
		));
		setcookie('bis_[user_id]', $this->data['user_id'], time() + 3600, '/', null, false, true);
		setcookie('bis_[session_start]', $time, time() + 3600, '/', null, false, true);
		setcookie('bis_[session_time]', $time, time() + 3600, '/', null, false, true);
	}
	
	/**
	 * Checks if the current user is logged in. 
	 */
	public function checkSession() {
		session_start();
		$cookies = getCookie('bis_', array());
		if($cookies['user_id']) {
			global $db;
			$query = $db->prepare('SELECT * FROM sessions WHERE session_id = \'' . session_id() . '\'');
			$query->execute();
			if($session = $query->fetch(PDO::FETCH_ASSOC)) {
				if($_SESSION['user_id'] == $session['user_id'] && $_SESSION['session_start'] == $session['session_start'] && $_SESSION['session_time'] == $session['session_time'] && $_SERVER['REMOTE_ADDR'] == $session['session_ip'] && $session['user_id'] == $cookies['user_id'] && $session['session_start'] == $cookies['session_start'] && $session['session_time'] == $cookies['session_time']) {
					$time = time();
					$query = $db->prepare('UPDATE sessions SET session_time = :time WHERE session_id = :sid');
					$query->execute(array(
						':time'	=> $time,
						':sid'	=> session_id(),
					));
					$_SESSION['session_time'] = $time;
					setcookie('bis_[user_id]', $session['user_id'], time() + 3600, '/', null, false, true);
					setcookie('bis_[session_start]', $session['session_start'], time() + 3600, '/', null, false, true);
					setcookie('bis_[session_time]', $time, time() + 3600, '/', null, false, true);
					$this->loggedIn = true;
				} else {
					session_regenerate_id(true);
					$db->query('DELETE FROM sessions WHERE user_id = ' . $session['user_id']);
					setcookie('bis_[user_id]', 0, time() - 1, null, null, false, true);
					setcookie('bis_[session_start]', 0, time() - 1, null, null, false, true);
					setcookie('bis_[session_time]', 0, time() - 1, null, null, false, true);
				}
			}
		}
	}
}
 