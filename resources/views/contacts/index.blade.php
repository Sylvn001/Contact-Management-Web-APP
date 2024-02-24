@extends('contacts.layout')



@section('content')

@auth
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Contacts List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary my-2" href="{{ route('contacts.create') }}"> Create New Contact</a>
            </div>
        </div>
    </div>
@endauth


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>

            <th>ID</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($contacts as $contact)

        <tr>

            <td>{{ ++$i }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->contact }}</td>

            <td>

                <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('contacts.show',$contact->id) }}">Show</a>
                    @auth
                        <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    @endauth
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $contacts->links() !!}

@endsection
