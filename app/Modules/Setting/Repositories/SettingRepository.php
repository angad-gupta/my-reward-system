<?php

/**
 * Created by PhpStorm.
 * User: bidhee
 * Date: 8/1/19
 * Time: 4:27 PM
 */

namespace App\Modules\Setting\Repositories;

use App\Modules\Setting\Entities\Setting;

class SettingRepository implements SettingInterface
{

    public function getdata(){
        return Setting::first();

    }
    public function find($id){
        return Setting::find($id);
    }

    public function findPrivacyPolicy(){
        return Setting::pluck('privacy_policy');
    }

    public function findSupport(){
        return Setting::pluck('support');
    }



    public function save($data){
        return Setting::create($data);
    }

    public function saveBasicSetting($data){
        return Setting::create($data);
    }
//
//
//    public function saveFinanceSetting($data){
//        return Setting::create($data);
//    }

    public function saveOtherSetting($data){
        return Setting::create($data);
    }

    public function update($id,$data){
        $setting = $this->find($id);
        return $setting->update($data);
    }
    public function updateBasicSetting($id,$data){
        $setting = $this->find($id);
        return $setting->update($data);
    }
    public function upload($file){
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Setting::FILE_PATH, $fileName);

        return $fileName;
    }






}
