@extends('layouts.app')
@section('title', 'Blog Entry Form')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('content')
    <div ng-app="redcrowCustomersApp" ng-controller="customersCtrl">
        <form class="container was-validated">
            <div class="form-group row">
                <label for="searchCustomer">Company Name</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="searchCustomer" ng-model="customerModel" name="searchCustomer" aria-describedby="searchCustomerHelp" placeholder="Search or Add..." autofocus autocomplete="off">
                    {{--<small id="searchCustomerHelp" class="form-text text-muted">Search Customer.</small>--}}
                    <div class="input-group-append">
                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#customerModal">Add</button>
                    </div>
                </div>
            </div>
        </form>

        <form name="customerAddingForm" id="customerAddingForm" action="{{ empty($editThisCustomer) ? "/customer" : '/customer/'.$editThisCustomer->id }}" method="post" class="container was-validated" novalidate>
        {!! empty($editThisCustomer) ? '' : '<input type="hidden" name="_method" value="PUT">' !!}

        {{--
     <form name="customerAddingForm" id="customerAddingForm" class="container was-validated" novalidate>
        --}}
        @csrf
        <!-- The Modal -->
            <div class="modal" id="customerModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-white">Customer</h5>
                            <button type="button" class="text-white close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body ">
                            <div class="form-group{{ $errors->has('customerName') ? ' has-error' : '' }} " >
                                {{--<label for="customerName" class="text-muted">Customer Name</label>--}}
                                <input type="text" class="form-control" id="customerName" name="customerName" aria-describedby="customerNameHelp" placeholder="Customer Name" value="{{ empty($editThisCustomer) ? "<% customerModel %>" : $editThisCustomer->name }}" @if($errors->has('customerName') or old('customerName') == '' ) {{'autofocus'}} @endif required>
                                {{--<small id="customerNameHelp" class="form-text text-muted">Customer Name.</small>--}}
                                <div class="invalid-feedback">{{$errors->first('customerName')}}</div>
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} ">
                                {{--<label for="address" class="text-muted">Address</label>--}}
                                <textarea class="form-control" id="address" name="address" rows="3" aria-describedby="addressHelp" placeholder="Address" {{ $errors->has('address') ? ' autofocus' : '' }} >{{ empty($editThisCustomer) ? old('address') : $editThisCustomer->location }}</textarea>
                                {{--<small id="addressHelp" class="form-text text-muted">Company Address.</small>--}}
                                <div class="invalid-feedback">{{$errors->first('address')}}</div>
                            </div>
                            <div class="form-group{{ $errors->has('notesForDevice') ? ' has-error' : '' }} ">
                                {{--<label for="notesForDevice" class="text-muted">Notes For Device</label>--}}
                                <textarea class="form-control" id="notesForDevice" name="notesForDevice" rows="3" aria-describedby="notesForDeviceHelp" placeholder="Notes For Device" {{ $errors->has('notesForDevice') ? ' autofocus' : '' }} >{{ empty($editThisCustomer) ? old('notesForDevice') : $editThisCustomer->notesForDevice }}</textarea>
                                {{--<small id="notesForDeviceHelp" class="form-text text-muted">Notes For Device.</small>--}}
                                <div class="invalid-feedback">{{$errors->first('notesForDevice')}}</div>
                            </div>
                            <div class="form-group{{ $errors->has('notesForOffice') ? ' has-error' : '' }} ">
                                {{--<label for="notesForOffice" class="text-muted">Notes For Office</label>--}}
                                <textarea class="form-control" id="notesForOffice" name="notesForOffice" rows="3" aria-describedby="notesForOfficeHelp" placeholder="Notes For Office" {{ $errors->has('notesForOffice') ? ' autofocus' : '' }} >{{ empty($editThisCustomer) ? old('notesForOffice') : $editThisCustomer->notesForOffice }}</textarea>
                                {{--<small id="notesForOfficeHelp" class="form-text text-muted">Notes For Office.</small>--}}
                                <div class="invalid-feedback">{{$errors->first('notesForOffice')}}</div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-block btn-outline-info save" id="save" >Save</button>
                            {{--<button type="button" class="btn btn-block btn-outline-info" data-dismiss="modal">Close</button>--}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- The Modal -->
        </form>

        <form class="container was-validated">
            <input type="checkbox" ng-checked="meck" ng-model="checkAll" >
            <button ng-disabled="countChecked() == 0" type="submit" class="btn btn-sm" name="action" value="delete">Delete</button>
            <button ng-disabled="countChecked() == 0" type="submit" class="btn btn-sm" name="action" value="export">Export</button>
            <div class="form-group row">
                <div class="input-group mb-3">
                    <div class="input-group-append">

                    </div>
                </div>
            </div>
        </form>
        <form action="/customer/extra" method="POST">
        @csrf
        <div class="row">
            <div class="col-3" align="left"><small><b>Records:&nbsp;<% (customers| filter:customerModel).length %></b></small></br></div>
            <div class="col-7" align="center">
                @if (session('success'))
                    <small class="alert alert-success customerAddingSuccess">
                        {{ session('success') }}
                    </small>
                @endif
            </div>
            <div class="col-2" ng-show="(customers| filter:customerModel).length > 0" align="right">
                <select class="custom-select btn-sm orderbylist" ng-model="orderList">
                    <option value="orderby" selected>Order by</option>
                    <option value="name">Name</option>
                    <option value="address">Address</option>
                    <option value="-created">Newest</option>
                    <option value="created">Oldest</option>
                </select>
            </div>
        </div>
        <div>
            <div class="list-group animate-repeat" ng-repeat="customer in customers | orderBy: orderList | filter:customerModel" >
                <div class="list-group-item customerList"  ng-class-even="'striped'" >
                    {{--<h7>--}}
                        <div class="row">
                            <div class="col-5" align="left">
                                <div class="form-check">
                                    <input type="checkbox" ng-checked="checkAll" ng-click="checkIfAllSelected()" ng-model="customer.Selected" class="form-check-input" name="multipleCustomer[]" value="<%customer.id%>">
                                    <a href="#">
                                        <div class="customerCheck" for="customerCheck">&nbsp;<% customer.name  | limitTo: 80  %> <sub class="customerAddress" ng-show = "customer.location"><i>- <% customer.location | limitTo: 70 %></i></sub></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-7" align="right">
                                <span class="badge badge-secondary"><% $index %></span>&nbsp;&nbsp;|&nbsp;&nbsp<a href="{{ URL::to('customer/' .'<% customer.id %>'. '/edit') }}"><i class="fa fa-edit text-warning customerListEdit"></i></a>&nbsp;&nbsp;|&nbsp;@include('partials.deletepopup',  ['rowId'=> '<% customer.id %>', 'url'=> '/customer', 'logo'=> '<i class="fa fa-trash-alt text-danger customerListDelete"></i>'])&nbsp;
                            </div>
                        </div>
                    {{--</h7>--}}
                </div>
            </div>
            <div class="animate-repeat" ng-if="(customers| filter:customerModel).length === 0">
                <a class="list-group-item list-group-item-danger"  ng-class-even="'striped'">
                    <h5 class="list-group-item-heading">No results found...</h5>
                </a>
            </div>
        </div>
        </form>
        <a href="javascript:;" id="back-to-top" class="btn btn-primary btn-lg back-to-top" ng-click="scrollToTop()"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
@section('footer')
    @include('layouts.footer')
@endsection