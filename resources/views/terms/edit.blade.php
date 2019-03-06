<form method="post" action="{{ action("TermsController@update", $term->id) }}">
    
    @csrf
    {{ method_field('PUT') }}

    <div class="form-group">
        <label>Camp:</label>
        <select name="camp_id">
                
            @foreach ($camps as $camp)
                <option value="{{ $camp->id }}">{{ $camp->description }}</option>    
            @endforeach

        </select>
    </div><br>

    <div class="form-group">
        <label>Start date:</label>
    <input type="date" name="start" value="{{ $term->start }}">
    </div><br>

    <div class="form-group">
        <label>End date:</label>
        <input type="date" name="end" value="{{ $term->end }}">
    </div><br>

    <div class="form-group">
        <label>Price:</label>
        <input type="number" name="price" value="{{ $term->price }}">
    </div><br>

    <button type="submit" class="btn btn-primary">Edit terms</button>

</form>