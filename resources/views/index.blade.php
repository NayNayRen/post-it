<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    {{-- USE FOR HTML COMPLIANCE IF PERSONAL ICON NOT USED --}}
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <title>Register</title>
</head>

<body>
    <main class="main">
        @include('includes._flash_message')
        <div class="user-container">
            @auth
                <h1>Hello {{ ucfirst(auth()->user()->first_name) }}</h1>
                {{-- LOG OUT --}}
                <form class="logout-form" action={{ route('user.logout') }} method="POST">
                    @csrf
                    <input class="button" type="submit" value="Log Out">
                </form>
                <span>or...</span>
                <h1>Create a Post</h1>
                {{-- CREATE POST --}}
                <form class="post-form" action={{ route('post.create') }} method="POST">
                    @csrf
                    <div>
                        <label for="title">Title</label><br>
                        <input class="form-input" type="text" name="title" placeholder="Post Title">
                        @error('title')
                            <span class="form-input-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="body">Body</label><br>
                        <textarea name="body" cols="40" rows="10"></textarea>
                        @error('body')
                            <span class="form-input-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input class="button" type="submit" value="Create Post">
                    <a href={{ route('posts.all', auth()->user()->id) }}>Your Posts</a>
                </form>
                <h1>Delete Yourself</h1>
                {{-- DELETE USER --}}
                <form class="delete-form" action={{ route('user.delete', auth()->user()->id) }} method="POST">
                    @csrf
                    @method('DELETE')
                    <span class="deletion-disclaimer">Provide your email below to remove yourself.</span>
                    <br>
                    <div>
                        <label for="deletion_email">Email</label><br>
                        <input class="form-input" type="email" name="deletion_email" placeholder="Email"
                            value="{{ old('deletion_email') }}">
                        @error('deletion_email')
                            <span class="form-input-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input class="button" type="submit" value="! Delete User !">
                </form>
            @else
                <h1>New User</h1>
                {{-- CREATE USER --}}
                <form class='register-form' action={{ route('user.create') }} method="POST">
                    @csrf
                    <div>
                        <label for="first_name">First Name</label><br>
                        <input class="form-input" type="text" name="first_name" placeholder="First Name"
                            value="{{ old('first_name') }}">
                        @error('first_name')
                            <span class="form-input-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="last_name">Last Name</label><br>
                        <input class="form-input" type="text" name="last_name" placeholder="Last Name"
                            value="{{ old('last_name') }}">
                        @error('last_name')
                            <span class="form-input-error">{{ $message }}</span>
                        @enderror
                    </div>
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
                    <div>
                        <label for="password_confirmation">Confirm Password</label><br>
                        <input class="form-input" type="password" name="password_confirmation"
                            placeholder="Confirm Password">
                    </div>
                    <input class="button" type="submit" value="Register">
                </form>
                <span>or...</span>
                <a class="button-link" href={{ route('user.showLoginForm') }}>Log In</a>
            @endauth
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
