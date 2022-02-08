<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amazing Ebook - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="antialiased">
    @include('_banner')
    <div class="min-h-screen bg-gray-100">
        <div class="bg-blue-500">
          <div class="flex items-center justify-between max-w-7xl mx-auto">
            <div class="py-10 text-3xl font-bold text-white">
                Amazing Ebook
            </div>
  
            @if(Session::get('user'))
              <div class="text-white text-right font-semibold">
                <span class="block">Welcome, {{ Session::get('user')->first_name }}</span>
                <a href="/auth/logout" class="cursor inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Logout
                </a>
              </div>
            @else
              <div>
                <a href="/auth/register" class="cursor inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Sign Up
                </a>
    
                <a href="/auth/login" class="cursor inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Login
                </a>
              </div>
            @endif
          </div>
        </div>

        @if (Session::get('user'))
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                            <a href="/" class="{{Route::currentRouteName() == 'home'  ? 'border-indigo-500 border-b-2' : '' }} hover:text-blue-500 text-gray-900 inline-flex items-center px-1 pt-1 text-sm font-medium" aria-current="page">Home</a>
                            <a href="/contact" class="{{Route::currentRouteName() == 'contact'  ? 'border-indigo-500 border-b-2' : '' }} hover:text-blue-500 border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 text-sm font-medium" aria-current="page">Cart</a>
                            <a href="/contact" class="{{Route::currentRouteName() == 'contact'  ? 'border-indigo-500 border-b-2' : '' }} hover:text-blue-500 border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 text-sm font-medium" aria-current="page">Profile</a>
                            
                            @if(Session::get('user')->role_id == 1)
                              <a href="/contact" class="{{Route::currentRouteName() == 'contact'  ? 'border-indigo-500 border-b-2' : '' }} hover:text-blue-500 border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 text-sm font-medium" aria-current="page">Account Maintenance</a>
                            @endif
                          </div>
                    </div>
                </div>
            </div>
        </nav>
        @endif

        <div class="py-10">
            <header class="mb-4">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold leading-tight text-gray-900">
                        @yield('header')
                    </h1>
                </div>
            </header>
            <main>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        
    </script>
</body>
</html>
