<?php

namespace App\Modules\Setting\Http\Controllers;

use App\Modules\Setting\Repositories\SettingInterface;
use App\Modules\Dropdown\Repositories\DropdownInterface;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class SettingController extends Controller
{
    /**
     * @var SettingInterface
     */
    protected $setting;

    /**
     * @var DropdownInterface
    */
    protected $dropdown;

    public function __construct(SettingInterface $setting,
                                DropdownInterface $dropdown)
    {
        $this->setting = $setting;
        $this->dropdown = $dropdown;
    }

    public function create()
    {
        $data['setting'] = $this->setting->find(1);
        $data['currency'] = $this->dropdown->getFieldBySlug('currency');
        if ($data['setting'] == null) {
            $data['is_edit'] = false;
            return view('setting::setting.create',$data);
        } else {
            $data['is_edit'] = true;
            return view('setting::setting.edit',$data);

        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            if($request->hasFile('company_logo')){
                $data['company_logo'] = $this->setting->upload($data['company_logo']);
            }

            if($request->hasFile('company_favicon')){
                $data['company_favicon'] = $this->setting->upload($data['company_favicon']);
            }
            $this->setting->save($data);
            toastr()->success('Setting Created Successfully');

        }catch(\Throwable $e){
             toastr()->error($e->getMessage());
        }

        return redirect(route('setting.create'));
    }
    public function basicSetting(Request $request)
    {
        $data = $request->all();
         try{
                if ($this->setting->getdata()==null) {
                    if ($request->hasFile('company_logo')) {
                        $data['company_logo'] = $this->setting->upload($data['company_logo']);
                    }

                    if($request->hasFile('company_favicon')){
                        $data['company_favicon'] = $this->setting->upload($data['company_favicon']);
                    }
                    $this->setting->saveBasicSetting($data);
                     toastr()->success('Basic Setting Updated Created Successfully');
                }
                else {
                    $a=$this->setting->getdata()->first();
                    $id=$a->id;
                    if ($request->hasFile('company_logo')) {
                        $data['company_logo'] = $this->setting->upload($data['company_logo']);
                    }

                    if($request->hasFile('company_favicon')){
                        $data['company_favicon'] = $this->setting->upload($data['company_favicon']);
                    }
                    
                    $b=$this->setting->update($id,$data);
                     toastr()->success('Basic Setting Updated Created Successfully');
                }

            }catch(\Throwable $e){
                 toastr()->error($e->getMessage());
            }

        return redirect(route('setting.create'));
    }

    public function updatebasicSetting(Request $request, $id){
        $data = $request->all();
        try{
            if ($this->setting->getdata()==null) {
                if ($request->hasFile('company_logo')) {
                    $data['company_logo'] = $this->setting->upload($data['company_logo']);
                }
                if($request->hasFile('company_favicon')){
                    $data['company_favicon'] = $this->setting->upload($data['company_favicon']);
                }
                $this->setting->saveBasicSetting($data);
                 toastr()->success('Basic Setting Updated Successfully');
            }
            else {
                if ($request->hasFile('company_logo')) {
                    $data['company_logo'] = $this->setting->upload($data['company_logo']);
                }
                if($request->hasFile('company_favicon')){
                    $data['company_favicon'] = $this->setting->upload($data['company_favicon']);
                }
                $this->setting->update($id,$data);
                 toastr()->success('Basic Setting Updated Successfully');
            }
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        return redirect(route('setting.create'));
    }


    public function financeSetting(Request $request){
        $data = $request->all();
        try{

            $this->setting->saveOtherSetting($data);
             toastr()->success('Finance Setting Created Successfully');

        }catch(\Throwable $e){
             toastr()->error($e->getMessage());
        }
        return redirect(route('setting.create'));
    }
    public function otherSetting(Request $request){
        $data = $request->all();
        try{
            $this->setting->saveOtherSetting($data);
             toastr()->success('Other Setting Created Successfully');

        }catch(\Throwable $e){
             toastr()->error($e->getMessage());
        }
        return redirect(route('setting.create'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            if ($request->hasFile('company_logo')) {
                $data['company_logo'] = $this->setting->upload($data['company_logo']);
            }

            if($request->hasFile('company_favicon')){
                $data['company_favicon'] = $this->setting->upload($data['company_favicon']);
            }

            $this->setting->update($id,$data);
             toastr()->success('Setting Updated Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }

        return redirect(route('setting.create'));
    }


}
