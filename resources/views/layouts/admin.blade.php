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

<body class="antialiased text-gray-700 tap-highlight-transparent">
    <x-adminNavbar />
    <x-adminSidebar />
    <main class="
        lg:pl-[15rem]
        pt-[56px]
        lg:pt-0
        after:content-['']
        after:fixed
        after:top-0
        after:left-0
        after:w-full
        after:h-full
        after:bg-black/50
        after:transform
        after:translate-x-full
        after:transition
        after:ease-in-out
        lg:after:translate-x-full
        overflow-x-hidden
      " id="content">
        @yield('content')
    </main>
</body>

<script>
    function rootController() {
      const sidebar = document.querySelector("aside#sidebar");
      const content = document.querySelector("main#content");

      document.addEventListener("click", () => {
        if (!sidebar.classList.contains("-translate-x-full")) {
          sidebar.classList.add("-translate-x-full");
        }
        if (content.classList.contains("after:translate-x-1/2")) {
          content.classList.replace(
            "after:translate-x-1/2",
            "after:translate-x-full"
          );
        }
      });
    }
    rootController();
</script>

<script>
    function sidebarController() {
      const menu = document.querySelector("nav button#menu");
      const menuSidebar = document.querySelector("aside button#menuSidebar");
      const sidebar = document.querySelector("aside#sidebar");
      const content = document.querySelector("main#content");

      menu.addEventListener("click", (e) => {
        e.stopPropagation();
        sidebar.classList.toggle("-translate-x-full");
        content.classList.replace(
          "after:translate-x-full",
          "after:translate-x-1/2"
        );
      });
      menuSidebar.addEventListener("click", (e) => {
        e.stopPropagation();
        content.classList.replace(
          "after:translate-x-1/2",
          "after:translate-x-full"
        );
        sidebar.classList.toggle("-translate-x-full");
      });
      sidebar.addEventListener("click", (e) => e.stopPropagation());
    }
    sidebarController();
</script>

@yield('script')

</html>
