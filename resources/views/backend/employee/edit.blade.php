@extends('backend.layout')
@section('dashboard')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="{{url('/admin/employee/edit/'.$user->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Update</strong> User</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>update employee.</p>
                        </div>
                        <div class="panel-footer">
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span
                                                aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <strong>Success! </strong> {{session('success')}}
                                </div>
                            @endif
                        </div>

                        <div class="panel-body">
                            {{--First name--}}
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">First Name</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" class="form-control" placeholder="Employee Name"
                                               name="fname" value="{{$user->firstname}}"/>
                                    </div>
                                    <span class="help-block">Employee First name</span>
                                </div>
                            </div>
                            {{--middle name--}}
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Middle Name</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" class="form-control" placeholder="Employee middle name"
                                               name="mname" value="{{$user->middlename}}"/>
                                    </div>
                                    <span class="help-block">Employee middle name</span>
                                </div>
                            </div>
                            {{--last name--}}
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Last Name</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" class="form-control" placeholder="Employee last name"
                                               name="lname" value="{{$user->lastname}}"/>
                                    </div>
                                    <span class="help-block">Employee last name</span>
                                </div>
                            </div>
                            {{--email--}}
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Email</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="text" class="form-control" placeholder="customer email address"
                                               name="email" value="{{$user->email}}"/>
                                    </div>
                                    <span class="help-block">Customer's Email Address</span>
                                </div>
                            </div>
                            {{--phone number--}}
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Phone Number</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-mobile-phone"></span></span>
                                        <input type="text" class="form-control" placeholder="customer phone number"
                                               name="phone" value="{{$user->phone}}"/>
                                    </div>
                                    <span class="help-block">Customer's Phone Number</span>
                                </div>
                            </div>
                            {{--password--}}
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Password</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                        <input type="password" class="form-control" name="password"
                                               placeholder="Password"/>
                                    </div>
                                    <span class="help-block">Password for customer access to his information</span>
                                </div>
                            </div>
                            {{--full address--}}
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Full Address</label>

                                <div class="col-md-6 col-xs-12">
                                    <textarea class="form-control" rows="5" name="address">{{$user->address}}</textarea>
                                    <span class="help-block">Customer Full Address here</span>
                                </div>
                            </div>
                            {{--gender--}}
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Gender</label>

                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control select" name="gender">
                                        <option value="male"><i class="fa fa-male"></i>Male</option>
                                        <option value="female"><i class="fa fa-female"></i>Female</option>
                                        <option>Other</option>
                                    </select>
                                    <span class="help-block">select your gender, if not listed please select 'Other'</span>
                                </div>
                            </div>
                            {{--ID--}}
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Proof of identity</label>

                                <div class="col-md-6 col-xs-12">
                                    <input type="file" class="fileinput btn-primary" name="proof" id="filename"
                                           title="Browse file"/>
                                    <span class="help-block">ID card's image file with owner's image.</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">activated</label>

                                <div class="col-md-6 col-xs-12">
                                    <label class="check"><input type="checkbox" class="icheckbox"
                                                                {{$user->active==1?'checked="checked"':""}} name="available"/>
                                        Yes</label>
                                    <span class="help-block">available</span>
                                </div>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button type="reset" class="btn btn-default">Clear Form</button>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
@stop