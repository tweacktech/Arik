@extends('layouts.app', ['title' => 'Edit Profile'])


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pt-5">
                <div class="card">
              

                    <div class="card-body">
                        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Type:</strong> {{ Auth::user()->type }}</p>
                        <p><strong>status:</strong> @if( Auth::user()->status ==0) Inactive @else Active @endif</p>
                        <!-- Add more user information as needed -->

                        <hr>

                        <h4>Change Password</h4>
                        <form method="POST" action="{{ route('profile.changePassword') }}">
                            @csrf

                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="new_password_confirmation">Confirm New Password</label>
                                <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
