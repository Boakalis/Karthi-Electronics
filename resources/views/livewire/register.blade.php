<div>
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Register</h2>
                        <h2 class="ec-title">Register</h2>
                        {{-- <p class="sub-title mb-3">Best place to buy and sell digital products</p> --}}
                    </div>
                </div>
                <div class="ec-register-wrapper">
                    <div class="ec-register-container">
                        <div class="ec-register-form">
                            <form>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Name*</label>
                                    <input class="mb-0" type="text" wire:model="name" placeholder="Enter your first name" required="">
                                    @error('name')
                                    <span class=" mb-1 text-danger" style="font-size: 10px;"> {{$errors->first('name')}} </span>
                                    @enderror
                                </span>

                                <span class="ec-register-wrap ec-register-half">
                                    <label>Email*</label>
                                    <input class="mb-0" type="email" wire:model="email" placeholder="Enter your email add..." required="">
                                    @error('email')
                                    <span class=" mb-1 text-danger" style="font-size: 10px;"> {{$errors->first('email')}} </span>
                                    @enderror
                                </span>

                                <span class="ec-register-wrap ec-register-half">
                                    <label>Phone Number*</label>
                                    <input class="mb-0" type="text" wire:model="mobile" placeholder="Enter your phone number" required="">
                                    @error('mobile')
                                    <span class=" mb-1 text-danger" style="font-size: 10px;"> {{$errors->first('mobile')}} </span>
                                    @enderror
                                </span>

                                <span class="ec-register-wrap ec-register-half">
                                    <label>Password*</label>
                                    <input class="mb-0" type="password" wire:model="password" placeholder="Enter Password" required="">
                                    @error('password')
                                    <span class=" mb-1 text-danger" style="font-size: 10px;"> {{$errors->first('password')}} </span>
                                    @enderror
                                </span>

                                <span class="ec-register-wrap ec-register-half">
                                    <label>Confirm Password*</label>
                                    <input class="mb-0" type="password" wire:model="confirmPassword" placeholder="Re-enter the password" required="">
                                    @error('confirmPassword')
                                    <span class=" mb-1 text-danger" style="font-size: 10px;"> {{$errors->first('confirmPassword')}} </span>
                                    @enderror
                                </span>

                                {{-- <span class="ec-register-wrap ec-recaptcha">
                                    <span class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></span>
                                    <input class="mb-0" class="form-control d-none" data-recaptcha="true" required="" data-error="Please complete the Captcha">
                                    <span class="help-block with-errors"></span>
                                </span> --}}
                                <div class="col-12">
                                    <center> <small>By Clicking "Create Account" , I agree to our <a class="text-primary" href="">TOS</a> and <a class="text-primary" href="">Privacy Policy</a> </small></center>
                                </div>

                                <span class="ec-register-wrap ec-register-btn">
                                    <button class="btn btn-primary " style="font-size: 13px;" wire:click="register()" type="button">Create Account</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('scripts')
    <script>
        Livewire.on('registered',function(){
            toastr.success('Registered Successfully')
            window.location.href = '{{route('login')}}'
        });
    </script>
@endpush
