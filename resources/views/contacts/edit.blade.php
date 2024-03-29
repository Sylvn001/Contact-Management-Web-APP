@extends('contacts.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Contact</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a>

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



    <form action="{{ route('contacts.update',$contact->id) }}" method="POST">

        @csrf

        @method('PUT')



         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 my-2">

                <div class="form-group">

                    <strong>Name:</strong>

                    <input type="text" name="name" value="{{ $contact->name }}" class="form-control" placeholder="Name">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                <div class="form-group">
                    <strong>Contact:</strong>
                    <input class="form-control" type="text" name="contact" placeholder="Contact" value={{ $contact->contact }}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                <div class="form-group">
                    <strong>email:</strong>
                    <input class="form-control" type="email" name="email" placeholder="Email" value={{ $contact->email }}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>



    </form>

@endsection
