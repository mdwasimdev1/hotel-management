@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Slider</h2>

    <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $slider->title) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Subtitle</label>
            <input type="text" name="subtitle" value="{{ old('subtitle', $slider->subtitle) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Image</label><br>
            <img src="{{ asset('storage/' . $slider->image) }}" width="120" class="mb-2">
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ $slider->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$slider->is_active ? 'selected' : '' }}>Disabled</option>
            </select>
        </div>

        <button class="btn btn-success" type="submit">Update</button>
        <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
