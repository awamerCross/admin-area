<?php

namespace App\Repositories\Eloquent;

use App\Models\Setting;
use App\Repositories\Interfaces\ISetting;
use App\Services\SettingService;

class SettingRepository extends AbstractModelRepository implements ISetting
{

    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }

    public function updateSetting($data=[])
    {
        foreach ( $data as $key => $val )
			if ( $val )
				$this->model->where( 'key', $key ) -> update( [ 'value' => $val ] );
        
    }

    public function getAppInformation()
    {
        return SettingService::appInformations($this->model::pluck('value', 'key'));
    }
}
