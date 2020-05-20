<div class="container mb-4" id="subscribe">
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="bg-color-gray-shade-radius p-5">
                <h3>Subscribe and Stay
                    <br>Informed
                </h3>
                <p>Enter your Email ID and subscribe for latest interesting blogs. We will notify you by sending an email, whenever new content will be ready for you.</p>
                <form method="POST" action="{{ url('subscribe') }}" class="form-group form-row mb-0">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control rounded-50 h-auto"
                            placeholder="Your email">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary rounded-50 form-custom-btn">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="bg-img-3 p-5">
                <div class="white-box-square">
                    <div class="all-text-content-white text-center py-5">
                        <h1 class="py-4 my-3">Subscribe Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>