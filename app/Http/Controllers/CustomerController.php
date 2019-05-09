<?php

namespace App\Http\Controllers;
use App\Customer;
use App\City;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        $cities = City::all();
        return view('customers.list', compact('customers', 'cities'));
    }

    public function create(){
        $cities = City::all();
        return view('customers.create', compact('cities'));
    }

    public function store(Request $request){
        $customer = new Customer();
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->city_id  = $request->input('city_id');
        $customer->save();

        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }
    public function edit($id){
        $customer = Customer::findOrFail($id);
        $cities = City::all();

        return view('customers.edit', compact('customer', 'cities'));
    }
    public function update(Request $request, $id){
        $customer = Customer::findOrFail($id);
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->city_id  = $request->input('city_id');
        $customer->save();

        //dung session de dua ra thong bao

        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }
    public function destroy($id){
        $customer=Customer::findorFail($id);
        $customer->delete();
        return redirect()->route('customers.index');
    }
    public function City(){
        return redirect()->route('cities.index');
    }
    public function filterByCity(Request $request){
        $idCity = $request->input('city_id');

        //kiem tra city co ton tai khong
        $cityFilter = City::findOrFail($idCity);

        //lay ra tat ca customer cua cityFiler
        $customers = Customer::where('city_id', $cityFilter->id)->get();
        $totalCustomerFilter = count($customers);
        $cities = City::all();

        return view('customers.list', compact('customers', 'cities', 'totalCustomerFilter', 'cityFilter'));
    }
}
