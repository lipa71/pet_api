@component('components.layout')
    @section('content')
        <div class="flex gap-2 justify-end m-2">
            <a href="" class="bg-blue-400 py-3 px-3 border-blue-400 rounded-xl">
                Logowanie
            </a>
            <a href="{{route('register')}}" class="bg-blue-400 py-3 px-3 border-blue-400 rounded-xl">
                Rejestracja
            </a>
        </div>
    @endsection
@endcomponent
