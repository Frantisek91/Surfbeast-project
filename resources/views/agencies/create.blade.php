<form method="post" action="{{ action("AgencyController@store") }}">
    @csrf

    <div class="form-group">
        <label>Agency:</label>
        <input type="text" name="name">
    </div><br>
        
    <div class="form-group">
        <label>Adress:</label>
        <input type="text" name="adress">
    </div><br>

    <div class="form-group">
        <label>About:</label>
        <textarea name="about" id="" cols="30" rows="10"></textarea>
    </div><br>
    
    <button type="submit" class="btn btn-primary">Add agency</button>

</form>