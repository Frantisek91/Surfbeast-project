<h4>Zjisti obsazenost a naplánuj si výlet svých snů!</h4>

<form method="post" action="{{ action("InquiryController@store") }}">
    @csrf

    <div class="form-group">
        <label>Jméno:</label>
        <input type="text" name="f_name">
    </div><br>

    <div class="form-group">
        <label>Příjmení:</label>
        <input type="text" name="l_name">
    </div><br>
        
    <div class="form-group">
        <label>E-mail:</label>
        <input type="email" name="email">
    </div><br>

    <div class="form-group">
        <label>Tel.:</label>
        <input type="tel" name="phone">
    </div><br>

    <div class="form-group">
        <label>Zpráva pro cestovní kancelář/agenturu:</label>
        <textarea name="about" id="" cols="30" rows="10"></textarea>
    </div><br>
    
    <button type="submit" class="btn btn-primary">Odeslat</button>

</form>