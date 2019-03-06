<form method="post" action="{{ action("TermsController@store") }}">
    @csrf

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
        <input type="date" name="start">
    </div><br>

    <div class="form-group">
        <label>End date:</label>
        <input type="date" name="end">
    </div><br>

    <div class="form-group">
        <label>Price:</label>
        <input type="number" name="price">
    </div><br>

    <button type="submit" class="btn btn-primary">Add terms</button>

</form>