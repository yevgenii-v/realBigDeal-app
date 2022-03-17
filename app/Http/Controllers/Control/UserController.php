<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;
use App\Http\Requests\Control\User\UserDeleteRequest;
use App\Http\Requests\Control\User\UserStoreRequest;
use App\Http\Requests\Control\User\UserUpdateRequest;
use App\Models\Role;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use function dd;
use function redirect;
use function view;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function index()
    {
        $paginateUsers = User::paginate(25);

        return view('control.users.index')->with(['paginateUsers' => $paginateUsers]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $roles = Role::all();

        return view('control.users.create', ['roles' => $roles]);
    }

    /**
     * @param UserStoreRequest $request
     * @return RedirectResponse
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        $request->validated();

        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),
        ]);

        $user->roles()->sync($request->role);

        return redirect()->back()->with('success', 'User has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return false
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * @param User $user
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(User $user)
    {
        if($user->id === 1) {
            return redirect()->back()->with('error', 'Access Denied.');
        }

        $roles = Role::all();

        return view('control.users.edit')->with(['user' => $user, 'roles' => $roles]);
    }

    /**
     * @param UserUpdateRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();
        $user->roles()->sync($request->role);
        $user->update($data);

        return redirect()->route('control.users.index')->with('success', 'User data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request)
    {
        abort(404);
    }

    /**
     * @param UserDeleteRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroyAll(UserDeleteRequest $request): RedirectResponse
    {
        //via Gates (AuthServiceProvider)
        $this->authorize('deleteAll', User::class);

        $checkedUser = $request->input('checkedUser.*');
        if (in_array('1', $checkedUser)){
            return redirect()->back()->with('error', 'Access Denied.');
        }

        if (in_array(Auth::user()->id, $checkedUser)){
            return redirect()->back()->with('error', ' You are not allowed to deleted yourself.');
        }

        User::whereIn('id', $checkedUser)->delete();

        return redirect()->back()->with('success', 'User(s) has been deleted.');
    }
}
