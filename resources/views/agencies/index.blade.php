@foreach ($agencies as $agency)
        
    <h2>{{ $agency->name }}</h2>

    <h4>{{ $agency->adress }}</h4>

    <p>{{ $agency->about }}</p>

@endforeach
