@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="background-color:#165599;">
                <div class="panel-heading" style="background-color:#a4afbc">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label"> <font color="white"> Name</font></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"><font color="white">E-Mail Address</font></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"><font color="white">Password</font></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label"><font color="white">Confirm Password</font></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

 <!--g--><div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label"><font color="white">Address</font></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



<!--g--><div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label"><font color="white">Phone</font></label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!--g--><div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label"><font color="white">Gender</font></label>

                            <div class="col-md-6">
                                <select  id="gender" class="form-control" name="gender" value="{{ old('gender') }}" required autofocus>
                 <option value="male">male</option>
                 <option value="female">female</option>
  
</select>
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


<div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label"><font color="white">Birth date</font></label>

                            <div class="col-md-6">
                                <input id="birthDate" type="date" class="form-control" name="birthDate" value="{{ old('birthDate') }}" required autofocus>

                                @if ($errors->has('birthDate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
  
<!--g<div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}">
                            <label for="birthDate" class="col-md-4 control-label">Birth date</label>

                            <div class="col-md-6">

<div id="birthDate" type="text" class="form-control" name="birthDate" required>
                                <select >
                                    @for($i=1;$i<=31;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                 
                                <select >
                                    @for($i=1;$i<=12;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>

                                <select >
                                    @for($i=1960;$i<=2018;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>

                                @if ($errors->has('birthDate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>-->
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
