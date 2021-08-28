@if (session('sucess'))
    <div class="my-1 alert alert-success"
        style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; " role="alert">
        {{ session('sucess') }}
    </div>
@elseif (session('gagal'))
    <div class="my-1 alert alert-danger"
        style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; " role="alert">
        {{ session('gagal') }}
    </div>
@endif
