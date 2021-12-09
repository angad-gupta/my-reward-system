<?php 
namespace App\Modules\Customer\Repositories;

use App\Modules\Customer\Entities\Reward;

class RewardRepository implements RewardInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Reward::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function find($id){
        return Reward::find($id);
    }
    
   public function getList(){  
       $result = Reward::get()->pluck('full_detail', 'id');
       return $result;
   }
    
    public function save($data){
        return Reward::create($data);
    }
    
    public function update($id,$data){
        $result = Reward::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Reward::find($id);
        return $result->delete();
    }
    
   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Reward::FILE_PATH, $fileName);

        return $fileName;
   }


}