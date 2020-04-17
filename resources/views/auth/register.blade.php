@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading mt-5">Register</div>

                <div class="panel-body card mt-5">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Register as</label>

                            <div class="col-md-12">
                                <select name="role" class="form-control" id="role">
                                    <option value="">*Select*</option>
                                    <option value="Professional psychologist"> Professional psychologist </option>
                                    <option value="Anti-Depression organization"> Anti-Depression organization </option>
                                    <option value="Individual"> Individual </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label id="label" for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                                <label for="province" class="col-md-4 control-label">Province</label>
    
                                <div class="col-md-12">
                                    <select name="province" class="form-control">
                                        <option value="Gauteng"> Gauteng </option>
                                        <option value="Limpopo"> Limpopo </option>
                                        <option value="Free State"> Free State </option>
                                        <option value="Western Cape"> Western Cape </option>
                                        <option value="Eastern Cape"> Eastern Cape </option>
                                        <option value="North West"> North West </option>
                                        <option value="Northern Cape"> Northern Cape </option>
                                        <option value="Kwazulu Natal"> Kwazulu Natal </option>
                                        <option value="Mpumalanga"> Mpumalanga </option>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="about" class="col-md-4 control-label">Bio</label>
        
                            <div class="col-md-12">
                                <textarea id="about" class="form-control" placeholder="Tell us about you" name="about"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-info">
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
