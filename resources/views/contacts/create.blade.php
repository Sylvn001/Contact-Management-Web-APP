@extends('contacts.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Contact</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary my-2" href="{{ route('contacts.index') }}"> Back </a>
        </div>
    </div>
</div>



@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<form action="{{ route('contacts.store') }}" method="POST">

    @csrf



     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 my-2">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 my-2">
            <div class="form-group">
                <strong>Contact:</strong>
                <input type="text" name="contact" class="form-control" placeholder="Contact">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 my-2">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>



</form>

@endsection
