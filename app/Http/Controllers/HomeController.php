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
     * @param  Request  $request
     * @return view
     */
    public function index(Request $request)
    {
        // $permission = Permission::FindById(3);
        // $role = Role::FindById(4);
        // // $role -> givePermissionTo($permission);
        // $search = $request->input('search');
        // $services = OrderService::search($search)
        //     ->paginate(5);
        $services = OrderService::orderBy('id', 'desc')->get();
        return view('home', compact('services'));
    }

    public function create()
    {
        $departments = (object) config('departments');

        return view('OS/create', compact('departments'));
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'requester' => 'required',
        //     'department' => 'required',
        //     'date' => 'nullable',
        //     'contact' => 'required',
        //     'reason' => 'required',
        //     'soluction' => 'required',
        //     'technician' => 'required|string|max:255',
        //     'date_resolution' => 'required|date',
        //     'status_service' => 'required'
        // ]);
        OrderService::create($request->all());
        return redirect()
            ->route('home');
    }

    /**
     * Retrive from config all departments and return a form.
     * 
     * @return view
     */
    public function regist()
    {
        $departments = (object) config('departments');

        return view('OS/regist', compact('departments'));
    }

    public function registering(Request $request)
    {
        OrderService::create($request->all());
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
