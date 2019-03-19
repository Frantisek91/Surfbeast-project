@if (Session::has('success_message'))
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>    
@endif



@if (Session::has('delete_message'))
    <div class="alert alert-danger">
        {{ Session::get('delete_message') }}
    </div>
@endif