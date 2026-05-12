<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<section class="newsLetterBlock greyBg sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-lg-6 d-flex align-items-center">
                  <div class="w-100">
                     <h2 class="fw-bold">Be the first to know about our daily sales!</h2>
                     <p class="mb-lg-0 pe-lg-4">Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks.</p>
                  </div>
               </div>
               <div class="col-md-12 col-lg-6 d-flex align-items-center">
                  <div class="input-group subscribeNews ps-lg-3">
                     <form id="newsletterForm">
                     @csrf
                        <div class="mb-4">
                           <input type="text" name="email" id="email" class="form-control form-control-lg text-end-0" placeholder="Enter Email Address" required />
                        </div>
                        <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between gap-3 mb-3">
                           <div>
                              <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>

                              @error('g-recaptcha-response')
                                 <small class="text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                           <button class="btn btn-lg customBtn01 redBg" type="submit" id="btnSearch">SubScribe</button>
                        </div>
                        <div id="newsletterMessage"></div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>

<script>
document.getElementById('newsletterForm')
    .addEventListener('submit', async function (e) {

        e.preventDefault();

        const form = this;
        const messageBox = document.getElementById('newsletterMessage');

        const formData = new FormData(form);

        try {

            const response = await fetch("{{ route('newsletter.subscribe') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector(
                        'meta[name="csrf-token"]'
                    ).getAttribute('content'),
                    'Accept': 'application/json',
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {

                messageBox.innerHTML = `
                    <p style="color:green;">
                        ${data.message}
                    </p>
                `;

                form.reset();

            } else {

                messageBox.innerHTML = `
                    <p style="color:red;">
                        ${data.message}
                    </p>
                `;
            }

        } catch (error) {

            messageBox.innerHTML = `
                <p style="color:red;">
                    Something went wrong.
                </p>
            `;
        }
    });
</script>