@extends('backend.layout')
@section('dashboard')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <form class="form-horizontal" action="{{url('/admin/bookings/book')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Add new</strong> Booking</h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <p>Add information about your new floor, if you have the floor specified already then
                                    simple
                                    just
                                    navigate to the floors page and edit it's information. Please be notified whoever is
                                    editing information
                                    will be notified to the admin.</p>
                            </div>
                            <div class="panel-footer">
                                @if(session('booking'))
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span
                                                    aria-hidden="true">×</span><span class="sr-only">Close</span>
                                        </button>
                                        <strong>Success! </strong> {{session('booking')}}
                                    </div>
                                @endif
                            </div>
                            <div class="panel-footer">
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span
                                                    aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>                                            
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Customer</label>

                                    <div class="col-md-6 col-xs-12">
                                        <select id="select_customer" class="form-control sele" name="customer">
                                            @foreach($customers as $customer)
                                                <option value="{{$customer->id}}">{{$customer->name}}
                                                    - {{$customer->designation}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block">Select customer if not exists please create a new one from the right side block.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Room</label>

                                    <div class="col-md-6 col-xs-12">
                                        <select class="form-control select" name="room">
                                            @foreach($rooms as $room)
                                                <option value="{{$room->id}}">{{$room->type_name}} - {{$room->name}}
                                                    - Level {{ $room->level_no}}
                                                    - {{$room->rent}} {{config('app.currency','BDT')}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block">Enter the name the floor will be known as</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Check in date</label>
    
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" class="form-control datepicker" name="checkin_time" required>
                                        </div>
                                        <span class="help-block">Checkin date</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">How long expecting to stay</label>

                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span
                                                        class="fa fa-mobile-phone"></span></span>
                                            <input class="form-control" value="2" type="number" name="time_to_stay"/><label
                                                    class="label label-info">Days</label>
                                        </div>
                                        <span class="help-block">How long time customer wants to stay?</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Number Of People</label>

                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span
                                                        class="fa fa-male"></span></span>
                                            <input class="form-control" value="1" type="number" name="people"/>
                                        </div>
                                        <span class="help-block">How many adult people?</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Total Bill</label>

                                    <div class="col-md-6 col-xs-12">
                                        <span class="help-block" id="billing">Full Description about this floor..</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Amount paying</label>

                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span
                                                        class="fa fa-money"></span></span>
                                            <input class="form-control" type="number" name="amount" required/>
                                        </div>
                                        <span class="help-block">How much {{config('app.currency','BDT')}} customer wants to pay in advance?</span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">payment method</label>

                                    <div class="col-md-6 col-xs-12">
                                        <select class="form-control select" name="payment_method">
                                            <option value="Cash">Cash</option>
                                            <option value="Travellers Cheque">Travellers Cheque</option>
                                            <option value="Credit Card">Credit Card</option>
                                            <option value="Airline">Airline</option>
                                            <option value="Travel Agent">Travel Agent</option>
                                            <option value="Company">Company</option>
                                        </select>
                                        <span class="help-block">select payment method</span>
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
                <div class="col-md-6">
                    <form class="form-horizontal" action="{{url('/admin/customers')}}" method="post">
                        {{csrf_field()}} 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Add new</strong> Guest(Customer)</h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <p>Add information about incoming new Guests(customers) whose infomation is not stored on the
                                    database previously. If added then you can
                                    proceed to the booking section and select his/her information while booking or
                                    reserving
                                    rooms for him/her.</p>
                            </div>
                            <div class="panel-footer">
                                @if(session('success'))
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span
                                                    aria-hidden="true">×</span><span class="sr-only">Close</span>
                                        </button>
                                        <strong>Success! </strong> {{session('success')}}
                                    </div>
                                @endif
                            </div>

                            <div class="panel-body">                                
            
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Title</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <select class="form-control select" name="title">
                                                    <option value="Mr"><i class="fa fa-male"></i>Mr</option>
                                                    <option value="Mrs"><i class="fa fa-female"></i>Mrs</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="M/s">M/s</option>
                                                    <option value="Dr">Dr</option>
                                                </select>
                                                <span class="help-block">Guest's title</span>
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Name</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span
                                                                class="glyphicon glyphicon-user"></span></span>
                                                    <input type="text" class="form-control" placeholder="Guest name"
                                                           name="name" required/>
                                                </div>
                                                <span class="help-block">Guest's Full name</span>
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Email</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                                    <input type="text" class="form-control" placeholder="guest email address"
                                                           name="email" required/>
                                                </div>
                                                <span class="help-block">Guests's Email Address</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Phone Number</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-mobile-phone"></span></span>
                                                    <input type="text" class="form-control" placeholder="guest phone number"
                                                           name="phone" required/>
                                                </div>
                                                <span class="help-block">Guest's Phone Number</span>
                                            </div>
                                        </div>
                                        <!--
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
                                        </div> -->
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Date of birth</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                    <input type="text" class="form-control datepicker" name="date_of_birth">
                                                </div>
                                                <span class="help-block">Date of Birth</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Occupation</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-info"></span></span>
                                                    <input type="text" class="form-control" name="occupation"
                                                           placeholder="Occupation"/>
                                                </div>
                                                <span class="help-block">Customer Occupation</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Designation</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-info"></span></span>
                                                    <input type="text" class="form-control" name="designation"
                                                           placeholder="Designation"/>
                                                </div>
                                                <span class="help-block">Customer Designation</span>
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Nationality</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <select class="form-control select" name="nationality">
                                                    @foreach ($countries as $key=>$country)
                                                        <option value="{{$country}}" @if($country == old('country')) selected @endif>{{$country}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="help-block">select your gender, if not listed please select 'Other'</span>
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Registered On</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                    <input type="text" class="form-control datepicker" value="2021-11-01">
                                                </div>
                                                <span class="help-block">**It's just to show that your registration date is stored, user input won't work here.. :)</span>
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Full Address</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" rows="5" name="address" required></textarea>
                                                <span class="help-block">Customer Full Address here</span>
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Gender</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <select class="form-control select" name="gender">
                                                    <option value="male"><i class="fa fa-male"></i>Male</option>
                                                    <option value="female"><i class="fa fa-female"></i>Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                                <span class="help-block">select your gender, if not listed please select 'Other'</span>
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Id Type</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <select class="form-control select" name="id_type">
                                                    <option value="passport"><i class="fa fa-male"></i>passport</option>
                                                    <option value="national_id"><i class="fa fa-female"></i>national id</option>
                                                    <option value="drivers_licence">drivers licence</option>
                                                </select>
                                                <span class="help-block">select type of identification</span>
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Id Number</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-info"></span></span>
                                                    <input type="text" class="form-control" name="id_number"
                                                           placeholder="Id number"/>
                                                </div>
                                                <span class="help-block">Id number</span>
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Place of Issue</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-info"></span></span>
                                                    <input type="text" class="form-control" name="id_place_of_issue"
                                                           placeholder="id place of issue"/>
                                                </div>
                                                <span class="help-block">Id place of issue</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Id expiry date</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                    <input type="text" class="form-control datepicker" name="id_expiry_date">
                                                </div>
                                                <span class="help-block">when is id expiring</span>
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Photo of ID</label>
            
                                            <div class="col-md-6 col-xs-12">
                                                <input type="file" class="fileinput btn-primary" name="proof" id="filename"
                                                       title="Browse file"/>
                                                <span class="help-block">ID card's image file with owner's image.</span>
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

    </div>
@stop

@push('custom-scripts')
<script>
    $(document).ready(function(){
        $("#select_customer").select2();
    }) 
</script>
    
@endpush
