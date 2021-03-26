<?php
namespace  App\Services;

class SettingService {

   public static function appInformations($app_info)
    {
        $data                        = [
        
            'phone'                         =>$app_info['phone'],
            'email'                         =>$app_info['email'],
            'twitter'                       =>$app_info['twitter'],
            'instagram'                     =>$app_info['instagram'],
            'facebook'                      =>$app_info['facebook'],
            'terms_ar'                      =>$app_info['terms_ar'],
            'terms_en'                      =>$app_info['terms_en'],
            'about_ar'                      =>$app_info['about_ar'],
            'about_en'                      =>$app_info['about_en'],
        ];
        return $data;
    }

}
