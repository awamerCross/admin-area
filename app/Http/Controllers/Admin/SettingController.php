<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ISetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $settingRepo;

    public function __construct(ISetting $setting)
    {
        $this->settingRepo = $setting;
    }

    public function index(){
        $data = $this->settingRepo->getAppInformation();
        return view('admin.settings.index',compact('data'));
    }

    public function update(Request $request){
        $this->settingRepo->updateSetting($request->all());
        return back()->with('success','تم الحفظ');
    }
}
