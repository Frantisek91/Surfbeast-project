<label>Destination:</label>
<select name="destination" id="">
    
    @foreach ($destinations as $destination)
        <option value="{{ $destination->id }}">{{ $destination->name }}</option>    
    
    @endforeach
</select>

@foreach ($destination_camps as $camp)

<p>{{ $camp->description }}</p>
    
@endforeach