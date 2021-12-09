<?php 
namespace App\Modules\Customer\Repositories;

use App\Modules\Customer\Entities\Customer;

class CustomerRepository implements CustomerInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Customer::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function find($id){
        return Customer::find($id);
    }
    
   public function getList(){  
       $result = Customer::get()->pluck('full_detail', 'id');
       return $result;
   }
    
    public function save($data){
        return Customer::create($data);
    }
    
    public function update($id,$data){
        $result = Customer::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Customer::find($id);
        return $result->delete();
    }
    
   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Customer::FILE_PATH, $fileName);

        return $fileName;
   }


}