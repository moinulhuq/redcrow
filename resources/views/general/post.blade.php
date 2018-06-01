@extends('layouts.app')

@section('title', 'Blog Entry Form')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    {{--<form action="/post" method="post" class="container was-validated" novalidate>--}}
        {{--@csrf--}}
        {{--<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">--}}
            {{--<label for="title">Title</label>--}}
            {{--<input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Blog Title" value="{{ old('title') }}" @if($errors->has('title') or old('title') == '' ) {{'autofocus'}} @endif required>--}}
            {{--<small id="titleHelp" class="form-text text-muted">Title of the Blog.</small>--}}
            {{--<div class="invalid-feedback">{{$errors->first('title')}}</div>--}}
        {{--</div>--}}
        {{--<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">--}}
            {{--<label for="body">Body</label>--}}
            {{--<textarea class="form-control" id="body" name="body" rows="3" aria-describedby="bodyHelp"  {{ $errors->has('body') ? ' autofocus' : '' }} required>{{ old('body') }}</textarea>--}}
            {{--<small id="bodyHelp" class="form-text text-muted">Body of the Blog.</small>--}}
            {{--<div class="invalid-feedback">{{$errors->first('body')}}</div>--}}
        {{--</div>--}}
        {{--<div class="form-check">--}}
            {{--<label class="form-check-label">--}}
                {{--<input type="checkbox" class="form-check-input" id="published" name="published" value="1">--}}
                {{--Publish--}}
            {{--</label>--}}
        {{--</div>--}}
        {{--<button type="submit" class="btn btn-primary">Publish</button>--}}
    {{--</form>--}}
    <div ng-app="redcrowCustomersApp" ng-controller="customersCtrl">
        <form action="/customer" method="post" class="container was-validated" novalidate>
            @csrf
            <div class="form-group{{ $errors->has('sname') ? ' has-error' : '' }} row">
                <label for="sname">Company Name</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="sname" ng-model="customerModel" name="sname" aria-describedby="snameHelp" placeholder="Search or Add..." value="{{ old('sname') }}" autofocus autocomplete="off">
                    {{--<small id="nameHelp" class="form-text text-muted">Company Name.</small>--}}
                    <div class="input-group-append">
                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#customerModal">Add</button>
                    </div>
                    <div class="invalid-feedback">{{$errors->first('name')}}</div>
                </div>
            </div>
        </form>
        <form action="/customer" method="POST" class="container was-validated" novalidate>

            <!-- The Modal -->
            <div class="modal" id="customerModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="/customer" method="post" class="container was-validated" novalidate>

                            <!-- Modal Header -->
                            <div class="modal-header bg-info">
                                <h5 class="modal-title text-white">Customer</h5>
                                <button type="button" class="text-white close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body ">

                                {{--<input type="text" class="form-control" id="companyName" name="companyName" aria-describedby="companyNameHelp" placeholder="Company Name" value="<% customerModel %>" autofocus autocomplete="off" required>--}}
                                <div class="form-group{{ $errors->has('customerName') ? ' has-error' : '' }} " >
                                    {{--<label for="customerName" class="text-muted">Customer Name</label>--}}
                                    <input type="text" class="form-control" id="customerName" name="customerName" aria-describedby="customerNameHelp" placeholder="Customer Name" value="<% customerModel %>" @if($errors->has('customerName') or old('customerName') == '' ) {{'autofocus'}} @endif required>
                                    {{--<small id="titleHelp" class="form-text text-muted">Title of the Blog.</small>--}}
                                    <div class="invalid-feedback">{{$errors->first('customerName')}}</div>
                                </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} ">
                                    {{--<label for="address" class="text-muted">Address</label>--}}
                                    <textarea class="form-control" id="address" name="address" rows="3" aria-describedby="addressHelp" placeholder="Address" {{ $errors->has('address') ? ' autofocus' : '' }} required>{{ old('address') }}</textarea>
                                    {{--<small id="bodyHelp" class="form-text text-muted">Body of the Blog.</small>--}}
                                    <div class="invalid-feedback">{{$errors->first('address')}}</div>
                                </div>
                                <div class="form-group{{ $errors->has('notesForDevice') ? ' has-error' : '' }} ">
                                    {{--<label for="notesForDevice" class="text-muted">Notes For Device</label>--}}
                                    <textarea class="form-control" id="notesForDevice" name="notesForDevice" rows="3" aria-describedby="notesForDeviceHelp" placeholder="Notes For Device" {{ $errors->has('notesForDevice') ? ' autofocus' : '' }} required>{{ old('notesForDevice') }}</textarea>
                                    {{--<small id="notesForDeviceHelp" class="form-text text-muted">Body of the Blog.</small>--}}
                                    <div class="invalid-feedback">{{$errors->first('notesForDevice')}}</div>
                                </div>
                                <div class="form-group{{ $errors->has('notesForOffice') ? ' has-error' : '' }} ">
                                    {{--<label for="notesForOffice" class="text-muted">Notes For Office</label>--}}
                                    <textarea class="form-control" id="notesForOffice" name="notesForOffice" rows="3" aria-describedby="notesForOfficeHelp" placeholder="Notes For Office" {{ $errors->has('notesForOffice') ? ' autofocus' : '' }} required>{{ old('notesForOffice') }}</textarea>
                                    {{--<small id="bodyHelp" class="form-text text-muted">Body of the Blog.</small>--}}
                                    <div class="invalid-feedback">{{$errors->first('notesForOffice')}}</div>
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-block btn-outline-info">Save</button>
                                {{--<button type="button" class="btn btn-block btn-outline-info" data-dismiss="modal">Close</button>--}}
                            </div>

                    </div>
                </div>
            </div>
            <!-- The Modal -->

        </form>


        <div class="row">
            <div class="col-10"><small><b>Number of records: <% (customers| filter:customerModel).length %></b></small></div>
            <div class="col-2" ng-show="(customers| filter:customerModel).length > 0">
                <select class="custom-select btn-sm orderbylist" ng-model="orderList">
                    <option value="orderby" selected>Order by</option>
                    <option value="name">Name</option>
                    <option value="address">Address</option>
                    <option value="-created">Newest</option>
                    <option value="created">Oldest</option>
                </select>
            </div>
        </div>
        <div >
            <div class="list-group animate-repeat" ng-repeat="customer in customers | orderBy: orderList | filter:customerModel track by customer.name" >
                <a class="list-group-item"  ng-class-even="'striped'">
                    <h5 class="list-group-item-heading d-flex justify-content-between align-items-center"><% customer.name %><span class="badge "><% $index %></span></h5>
                    <small class="list-group-item-text"><i><% customer.address %> : <% customer.created %></i></small>
                </a>
            </div>
            <div class="animate-repeat" ng-if="(customers| filter:customerModel).length === 0">
                <a class="list-group-item list-group-item-danger"  ng-class-even="'striped'">
                    <h5 class="list-group-item-heading">No results found...</h5>
                </a>
            </div>
        </div>
        {{--<button class="btn btn-outline-success" id="back-to-top" type="button" ng-click = "scrollToTop()">Top</button>--}}
        {{--<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" ng-click="scrollToTop()" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><i class="fa fa-chevron-up"></i></a>--}}
        <a href="javascript:;" id="back-to-top" class="btn btn-primary btn-lg back-to-top" ng-click="scrollToTop()"><i class="fa fa-chevron-up"></i></a>
    </div>


@endsection

@section('footer')
    @include('layouts.footer')
@endsection