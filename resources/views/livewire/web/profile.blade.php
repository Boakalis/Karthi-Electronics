<div>
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Profile Details</h2>
                        <h2 class="ec-title">Profile Details</h2>
                        {{-- <p class="sub-title mb-3">Best place to buy and sell digital products</p> --}}
                    </div>
                </div>
                <div class="ec-register-wrapper">
                    <div class="ec-register-container">
                        <div class="ec-register-form">
                            <form>
                                
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Name*</label>
                                    <input class="mb-0" type="text" wire:model="name" value="{{@Auth::user()->name}}" placeholder="Enter your first name" required="">
                                    @error('name')
                                    <span class=" mb-1 text-danger" style="font-size: 10px;"> {{$errors->first('name')}} </span>
                                    @enderror
                                </span>

                                <span class="ec-register-wrap ec-register-half">
                                    <label>Email*</label>
                                    <input class="mb-0" type="email" wire:model="email" placeholder="Enter your email add..." value="{{@Auth::user()->email}}" required="">
                                    @error('email')
                                    <span class=" mb-1 text-danger" style="font-size: 10px;"> {{$errors->first('email')}} </span>
                                    @enderror
                                </span>

                                <span class="ec-register-wrap ec-register-half">
                                    <label>Phone Number*</label>
                                    <input class="mb-0" value="{{@Auth::user()->mobile}}" type="text" wire:model="mobile" placeholder="Enter your phone number" required="">
                                    @error('mobile')
                                    <span class=" mb-1 text-danger" style="font-size: 10px;"> {{$errors->first('mobile')}} </span>
                                    @enderror
                                </span>

                              

                                <span class="ec-register-wrap ec-register-btn">
                                    <button class="btn btn-primary " style="font-size: 13px;" wire:click="register()" type="button">Update Profile</button>
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
