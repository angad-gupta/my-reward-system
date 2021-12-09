<?php

namespace App\Modules\Currency\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Modules\Currency\Repositories\CurrencyInterface;

class CurrencyController extends Controller
{
    protected $currency;
    
    public function __construct(CurrencyInterface $currency) 
    {
        $this->currency = $currency;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['currency_info'] = $this->currency->findAll($limit= 50,$search);  
        return view('currency::currency.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('currency::currency.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    // public function store(Request $request)
    // {
    //     $data = $request->all();
    
    //      try{
    //         if ($request->hasFile('brand_logo')) {
    //             $data['brand_logo'] = $this->brand->upload($data['brand_logo']);
    //         }

    //         $this->brand->save($data);

    //         toastr()->success('Brand Created Successfully');
    //     }catch(\Throwable $e){
    //         toastr($e->getMessage())->error();
    //     }
        
    //     return redirect(route('brand.index'));
    // }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('brand::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    // public function edit($id)
    // {
    //     $data['is_edit'] = true;
    //     $data['brand_info'] = $this->brand->find($id);
    //     return view('brand::brand.edit',$data);
    // }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    // public function update(Request $request, $id)
    // {
    //    $data = $request->all();
        
    //     try{

    //         if ($request->hasFile('brand_logo')) {
    //             $data['brand_logo'] = $this->brand->upload($data['brand_logo']);
    //         } 

    //         $this->brand->update($id,$data);

    //         toastr()->success('Brand Updated Successfully');
            
    //     }catch(\Throwable $e){
    //        toastr($e->getMessage())->error();
    //     }
        
    //     return redirect(route('brand.index'));
    // }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    // public function destroy($id)
    // {
    //     try{
    //         $this->brand->delete($id);
    //          toastr()->success('Brand Deleted Successfully');
    //     }catch(\Throwable $e){
    //         toastr($e->getMessage())->error();
    //     }
    //   return redirect(route('brand.index'));
    // }

}
