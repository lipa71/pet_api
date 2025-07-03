@extends('components.layout')

@section('content')
    <h1 class="text-center text-5xl font-extrabold">Add pet</h1>
    <form method="POST" action="{{route('pet.store')}}">
        @csrf
        <div class="flex justify-center gap-2 mt-6">
            <label for="name">Name:</label>
            <input class="bg-blue-400 rounded-md" type="text" name="name" id="name" required>
        </div>
        <div class="flex justify-center gap-2 mt-2">
            <label for="status">Status:</label>
            <select class="bg-blue-400 rounded-md" name="status" id="status">
                <option value="available">available</option>
                <option value="pending">pending</option>
                <option value="sold">sold</option>
            </select>
        </div>

        <div class="flex justify-center mt-6">
            <button type="submit" class="bg-blue-400 py-1 px-2 border rounded-xl mr-6" href="{{route('pet.create')}}">Add</button>
        </div>
    </form>
@endsection
