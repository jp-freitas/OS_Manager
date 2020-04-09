<?php

namespace App\Http\Controllers;

use App\OrderService;
use Illuminate\Http\Request;

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
