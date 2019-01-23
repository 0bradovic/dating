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

                    You are logged in as <strong>CLIENT</strong>!
                    <br>
                    <br>
                    <h2>Laides</h2>
                    <ul>
                    @foreach($employees as $employee)
                        <li>{{ $employee->username }}
                            <form action="{{route('client.message.create')}}" method="POST">
                            @csrf
                                <textarea rows="4" cols="30" name="text"></textarea>
                                <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                <input type="hidden" name="client_id" value="{{ Auth::id() }}">
                                <input type="submit" value="Send">
                            </form>
                        </li>
                    @endforeach
                    </ul>

                    <br>
                    <br>
                    <h2>Your Discussions</h2>
                    <ul>
                    @foreach($client->discussion as $discussion)
                        <li>{{ $discussion->employee->username }}</li>
                    @endforeach
                    </ul>
                    <h2>Upload Photo</h2>
                    <form action="{{ route('client.photo.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <input type="file" name="photo">
                        <input type="hidden" name="client_id" value="{{ Auth::id() }}">
                        <label for="private">Select this checkbox if your photo is gonna be private</label>
                        <input type="checkbox" name="private">
                        <input type="submit" value="Upload">
                    </form>
                    <h2>Your Photos</h2>
                    
                    @foreach($client->clientPhoto as $photo)
                        <img src="{{ $photo->url }}" height="200px" width="200px">
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
