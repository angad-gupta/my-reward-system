<?php 
namespace App\Modules\Currency\Repositories;

use App\Modules\Currency\Entities\Currency;

class CurrencyRepository implements CurrencyInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Currency::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function find($id){
        return Currency::find($id);
    }
    
   public function getList(){  
       $result = Currency::pluck('name', 'id');
       return $result;
   }
    
    public function save($data){
        return Currency::create($data);
    }
    
    public function update($id,$data){
        $result = Currency::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Currency::find($id);
        return $result->delete();
    }
    
   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Currency::FILE_PATH, $fileName);

        return $fileName;
   }


}