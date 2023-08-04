@if(session('notification'))
    <div class="alert alert-warning text-small">
        {{session('notification')}}
    </div>
@endif
