<div class="col-md-12 col-sm-12 ">
    @if(session('status')==="error")
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
    @elseif (session('status')==="success")
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
</div>
