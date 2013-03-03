<?php
if(!defined('IN_DIRECTORY')) {
	exit;
}

class Database {
	protected $con;
	function __construct() {
		global $board_url;
		$this->con = @mysql_connect('localhost', 'board_board1', base64_decode(file_get_contents($board_url . 'includes/dbpass')));
		if(!@mysql_select_db('_bis', $this->con)) {
			trigger_error('Could not connect to database', E_USER_ERROR);
		}
	}
	
	/**
	 * Alias for mysql_query, but provides link identifier. 
	 * @param String $query
	 * @return resource
	 */
	public function sqlQuery($query) {
		return mysql_query($query, $this->con);
	}
	
	/**
	 * Selects Database Data
	 * @param String $table
	 * @param String/int $data
	 * @param String $conditions = false
	 * @return Array An array filled with the query results. 
	 */
	public function sqlSelect($table, $data, $conditions = false) {
		$return = array();
		$result = $this->sqlQuery("SELECT $data FROM $table" . ($conditions ? "WHERE $conditions" : '') . ';');
		if(!$result) {return;}
		while($row = mysql_fetch_array($result)) {
			$return[] = $row;
		}
		return $return;
	}
	
	/**
	 * Selects Database Data
	 * @param String $table
	 * @param String/int $data
	 * @return boolean Returns the result of the query. 
	 */
	public function sqlInsert($table, $data) {
		$query = "INSERT INTO $table (";
		$keys = $values = '';
		$comma = false;
		foreach($data as $key => $value) {
			if(!comma) {
				$keys .= "$key";
				$values .= "'$value'";
				$comma = true;	
			} else {
				$keys .= "$key,";
				$values .= "'$value,'";
			}
		}
		$query .= "$keys) VALUES ($values)";
		return($this->sqlQuery($query));
	}
}
?>
