@extends('layout.app')

@section('content')
    <div class='content'>
        <div class="card">
            <form class="form-horizontal" method="POST" action=""> {{ csrf_field() }}
                        
                <div class="form-group">
                    <label for="about" class="col-md-4 control-label">Bio</label>
                        <div class="col-md-12">
                            <textarea id="about" class="form-control" name="about">{{$user->about}}</textarea>
                        </div>
                </div>

                <input class="btn btn-info" type="submit" value="Edit">
            </form>
        </div>
    </div>
@endsection