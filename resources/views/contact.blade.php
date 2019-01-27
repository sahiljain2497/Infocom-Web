@extends('layouts.global')

@section('content')
<div class="container about-container">
    <form>
        <h5>Get in Touch with Us</h5>
        <br/>
        <div class="form-group">
           <label for="name">Name :</label>
            <input type="text" class="form-control" id="name">
        </div>
        <div class="form-group">
           <label for="email">Email :</label>
            <input type="text" class="form-control" id="email">
        </div>
        <div class="form-group">
           <label for="mobile">Mobile :</label>
            <input type="text" class="form-control" id="mobile">
        </div>
        <div class="form-group">
           <label>Message</label>
            <textarea class="form-control" rows="5"></textarea>
        </div>
        <button class="btn btn-success" style="width:250px">Send</button>
    </form>
</div>
@endsection