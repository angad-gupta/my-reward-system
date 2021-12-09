<?php

namespace App\Modules\Customer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Modules\Customer\Repositories\CustomerInterface;
use App\Modules\Currency\Repositories\CurrencyInterface;
use App\Modules\Customer\Repositories\RewardInterface;
use App\Modules\Customer\Entities\Reward;
use App\Modules\Customer\Entities\Customer;

class CustomerController extends Controller
{
    protected $customer;
    protected $currency;
    protected $reward;
    
    public function __construct(CustomerInterface $customer, CurrencyInterface $currency, RewardInterface $reward) 
    {
        $this->customer = $customer;
        $this->currency = $currency;
        $this->reward = $reward;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['customer_info'] = $this->customer->findAll($limit= 50,$search);  
        $data['currency'] = $this->currency->getList();  
        return view('customer::customer.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        $data['currency'] = $this->currency->getList();  
        return view('customer::customer.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
    
         try{
            $this->customer->save($data);

            toastr()->success('Customer Created Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        return redirect(route('customer.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('customer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['customer_info'] = $this->customer->find($id);
        $data['currency'] = $this->currency->getList();  
        return view('customer::customer.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       $data = $request->all();
        
        try{

            $this->customer->update($id,$data);

            toastr()->success('Customer Updated Successfully');
            
        }catch(\Throwable $e){
           toastr($e->getMessage())->error();
        }
        
        return redirect(route('customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->customer->delete($id);
             toastr()->success('Customer Deleted Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
      return redirect(route('customer.index'));
    }

    public function reward($id)
    {
        $customer = Customer::findOrFail($id);
        $data['reward_info'] = $customer->rewards()->paginate(50);
        $data['customer'] = $customer;
        return view('customer::reward.index',$data);
    }

}
