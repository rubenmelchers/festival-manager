@if($flash = session('message'))

    <div class="alert alert-success" role="alert">
        {{ $flash }}
    </div>

@endif

@if($flash = session('message-error'))
    <div class="alert alert-danger" role="alert">
        {{ $flash }}
    </div>
@endif
