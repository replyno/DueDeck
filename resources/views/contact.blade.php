<title>Connect | DueDeck</title>
<meta name="description" content="Have a query, complaint, or suggestion? Feel free to connect with us or shoot us an email.">
<x-app-layout>
<head>
        @include('include.head')
</head>

<body onload="createCaptcha()">
    <header class="header">
        @include('include.header')
    </header>

    <main>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('images/contact.svg') }}" alt="contact" class="img-fluid" width="100%">
                </div>
                <div class="col-md-6">
                    <div class="card shadow h-100">
                        <div class="card-header p-3 bg-white font-14">
                            <div class="d-flex">
                                <span class="me-1 text-brand"><i class="bi bi-geo-alt-fill"></i></span>
                                <address> Office No 2, Jitendra Villa Nr. ICICI Bank Ghole Road,
                                    Shivaji Nagar, Pune - 411005</address>
                            </div>
                            <div class="d-flex mb-2">
                                <span class="me-1 text-brand"><i class="bi bi-telephone-fill"></i></span>
                                <span>+91 9011691169, +91 7769974289</span>
                            </div>
                            <div>
                                <span class="me-1 text-brand"><i class="bi bi-envelope-fill"></i></span>
                                <span>hello@duedeck.com</span>
                            </div>
                        </div>
                        @livewire('enquiry-form')
                    </div>
                </div>
            </div>


        </div>

        <!-- FOOTER -->
        <footer class="footer">
            @include('include.footer')
        </x-app-layout>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                (() => {
                    'use strict'

                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    const forms = document.querySelectorAll('.needs-validation')

                    // Loop over them and prevent submission
                    Array.from(forms).forEach(form => {
                        form.addEventListener('submit', event => {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            form.classList.add('was-validated')
                        }, false)
                    })
                })()
            </script>
        </footer>
    </main>
</body>

</html>
