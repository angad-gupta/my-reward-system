<?php  

namespace App\Modules\UserLog\Repositories;

use App\Modules\UserLog\Entities\UserLog;
use App\Modules\User\Entities\User;
/**
 * HistoryRepository
 */
class UserLogRepository implements UserLogInterface
{
	public function onCreate($ipaddress,$action)
	{	
		UserLog::create([
			'user_id' => auth()->user()->id,
			'ip_address' => $ipaddress,
			// 'longitude' => $longitude,
			'action' => auth()->user()->first_name." logged in ",
			// 'latitude' => $latitude,
			
		]);

		return;
	}

	public function findAll($id,$filter = [])
	{
		$limit = null;

		$result = UserLog::when(array_keys($filter, true), function ($query) use ($filter) {
			if (isset($filter['search_value'])) {
				$query->where('created_at', 'like', '%' . $filter['search_value'] . '%');
			}
		})->where('user_id','!=',$id)->orderBy('created_at', 'DESC')->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
		return $result;     
	}

	public function findSuperadminId()
	{
		return User::where('user_type','=','super_admin')->first();
	}
	
}