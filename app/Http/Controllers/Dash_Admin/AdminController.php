<?php

namespace App\Http\Controllers\Dash_Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dash_Admin\StoreAdminRequest;
use App\Http\Requests\Dash_Admin\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        # code...
    }


    public function show($admin_id)
    {
        # code...
    }

    public function store(StoreAdminRequest $request)
    {
        # code...
    }


    public function update($admin_id, UpdateAdminRequest $request)
    {
        # code...
    }


    public function delete($admin_id)
    {
        # code...
    }

    public function change_password($admin)
    {
        # code...
    }

    public function active($admin_id)
    {
        # code...
    }


    public function disactive($admin_id)
    {
        # code...
    }
}
