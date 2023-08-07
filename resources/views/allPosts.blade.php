<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    {{-- USE FOR HTML COMPLIANCE IF PERSONAL ICON NOT USED --}}
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <title>All Your Posts</title>
</head>

<body>
    <main class="main">
        @include('includes._flash_message')
        <div class="user-container">
            <h1>{{ auth()->user()->first_name }}'s Posts</h1>
            @if ($posts === null || $posts->count() === 0)
                <h3>You haven't made a post yet.</h3>
            @else
                @foreach ($posts as $post)
                    <label for="title">- Title -</label><br>
                    <h3 name='title'>{{ $post->title }}</h3>
                    <label for="body">- Body -</label><br>
                    <p name='body'>{{ $post->body }}</p>
                    <a href={{ route('post.single', $post->id) }}>Edit</a>
                @endforeach
            @endif
            <a href={{ route('user.index') }}>Home</a>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // console.log('loaded');
            // FLASH MESSAGE DISPLAY WITH TIMER TO REMOVE
            // waits for 250ms then shows message
            setTimeout(() => {
                if ($(window).width() > 400) {
                    $('.flash-message').css('top', '150px');
                    $('.flash-message').css('opacity', '1');
                }
                if ($(window).width() <= 400) {
                    $('.flash-message').css('top', '20px');
                    $('.flash-message').css('opacity', '1');
                }
                // after displaying for 5000ms(5s) message hides itself
                setTimeout(() => {
                    $('.flash-message').css('top', '-100%');
                    $('.flash-message').css('opacity', '0');
                }, 5000);
            }, 250);
        });
    </script>
</body>

</html>
