@extends('components.layout')

@section('content')
    <h1 class="text-center text-5xl font-extrabold">Edit pet</h1>
    <form method="POST" action="{{ route('pet.update', $pet['id']) }}">
        @csrf
        @method('PUT')
        <div class="flex justify-center gap-2 mt-6">
            <label for="name">Name:</label>
            <input class="bg-blue-400 rounded-md" type="text" name="name" id="name" value="{{ $pet['name'] }}" required>
        </div>
        <div class="flex justify-center gap-2 mt-2">
            <label for="status">Status:</label>
            <select class="bg-blue-400 rounded-md" name="status" id="status">
                @foreach(['available', 'pending', 'sold'] as $status)
                    <option value="{{ $status }}" {{ $status == $pet['status'] ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-center mt-6">
            <button type="submit" class="bg-blue-400 py-1 px-2 border rounded-xl mr-6" href="{{route('pet.create')}}">Update</button>
        </div>
    </form>
@endsection
