<form method="post" action="{{ action("CampController@update", $camp->id) }}">
    
    @csrf
    {{ method_field('PUT') }}

    <div class="form-group">
        <label>Agency:</label>
        <select name="agency_id">

            <option value="{{ $camp->agency->id }}">{{ $camp->agency->name }}</option>    
                
        </select>
    </div><br>

    <div class="form-group">
        <label>Destination:</label>
        <select name="destination_id">
            
            <option value="{{ $camp->destination->id }}">{{ $camp->destination->name }}</option>
                
        </select>
      </div><br>
  
      <div class="form-group">
          <label>Description</label>
          <textarea name="description" id="" cols="30" rows="10">{{ $camp->description }}</textarea>
      </div><br>
  
      <button type="submit" class="btn btn-primary">Edit camp</button>

</form>