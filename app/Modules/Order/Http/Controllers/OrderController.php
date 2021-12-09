<?php

namespace App\Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Modules\Customer\Repositories\CustomerInterface;
use App\Modules\Order\Repositories\OrderInterface;
use App\Modules\Currency\Repositories\CurrencyInterface;
use App\Modules\Customer\Repositories\RewardInterface;
use Carbon\Carbon;

class OrderController extends Controller
{
    protected $customer;
    protected $currency;
    protected $order;
    protected $reward;
    
    public function __construct(CustomerInterface $customer, CurrencyInterface $currency, OrderInterface $order, RewardInterface $reward) 
    {
        $this->customer = $customer;
        $this->currency = $currency;
        $this->order = $order;
        $this->reward = $reward;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['customer_info'] = $this->customer->getList();  
        $data['order_info'] = $this->order->findAll($limit= 50,$search);  
        $data['currency'] = $this->currency->getList();  
        return view('order::order.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        $data['customer_info'] = $this->customer->getList();  
        $data['currency'] = $this->currency->getList();  
        return view('order::order.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $customer = $this->customer->find($data['customer_id']);  
         try{

            $data['currency_id'] =  $customer->currency_id;
            $data['status'] =  'pending';
            $this->order->save($data);

            toastr()->success('Order Created Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        return redirect(route('order.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('order::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['order_info'] = $this->order->find($id);
        $data['customer_info'] = $this->customer->getList();  
        $data['currency'] = $this->currency->getList();  
        return view('order::order.edit',$data);
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

            $this->order->update($id,$data);

            toastr()->success('Order Updated Successfully');
            
        }catch(\Throwable $e){
           toastr($e->getMessage())->error();
        }
        
        return redirect(route('order.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->order->delete($id);
             toastr()->success('Order Deleted Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
      return redirect(route('order.index'));
    }

    public function complete($id)
    {

        $order = $this->order->find($id);
        $customer = $this->customer->find($order->customer_id);

        //Create Reward Record
        $reward_data['order_id'] = $order->id;
        $reward_data['expiry_date'] = Carbon::now()->addYears(1);
        $reward_data['expiry_status'] = "active";

        //Calculate Reward amount
        $reward_data['reward_amount'] = $this->calculateRewardAmount($order);
        $this->reward->save($reward_data);

        $order->status = "completed";
        $order->save();

        //Customer Credit Update
        $customer->reward_credit +=  $reward_data['reward_amount'];
        $customer->save();

        toastr()->success('Order Completed. Reward points added.'); 
        return redirect(route('order.index'));
    }

    public function calculateRewardAmount($order)
    {
        $currency = $this->currency->find($order->currency_id);
        
        $converted_usd = $order->sale_amount * $currency->value;
        $reward_amount = $converted_usd / 1;

        return round($reward_amount);
    }

}
