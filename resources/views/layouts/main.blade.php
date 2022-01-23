<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'RestEat')</title>

    <!-- google fonts : start -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- material icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" />

    <!-- Nunito -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Fredericka_the_Great -->
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet" />

    <!-- Merienda -->
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&display=swap" rel="stylesheet" />
    <!-- google fonts : end -->

    <!-- Styles : start -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Styles : end -->

    <!-- custom style : start -->
    <style>
        html {
            scroll-behavior: smooth;
        }
        .tap-highlight-transparent {
            -webkit-tap-highlight-color: transparent;
        }
    </style>
    <!-- custom style : end -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('head')
</head>

<body class="antialiased font-['Merienda'] text-gray-700 tap-highlight-transparent">
    {{-- @include('components.navbar') --}}
    <x-navbar :categories="$gCategories" />
    {{-- @include('components.sidebar') --}}
    <x-sidebar :categories="$gCategories" />
    @yield('content')
    {{-- @include('components.footer') --}}
    <x-footer />

    {{-- logout --}}
    <form action="{{ route('logout') }}" method="post" class="hidden" id="logoutForm">
        @csrf
    </form>
</body>

<script>
    // sidebar controller
    const menu = document.getElementById("menu");
    const sidebar = document.querySelector("aside#sidebar");

    menu.addEventListener("click", (e) => {
      e.stopPropagation();
      if (sidebar.classList.contains("-translate-x-full")) {
        sidebar.classList.remove("-translate-x-full");
      } else {
        sidebar.classList.add("-translate-x-full");
      }
    });

    sidebar.addEventListener("click", (e) => {
      e.stopPropagation();
    });
</script>

<script>
    // Root script
    document.addEventListener("click", (e) => {
      // close dropdown
      const dropdowns = document.querySelectorAll(".dropdown");
      dropdowns.forEach((dropdown) => {
        const items = dropdown.querySelector(".dropdown-items");
        items.classList.add("hidden");
      });

      // close sidebar
      const sidebar = document.querySelector("aside#sidebar");
      if (!sidebar.classList.contains("-translate-x-full")) {
        sidebar.classList.add("-translate-x-full");
      }
    });
</script>

<script>
    // dropdown
    const dropdowns = document.querySelectorAll(".dropdown");
    dropdowns.forEach((dropdown) => {
      const trigger = dropdown.querySelector(".dropdown-trigger");
      const items = dropdown.querySelector(".dropdown-items");
      trigger.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        if (items.classList.contains("hidden")) {
          items.classList.remove("hidden");
        } else {
          items.classList.add("hidden");
        }
      });
      items.addEventListener("click", (e) => {
        e.stopPropagation();
      });
    });
</script>

<script>
    const logouts = document.querySelectorAll('#logout');
    const logoutForm = document.getElementById('logoutForm')

    logouts.forEach(logout => {
        logout.addEventListener('click', (e) => {
            e.preventDefault()
            e.stopPropagation()
            logoutForm.submit()
        })
    });
</script>

@yield('script')

</html>
