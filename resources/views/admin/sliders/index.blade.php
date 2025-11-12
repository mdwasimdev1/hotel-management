@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Sliders</h2>
    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary mb-3">+ Add New Slider</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Status</th>
                <th width="200">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
            <tr>
                <td><img src="{{ asset('storage/' . $slider->image) }}" width="100"></td>
                <td>{{ $slider->title }}</td>
                <td>{{ $slider->subtitle }}</td>
                <td>
                    @if($slider->is_active)
                        <form action="{{ route('admin.sliders.toggle', $slider->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-success text-white btn btn-sm">Active</button>
                        </form>
                    @else
                        <form action="{{ route('admin.sliders.toggle', $slider->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-danger text-white btn btn-sm">Disabled</button>
                        </form>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this slider?');">
                        @csrf
                        @method('DELETE')
                        <button class="bg-danger text-white btn btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
