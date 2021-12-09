<?php  

namespace App\Modules\UserLog\Repositories;

interface UserLogInterface
{
	public function onCreate($ipaddress, $action);
	public function findAll($id,$filter = []);
	public function findSuperadminId();
	}