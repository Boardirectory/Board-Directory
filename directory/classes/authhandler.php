<?php
if(!defined('IN_DIRECTORY')) {
	exit;
}

class AuthHandler {
	private static $permissionSets = array();
	
	public static function getUserAuth(User $user) {
		if($user->auth)
			return $user->auth;
		$groupIDs = array_keys($param->getGroups());
		foreach($groupIDs as $groupID) {
			$permissionSet = AuthHandler::getPermissionSet($groupID);
			foreach($permissionSet as $permission => $value) {
				if($value == 2)
					$user->auth[$permission] = 2;
				elseif($value == 1 && $user->auth[$permission] != 2)
					$user->auth[$permission] = 1;
			}
		}
	}
	
	public static function getPermissionSet($groupID) {
		if($this->permissionSets[$groupID])
			return $groupID;
		global $directory_root_path;
		$this->permissionSets[$groupID] = unserialize(file_get_contents($directory_root_path . '/protected/permissionsets/' . $groupID));
		return $this->permissionSets[$groupID];
	}
}
?>
