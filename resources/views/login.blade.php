<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    {{-- USE FOR HTML COMPLIANCE IF PERSONAL ICON NOT USED --}}
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <title>Log In</title>
</head>

<body>
    <main class="main">
        @include('includes._flash_message')
        <h1>Log In</h1>
        <div class="user-container">
            <form class="login-form" action={{ route('user.login') }} method="POST">
                @csrf
                <div>
                    <label for="email">Email</label><br>
                    <input class="form-input" type="email" name="email" placeholder="Email"
                        value="{{ old('email') }}">
                    @error('email')
                        <span class="form-input-error">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password">Password</label><br>
                    <input class="form-input" type="password" name="password" placeholder="Password">
                    @error('password')
                        <span class="form-input-error">{{ $message }}</span>
                    @enderror
                </div>
                <input class="button" type="submit" value="Log In">
            </form>
            <span>or...</span>
            <a class="button-link" href={{ route('user.index') }}>Home</a>
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
