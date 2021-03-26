<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\Create;
use App\Repositories\Interfaces\IRole;
use App\Repositories\Interfaces\IUser;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    protected $userRepo, $roleRepo;

    public function __construct(IUser $user,IRole $role)
    {
        $this->userRepo = $user;
        $this->roleRepo = $role;
    }

    /***************************  get all admins  **************************/
    public function index()
    {
        $admins = $this->userRepo->admins();
        $roles  = $this->roleRepo->get();
        return view('admin.admins.index', compact('admins','roles'));
    }


    /***************************  store admin **************************/
    public function store(Create $request)
    {
        $this->userRepo->storeAdmin($request);
        return redirect()->back()->with('success', 'added successfully');
    }

    /***************************  update admin  **************************/
    public function update(Request $request, $id)
    {
        $admin = $this->userRepo->findOrFail($id);
        $this->userRepo->updateAdmin($request,$admin);
        return redirect()->back()->with('success', 'updated successfully');
    }

    /***************************  delete admin  **************************/
    public function destroy($id)
    {
         $role = $this->userRepo->findOrFail($id);
         $this->userRepo->softDelete($role);
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
