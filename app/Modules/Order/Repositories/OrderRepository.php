<?php 
namespace App\Modules\Order\Repositories;

use App\Modules\Order\Entities\Order;

class OrderRepository implements OrderInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Order::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function find($id){
        return Order::find($id);
    }
    
   public function getList(){  
       $result = Order::pluck('name', 'id');
       return $result;
   }
    
    public function save($data){
        return Order::create($data);
    }
    
    public function update($id,$data){
        $result = Order::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Order::find($id);
        return $result->delete();
    }
    
   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Order::FILE_PATH, $fileName);

        return $fileName;
   }


}