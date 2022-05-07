<div>
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Log In</h2>
                        <h2 class="ec-title">Log In</h2>
                        {{-- <p class="sub-title mb-3">Best place to buy and sell digital products</p> --}}
                    </div>
                </div>
                @include('admin.layouts.error')
                <div class="ec-login-wrapper">
                    <div class="ec-login-container">
                        <div class="ec-login-form">
                            <form >
                                <span class="ec-login-wrap">
                                    <label>Email Address*</label>
                                    <input class="mb-0" type="text" wire:model="email" name="name" placeholder="Enter your email add..." required />
                                    @error('email')
                                    <span class=" mb-1 text-danger" style="font-size: 10px;"> {{$errors->first('email')}} </span>
                                    @enderror
                                </span>
                                <span class="ec-login-wrap">
                                    <label>Password*</label>
                                    <input class="mb-0" type="password" name="password" wire:model="password" placeholder="Enter your password" required />
                                    @error('password')
                                    <span class=" mb-1 text-danger" style="font-size: 10px;"> {{$errors->first('password')}} </span>
                                    @enderror
                                </span>
                                <span class="ec-login-wrap ec-login-fp">
                                    <label><a class="text-primary" href="#">Forgot Password?</a></label>
                                </span>
                                <span class="ec-login-wrap ec-login-btn">
                                    <button class="btn btn-primary" wire:click="login()" type="button">Login</button>
                                    <a href="{{route('register')}}" class="btn btn-secondary">Register</a>
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
         Livewire.on("no-user", function (data) {
        toastr.error("Account not Exists.Please Register");
    });
    Livewire.on("credentials", function (data) {
        toastr.error("Please Check Credentials");
    });
   
    </script>
@endpush
