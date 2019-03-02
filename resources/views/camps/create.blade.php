<form method="post" action="{{ action("CampController@store") }}">
    @csrf

    <div class="form-group">
        <label>Agency:</label>
        <select name="agency_id">
                
            @foreach ($agencies as $agency)
                <option value="{{ $agency->id }}">{{ $agency->name }}</option>    
                
            @endforeach
        </select>
    </div><br>

    <div class="form-group">
        <label>Destination:</label>
        <select name="destination_id">
                
            @foreach ($destinations as $destination)
                <option value="{{ $destination->id }}">{{ $destination->name }}</option>    
                
            @endforeach
        </select>
      </div><br>
  
      <div class="form-group">
          <label>Description</label>
          <textarea name="description" id="" cols="30" rows="10"></textarea>
      </div><br>
  
      <button type="submit" class="btn btn-primary">Add camp</button>

</form>