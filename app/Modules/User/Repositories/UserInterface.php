<?php

namespace App\Modules\User\Repositories;


interface UserInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function save($data);

    public function update($id,$data);

    public function delete($id);
    
    public function deleteEmpUser($id);
    
    public function checkUsername($username);
    
    public function getUserByUsername($username);
    
    public function getUserId($emp_id);
    
    public function getUserEmployee();
    
    public function getAllActiveUser();
    
    public function getChild($parent_id);
    
    public function getOutletManger();
    
    public function getAllMarketing();
    
    public function getAllChildUser($multi_users);

    public function getAllActiveUserList();

    public function getAdminUser();

    public function getUserEmployeeList();

    public function getLeadParent();

    public function getEmployeeUserList();

    public function getUserByEmpId($data);

    public function getAdminList();

    public function getUserById($user_id);

    public function getAdmin();
}