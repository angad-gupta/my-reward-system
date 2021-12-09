<?php

/**
 * Created by PhpStorm.
 * User: bidhee
 * Date: 8/1/19
 * Time: 4:26 PM
 */

namespace App\Modules\Setting\Repositories;

interface SettingInterface
{
    public function getdata();

    public function find($id);
    public function findPrivacyPolicy();
    public function findSupport();

    public function save($data);

    public function update($id,$data);

    public function updateBasicSetting($id,$data);

    public function saveBasicSetting($data);

//    public function saveColorSetting($data);
//
//    public function saveFinanceSetting($data);

    public function saveOtherSetting($data);

}
