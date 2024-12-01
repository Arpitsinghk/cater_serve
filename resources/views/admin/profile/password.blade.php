@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    h1 {
        text-align: center;
        font-size: 36px;
        color: #4A90E2;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 20px;
    }
    .form-container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 20px;
        max-width: 600px;
        margin: 0 auto;
    }
    label {
        font-weight: bold;
        margin-top: 10px;
        display: block;
    }
    input {
        width: 100%;
        padding: 10px;
        margin: 5px 0 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        background-color: #4A90E2;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    button:hover {
        background-color: #357ABD;
    }
</style>

<div class="container">
    <h1>Change Password</h1>
    <div class="form-container">
        <form action="{{ route('admin.update.password', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="current_password">Current Password:</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>

            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Confirm New Password:</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
            </div>

            <button type="submit">Change Password</button>
        </form>
    </div>
</div>

@endsection
