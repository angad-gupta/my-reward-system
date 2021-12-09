<?php

namespace App\Modules\User\Repositories;


use App\Modules\Employment\Entities\Employment;
use App\Modules\User\Entities\User;

class UserRepository implements UserInterface
{

    public function find($id)
    {
        return User::find($id);
    }

    public function save($data)
    {
        return User::create($data);
    }

    public function update($id, $data)
    {
        $User = User::find($id);
        return $User->update($data);
    }

    public function delete($id)
    {
        return User::destroy($id);
    }

    public function deleteEmpUser($id)
    {
        return User::where('emp_id', '=', $id)->delete();
    }

    public function checkUsername($username)
    {
        return User::where('username', '=', $username)->get();
    }

    public function getUserByUsername($username)
    {
        return User::where('username', '=', $username)->first();
    }

    public function getUserId($emp_id)
    {
        return User::where('emp_id', '=', $emp_id)->first();
    }

    public function getUserEmployee()
    {
        return User::where('active', '=', 1)->where('user_type', '=', 'employer')->get();
    }

    public function getAllActiveUser()
    {
        return User::where('active', '=', 1)->where('user_type', '!=', 'super_admin')->get();
    }

    public function getChild($parent_id)
    {
        return User::where('parent_id', '=', $parent_id)->get();
    }

    public function getOutletManger()
    {
        return User::where('active', '=', 1)->where('user_type', '=', 'branch_outlet')->get();
    }

    public function getAllMarketing()
    {
        return User::where('active', '=', 1)->where('department', '=', '0')->get();
    }

    public function getAllChildUser($multi_users)
    {
        return User:: whereIn('id',$multi_users)->where('active', '=', 1)->where('department', '=', '0')->get();
    }


    public function getAllActiveUserList()
    {
        return User::where('active', '=', 1)->where('user_type', '!=', 'super_admin')->pluck('first_name', 'id');
    }

    public function getUsersByFilter($filter = [], $select = ['*'])
    {
        $result = User::where($filter)->get($select);
        return $result;
    }

    public function getAdminUser()
    {
        return User::whereUserType('super_admin')->get();
    }

    public function getUserEmployeeList()
    {
        return User::where('active', '=', 1)->where('user_type', '=', 'employer')->pluck('first_name', 'id');
    }

    public function getLeadParent()
    {
        return User::where('parent_id', '=', '1')->get();
    }

    public function getEmployeeUserList()
    {
        $employer_user = $this->findAll();
        $employee_data = array();
        foreach ($employer_user as $key => $user) {
            if ($user->active == 1 && $user->emp_id != null) {
                if(!empty($user->middle_name)) {
                    $full_name = $user->first_name . ' ' . $user->middle_name. ' ' . $user->last_name;
                } else {
                    $full_name = $user->first_name.' ' . $user->last_name;  
                }
                $employee_data += array(
                    $user->id => $full_name
                );
            }
        }
        return $employee_data;
    }

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = User::orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result;
    }

    public function getUserByEmpId($data)
    {
        return User::where('emp_id','=',$data)->first();
    }

    public function getAdminList()
    {
        return User::select('id')->whereUserType('admin')->get();
    }

    public function getUserById($user_id)
    {
        return User::select('first_name', 'last_name')->where('id', $user_id)->first(); 
    }

    public function getAdmin()
    {
        return User::select('id')->whereUserType('admin')->orderBy('id', 'DESC')->limit(1)->first();
    }

}