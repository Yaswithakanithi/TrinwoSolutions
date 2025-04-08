<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- ✅ Correct Font Awesome (Latest Version) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

    @include('partials.sidebar')

    <div class="main-content">
        @yield('content')
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    let dropdowns = document.querySelectorAll(".has-dropdown");

    dropdowns.forEach((dropdown) => {
        let link = dropdown.querySelector(".dropdown-toggle");
        let content = dropdown.querySelector(".dropdown-content");
        let icon = dropdown.querySelector(".dropdown-icon");

        link.addEventListener("click", function (e) {
            e.preventDefault();

         
            document.querySelectorAll(".dropdown-content").forEach((menu) => {
                if (menu !== content) menu.classList.remove("active");
            });

            document.querySelectorAll(".dropdown-icon").forEach((i) => {
                if (i !== icon) i.classList.remove("rotate");
            });

           
            content.classList.toggle("active");
            icon.classList.toggle("rotate");
        });
    });
});

</script>

</body>
</html>
