<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomer;

class CustomerController extends Controller
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
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $customers = Customer::orderBy('id', 'desc')->get()->toJson();
//    dd($customers);
//    $customers = "";
    return view('general.customer', compact('customers'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreCustomer  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreCustomer $request)
  {
    Customer::create([
      'name' => request('customerName'),
      'location' => request('address'),
      'notesfordevice' => request('notesForDevice'),
      'notesforoffice' => request('notesForOffice'),
    ]);

    return redirect('/customer')->with('success', 'Customer added successfully');
  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $customers = Customer::orderBy('id', 'desc')->get()->toJson();
    $editThisCustomer = Customer::findOrFail($id);

//    dd($editThisCustomer);

     return view('general.customer', compact('customers','editThisCustomer'));

//    return redirect('/customer');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    Customer::find($id)->update([
      'name' => request('customerName'),
      'location' => request('address'),
      'notesfordevice' => request('notesForDevice'),
      'notesforoffice' => request('notesForOffice'),
    ]);

    return redirect('/customer')->with('success', 'Updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
//    dd($id);
    $Customer = Customer::findOrFail($id);//->get()->toJson();

    $Customer->delete();

    return redirect('/customer')->with('success', 'Delete successfully');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function extra(Request $request)
  {
    switch ($request->input('action')) {
      case 'delete':
        if(request('multipleCustomer')!==null){
          Customer::destroy(request('multipleCustomer'));
          return redirect('/customer')->with('success', 'Delete successfully');
        }else{
          echo "gogo";
        }
        break;
      case 'export':
        echo "yoyo";
        break;
    }

  }
}
