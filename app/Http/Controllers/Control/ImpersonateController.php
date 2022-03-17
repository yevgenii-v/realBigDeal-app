<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
    /**
     * @param $id
     * @return RedirectResponse
     */
    public function index($id): RedirectResponse
    {
        $this->authorize('viewAny', User::class);

        $user = User::where('id', $id)->first();

        if (auth()->check() && Auth::user()->id === $user->id)
        {
            return redirect()->back()->with('error', 'You can not impersonate yourself.');
        }

        if (session()->has('impersonate')){
            return redirect()->back()->with('error', 'You already impersonated.');
        }

        if ($user->roles->containsStrict('id', Role::IS_ADMIN)){
            return redirect()->back()->with('error', 'Access Denied.');
        }

        if ($user)
        {
            session()->put('impersonate', $user->id);
        }

        return redirect()->route('dashboard');
    }

    /**
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        session()->forget('impersonate');

        return redirect()->route('control.users.index');
    }
}
