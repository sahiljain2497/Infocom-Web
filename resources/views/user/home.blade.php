@extends('layouts.user')

@section('content')
    <div class="container">
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
            <div class="col-sm-6">
                <label>Circle :</label>
            </div>
            <div class="col-sm-6">    
                <select id="circle" name="circle" >
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
            <div class="col-sm-6">
                <label>Manager :</label>
            </div>
            <div class="col-sm-6">    
                <input id="manager" name="manager" value="{{ !empty($data) ? $data->manager : ''}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Date : </label>
            </div>
            <div class="col-sm-6">
                <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>project : </label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="project" value="{{ $status ? $data->project : '' }}" {{ $status ? 'readonly' : '' }} >
            </div>
        </div>
        @if(empty($data->timeout))
            @if(!$status)
            <input type="submit" class="btn btn-lg btn-primary" value="check-in" />
            @else
            <div class="row">
                <div class="col-sm-6">
                    <label>Timein : </label>
                </div>
                <div class="col-sm-6">
                    <input type="text" value="{{$data->created_at}}" readonly>
                </div>
            </div>
            <input type="submit" class="btn btn-lg btn-primary" value="check-out" />
            @endif
        @else
            <p>you have checked out for today.Contact admin for further changes</p>
        @endif
        </form>
    </div>
@endsection