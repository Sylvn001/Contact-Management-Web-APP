<!DOCTYPE html>

<html>

<head>

    <title>Contacts</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>



<div class="container">

<div class="py-12 mb-2">
    @auth
        <div class="max-w-7xl">
            <div class="bg-primary p-4">
                <div class=" text-white">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button  :href="route('logout')"
            class="btn btn-dark"
                onclick="event.preventDefault();
                this.closest('form').submit();">
            {{ __('Log Out') }}
            </button>
        </form>
    @else
    <a href="{{ route('login') }}" class="btn btn-primary my-2">Log in</a>

    @endauth

    @yield('content')

</div>



</body>

</html>
