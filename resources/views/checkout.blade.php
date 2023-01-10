<x-app-layout>

    <head>
        <title>DueDeck - Checkout</title>
        <meta name="description"
            content="DueDeck is a cloud-based compliance automation software specially designed for accounting and compliance professionals to manage multiple tasks from a single dashboard.">
        @include('include.head')
    </head>

    <body onload="createCaptcha()">
        <header class="header">
            @include('include.header')
        </header>
        <main>
            <div class="container py-5">
                @livewire('checkout-page', ['package_id' => $id])
            </div>
            </div>

            </div>
            <!-- company Detail Modal  -->
            <div class="modal fade" id="companyDetail" tabindex="-1" aria-labelledby="companyDetailLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 font-medium" id="companyDetailLabel">Company Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body form-style">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="">Comapny Name <r style="color: red;">*</r></label>
                                    <input type="text" class="form-control" required
                                        placeholder="Enter Comapny Name">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Woner/Admin Name <r style="color: red;">*</r></label>
                                    <input type="text" class="form-control" required placeholder="Enter Admin Name">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Contact No. <r style="color: red;">*</r></label>
                                    <input type="text" class="form-control" required placeholder="Enter Contact No.">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Email Id <r style="color: red;">*</r></label>
                                    <input type="text" class="form-control" required placeholder="Enter Email Id">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">GST No. </label>
                                    <input type="text" class="form-control" placeholder="Enter GST No.">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">PAN No. </label>
                                    <input type="text" class="form-control" placeholder="Enter PAN No.">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Membership No. </label>
                                    <input type="text" class="form-control" placeholder="Enter Membership No.">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">State <r style="color: red;">*</r></label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Select</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">City <r style="color: red;">*</r></label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Select</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Pincode <r style="color: red;">*</r></label>
                                    <input type="text" class="form-control" required placeholder="Enter Pincode">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="">Address <r style="color: red;">*</r></label>
                                    <input type="text" class="form-control" required placeholder="Enter Address">
                                </div>
                                <div class="col-12 pt-3">
                                    <p class="font-medium">Contact Person Details</p>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Contact Person Name <r style="color: red;">*</r></label>
                                    <input type="text" class="form-control" required
                                        placeholder="Enter Contact Person Name">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Contact No. <r style="color: red;">*</r></label>
                                    <input type="text" class="form-control" required
                                        placeholder="Enter Contact No.">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Email ID <r style="color: red;">*</r></label>
                                    <input type="text" class="form-control" required placeholder="Enter Email ID">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>The DueDeck would like to keep you informed with personalized emails about
                                        products and services. See our <a href="/privacypolicy"
                                            target="_blank">Privacy Policy</a> for more details.</p>
                                    <p>By clicking <input type="checkbox"> I agree that I have read and accepted the <a
                                            href="/termsconditions" target="_blank">Terms & Conditions.</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button class="btn btn-duedeck" type="submit">Procced to Payment</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FOOTER -->
            <footer class="footer">
                @include('include.footer')

</x-app-layout>

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
