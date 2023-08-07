@if (session()->has('flash-message'))
    <div class="flash-message">
        {{-- use format below to add line breaks in flash response --}}
        <p>{!! session('flash-message') !!}</p>
    </div>
@endif
