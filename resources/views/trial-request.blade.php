<x-app-layout>

    <head>
        <title>DueDeck - 21 Days Trial</title>
        <meta name="description"
            content="DueDeck is a cloud-based compliance automation software specially designed for accounting and compliance professionals to manage multiple tasks from a single dashboard.">
        @include('include.head')
    </head>

    <body>
        <header class="header">
            @include('include.header')
        </header>

        <main>
            <div class="container py-5">
                <!-- <img src="images/send-req.svg" alt="Send Request" class="img-fluid"> -->
                <div class="text-center mb-4">
                    <h1 class="heading-2">Submit your details and schedule your demo today</h1>
                    <!-- <p class="font-medium">Input your details and sign up.</p> -->
                </div>
                @livewire('demoform')
            </div>

            <!-- FOOTER -->
            <footer class="footer">
                @include('include.footer')
</x-app-layout>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function name(params) {
        Swal.fire({
            title: 'Custom animation with Animate.css',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
    }
</script>
</footer>
</main>
</body>

</html>
