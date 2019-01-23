@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as <strong>EMPLOYEE</strong>!
                    <br>
                    <br>
                    <h2>Laides</h2>
                    <ul>
                    @foreach($clients as $client)
                        <li>{{ $client->username }}
                            <form action="{{route('employee.message.create')}}" method="POST">
                            @csrf
                                <textarea rows="4" cols="30" name="text"></textarea>
                                <input type="hidden" name="client_id" value="{{ $client->id }}">
                                <input type="hidden" name="employee_id" value="{{ Auth::id() }}">
                                <input type="submit" value="Send">
                            </form>
                        </li>
                    @endforeach
                    </ul>

                    <br>
                    <br>
                    <h2>Your Discussions</h2>
                    <ul>
                    @foreach($employee->discussion as $discussion)
                        <li>{{ $discussion->client->username }}</li>
                    @endforeach
                    </ul>
                    <h2>Upload Photo</h2>
                    <form action="{{ route('employee.photo.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <input type="file" name="photo">
                        <input type="hidden" name="employee_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="private" value="0">
                        <input type="submit" value="Upload">
                    </form>

                    <h2>Your Photos</h2>

                    @foreach($employee->employeePhoto as $photo)
                        <img src="{{ $photo->url }}" height="200px" width="200px">
                    @endforeach
                    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
