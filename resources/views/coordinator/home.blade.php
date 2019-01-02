@extends('layouts.coordinator')

@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">WELCOME</h1>
        </div>
        <hr/>
    @if($status)
    <form method="POST" action="{{route('home.update',$data->id)}}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
    @else
    <form method="POST" action="{{route('home.store')}}">
        {{ csrf_field() }}
        {{ method_field('POST') }}
    @endif
        <div class="row">
            <div class="col-sm-3 label-div">
                <label>Circle :</label>
            </div>
            <div class="col-sm-9">    
                <select id="circle" name="circle" class="form-control" >
                    @if(!empty($data))
                        @foreach($circles as $circle)
                            <option {{$data->circle == $circle->region? 'selected':'' }}>
                                {{$circle->region}}
                            </option>
                        @endforeach
                    @else
                        @foreach($circles as $circle)
                            <option>
                                {{$circle->region}}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 label-div">
                <label>Manager :</label>
            </div>
            <div class="col-sm-9">    
                <input id="manager" class="form-control" name="manager" value="{{ !empty($data) ? $data->manager : ''}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 label-div">
                <label>Date : </label>
            </div>
            <div class="col-sm-9">
                <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" readonly/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 label-div">
                <label>project : </label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="project" value="{{ $status ? $data->project : '' }}" {{ $status ? 'readonly' : '' }} >
            </div>
        </div>
        @if(empty($data->timeout))
            @if(!$status)
            <div class="row text-center">
                <div class="col-sm-12">
                <input type="submit" class="btn btn-lg btn-primary check-btn" value="CHECK IN" />
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-sm-3 label-div">
                    <label>Timein : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{$data->created_at}}" readonly>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-primary check-btn" value="CHECK OUT" />
                </div>
            </div>
            @endif
        @else
            <hr/>
            <p class="text-center">ALREADY CHECKED OUT IN FOR TODAY. CONTACT ADMIN FOR FURTHER CHANGES.</p>
        @endif
        </form>
    </div>
@endsection