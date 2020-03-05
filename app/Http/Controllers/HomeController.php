<?php

namespace App\Http\Controllers;

use App\OrderService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $permission = Permission::FindById(3);
        // $role = Role::FindById(4);
        // // $role -> givePermissionTo($permission);
        // $search = $request->input('search');
        // $services = OrderService::search($search)
        //     ->paginate(5);
        $services = OrderService::all();
        return view('home', compact('services'));
    }

    public function create()
    {
        return view('OS/create');
    }

    public function store(Request $request)
    {
        $services = new OrderService();
        $services->create($request->all());
        return redirect()->to('home');
    }

    public function regist()
    {
        return view('OS/regist');
    }

    public function registering(Request $request)
    {
        $services = new OrderService();
        $services->create($request->all());
        return redirect()->to('home');
    }

    public function form($id)
    {
        $services = OrderService::find($id);
        return view('/OS/form', compact('services'));
    }

    public function edit(Request $request, $id)
    {
        $services = OrderService::find($id);
        $services->update($request->all());
        return redirect()->to('home');
    }

    public function view($id)
    {
        $services = OrderService::find($id);
        return view('OS/view', compact('services'));
    }

    public function destroy($id)
    {
        $services = OrderService::find($id);
        $services->delete();
        return redirect()->to('home');
    }
}
