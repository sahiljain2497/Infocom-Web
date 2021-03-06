@extends('layouts.coordinator')

@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">WELCOME</h1>
        </div>
        <hr/>
    @if($status)
    <form method="POST" action="{{route('coordinator.home.update',$data->id)}}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
    @else
    <form method="POST" action="{{route('coordinator.home.store')}}">
        {{ csrf_field() }}
        {{ method_field('POST') }}
    @endif
        <div class="row">
            <div class="col-sm-3 label-div">
                <label>Circle :</label>
            </div>
            <div class="col-sm-9">    
                <select id="circle" name="circle" class="form-control" {{!empty($data) ? 'readonly' : ''}}>
                    @if(!empty($data))
                        @foreach($circles as $circle)
                            @if($data->circle === $circle->region)
                            <option>
                                {{$circle->region}}
                            </option>
                            @endif
                        @endforeach
                    @else
                        @foreach($circles as $circle)
                            <option>
                                {{$circle->region}}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('circle'))
                    <span style="color:red">{{$errors->first('circle')}}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 label-div">
                <label>Manager :</label>
            </div>
            <div class="col-sm-9">    
                <input id="manager" class="form-control" name="manager" value="{{ !empty($data) ? $data->manager : ''}}" {{ !empty($data) ? 'readonly' :''}} />
                @if($errors->has('manager'))
                    <span style="color:red">{{$errors->first('manager')}}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 label-div">
                <label>Date : </label>
            </div>
            <div class="col-sm-9">
                <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" readonly/>
                @if($errors->has('date'))
                    <span style="color:red">{{$errors->first('date')}}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 label-div">
                <label>project : </label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="project" value="{{ $status ? $data->project : '' }}" {{ $status ? 'readonly' : '' }} >
                @if($errors->has('project'))
                    <span style="color:red">{{$errors->first('project')}}</span>
                @endif
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