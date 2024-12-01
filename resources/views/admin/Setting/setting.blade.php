@extends('admin.layouts.app')

@section('content')
<style>
    
    .form-container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 20px;
        max-width: 800px;
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
        max-width: 100px;
        height: auto;
        border-radius: 5px;
    }
</style>

<div class="container">
    <h1>Business Setting</h1>
    <div class="form-container">
        <form action="{{ route('setting.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                @foreach ($settings as $key => $setting)
                    <div class="col-6">
                        <label for="{{ $key }}">{{ ucwords(str_replace('_', ' ', $key)) }}:</label>
                        @if ($key === 'button_color' || $key === 'button_bg' || $key === 'body_bg'|| $key === 'footer_bg'|| $key === 'header_bg' || $key === 'header_activecolor' || $key === 'hover_active_color')
                            <input type="color" id="{{ $key }}" name="{{ $key }}" value="{{ $setting->value }}" required>
        
                        @elseif (in_array($key, ['footer_logo', 'banner_image', 'about_image', 'social_img1']))
                            <input type="file" id="{{ $key }}" name="{{ $key }}" accept="image/*" onchange="previewImage(event, '{{ $key }}')">
                            @if ($setting->value)
                                <img src="{{ asset('storage/service/' . $setting->value) }}" alt="Current {{ ucwords(str_replace('_', ' ', $key)) }}" class="profile-image" id="currentImage_{{ $key }}">
                            @endif
                            <img id="imagePreview_{{ $key }}" class="profile-image" style="display:none;"/>
                        @else
                            <input type="text" id="{{ $key }}" name="{{ $key }}" value="{{ $setting->value }}" required>
                        @endif
                    </div>
                @endforeach
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</div>

<script>
    function previewImage(event, key) {
        const file = event.target.files[0];
        const imagePreview = document.getElementById('imagePreview_' + key);
        const currentImage = document.getElementById('currentImage_' + key);

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
