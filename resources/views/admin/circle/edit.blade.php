@extends('layouts.admin')

@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">EDIT CIRCLE</h1>
        </div>
        <hr/>
        @if(Session::has('update-message'))
        <div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('update-message')}}</strong>
        </div>
        @endif
        <div class="form-container">
            <form method="POST" action="{{route('circle.update',$data->id)}}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Circle</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="circle" value="{{$data->region}}" class="form-control" />
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12">
                        <input class="btn btn-primary" type="submit" value="SAVE CHANGES">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection('content')