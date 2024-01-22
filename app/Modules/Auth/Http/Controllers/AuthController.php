<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Admin;
use App\Modules\Auth\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @AuthController
 */
class AuthController extends Controller
{
    /**
     * @param AuthRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginAdmin(AuthRequest $request)
    {
        $data = $request->only(Admin::AUTH);

        if (Auth::guard(ADMIN)->attempt($data)) {
            return to_route('admin.index');
        }

        return to_route(ROUTE_ADMIN['SIGN_IN'])->with('wrongAccount', __('Email or Password is incorrect'));
    }
}
