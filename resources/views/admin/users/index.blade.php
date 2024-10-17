@extends('layouts.app')

@section('admin')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12 ">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div  class="bg-secondary rounded h-100 p-4 mt-4">
                <div class="table-responsive  mt-4">
                    <table class="table table-bordered ">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->role_names))

                                <span class="badge bg-danger">{{ $user->role_names }}</span>

                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>

                                <!-- Replace Form::open and Form::submit with standard HTML form -->
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="row">

</div>





{!! $data->render() !!}

<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>

@endsection
