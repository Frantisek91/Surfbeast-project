<form method="post" action="{{ action("AgencyController@update", $agency->id) }}">
    
    @csrf
    {{ method_field('PUT') }}

    <div class="form-group">
        <label>Agency:</label>
    <input type="text" name="name" value="{{ $agency->name }}">
    </div><br>
        
    <div class="form-group">
        <label>Adress:</label>
        <input type="text" name="adress" value="{{ $agency->adress }}">
    </div><br>

    <div class="form-group">
        <label>About:</label>
        <textarea name="about" id="" cols="30" rows="10">{{ $agency->about }}</textarea>
    </div><br>
    
    <button type="submit" class="btn btn-primary">Edit agency</button>

</form>