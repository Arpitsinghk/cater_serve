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
    input, select, textarea {
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
    .profile-image {
        margin-top: 10px;
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }
</style>

<div class="container">
    <h1>Update Profile</h1>
    <div class="form-container">
        <form action="{{ route('user.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-6">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="col-6">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <!-- <div class="col-6">
                    <label for="role">Role:</label>
                    <input type="text" id="role" name="role" value="{{ $user->role }}" required>
                </div>
                <div class="col-6">
                    <label for="status">Status:</label>
                    <select id="status" name="status" required>
                        <option value="1" {{ $user->status == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $user->status == '0' ? 'selected' : '' }}>Pending</option>
                    </select>
                </div> -->
                <div class="col-6">
                    <label for="profile">Profile Image:</label>
                    <input type="file" id="profile" name="profile" accept="image/*" onchange="previewImage(event)">
                    @if($user->profile)
                        <img src="{{ asset('storage/profiles/' . $user->profile) }}" width="100px" height="100px" alt="Current Profile Image" class="profile-image" id="currentImage">
                    @endif
                    <img id="imagePreview" class="profile-image" width="100px" height="100px" style="display:none;"/>
                </div>
                <div class="col-12">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4">{{ $user->description }}</textarea>
                </div>
            </div>

            <button type="submit">Update Profile</button>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const imagePreview = document.getElementById('imagePreview');
        const currentImage = document.getElementById('currentImage');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Show the new image preview

                // Hide the current image
                if (currentImage) {
                    currentImage.style.display = 'none'; // Optionally hide the current image
                }
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '';
            imagePreview.style.display = 'none'; // Hide the image preview
        }
    }
</script>

@endsection
