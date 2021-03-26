<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface IUser extends IModelRepository
{

    public function admins();
    public function storeAdmin(Request $request);
    public function updateAdmin(Request $request,$id);
}
