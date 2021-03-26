<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\IUser;
use App\Traits\UploadTrait;

class UserRepository extends AbstractModelRepository implements IUser
{

    use UploadTrait;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function admins()
    {
        return $this->model->select('id', 'name', 'email', 'phone', 'block', 'avatar')->where('user_type', User::ADMIN)->latest()->get();
    }

    public function storeAdmin($request)
    {
        $data               = $request->all();
        $data['avatar']     = $this->uploadFile($request['avatar'], 'users');
        $data['user_type']  = User::ADMIN;
        return $this->model->create($data);
    }

    public function updateAdmin($request, $user)
    {
        $input               = array_filter($request->all());
        $input['avatar']     = $this->uploadFile($request['avatar'], 'users');

        if ($request->avatar)
            if ($user->avatar != 'user.png')
                $this->deleteFile($user->avatar, 'users');

        $user->update($input);

        return $user;
    }
}
