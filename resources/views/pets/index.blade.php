@extends('components.layout')

@section('content')
    <h1 class="text-center text-5xl font-extrabold">Pets</h1>
    <div class="flex justify-end">
        <a class="bg-blue-400 py-1 px-2 border rounded-xl mr-6" href="{{route('pet.create')}}">Add Pet</a>
    </div>

    @if(session('success'))
        <p class="text-center text-green-700 font-bold">{{ session('success') }}</p>
    @endif
    @if($errors->any())
        <p class="text-center text-red-500 font-bold">{{ $errors->first() }}</p>
    @endif

    <div class="flex justify-center">
        <table class="table-auto">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            @foreach($pets as $pet)
                <tr>
                    <td class="py-1 px-3">{{ $pet['id'] }}</td>
                    <td class="py-1 px-3">{{ $pet['name'] ?? '-' }}</td>
                    <td class="py-1 px-3">{{ $pet['status'] ?? '-' }}</td>
                    <td>
                        <a class="bg-green-400 py-1 px-2 border rounded-xl" href="{{ route('pet.edit', $pet['id']) }}">Edit</a>
                        <form method="POST" action="{{ route('pet.delete', $pet['id']) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 py-1 px-2 border rounded-xl" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
