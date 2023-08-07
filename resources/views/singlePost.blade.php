<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    {{-- USE FOR HTML COMPLIANCE IF PERSONAL ICON NOT USED --}}
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <title>Edit Your Post</title>
</head>

<body>
    <main class="main">
        @include('includes._flash_message')
        <div class="user-container">
            <h1>Edit Your Post</h1>
            <label for="current_title">- Current Title -</label><br>
            <h3 name='current_title'>{{ $post->title }}</h3>
            <label for="current_body">- Current Body -</label>
            <p name='current_body'>{{ $post->body }}</p>
            <a href={{ route('user.index') }}>Home</a>
            {{-- EDIT POST FORM --}}
            <form class="edit-form" action={{ route('post.edit', $post->id) }} method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="title">New Title</label><br>
                    <input class="form-input" type="text" name="title" placeholder="New Title">
                    @error('title')
                        <span class="form-input-error">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="body">New Body</label><br>
                    <textarea name="body" cols="40" rows="10"></textarea>
                    @error('body')
                        <span class="form-input-error">{{ $message }}</span>
                    @enderror
                </div>
                <input class="button" type="submit" value="Update">
            </form>
            {{-- DELETE POST FORM --}}
            <form class="delete-form" action={{ route('post.delete', $post->id) }} method='POST'>
                @csrf
                @method('DELETE')
                <input class='button' type="submit" value="Delete Post">
            </form>
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
