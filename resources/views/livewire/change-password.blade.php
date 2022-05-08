<div>
    <div class="modal fade" wire:ignore.self id="changePassword" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        {{-- <div class="col-md-5 col-sm-12 col-xs-12">

                            <img src="{{asset('12.jpg')}}" style="height: 100%;" alt="" />
                        </div> --}}
                        <div class="col-12">
                            <div class="login">
                                <center><h6 class="text-uppercase my-2">Change Password</h6></center>
                                <div class="mb-2">
                                    <span class="mt-1" for="password">Old Password</span>
                                    <input type="password" class="form-control" wire:model="oldPassword" id="opassword" placeholder="Enter Old Password" />
                                    @error('oldPassword')
                                    <span class="text-danger text-uppercase" style="font-size: 10px;"> {{$errors->first('oldPassword')}} </span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <span class="mt-1" for="new-password">New Password</span>
                                    <input type="password" class="form-control" id="npassword" wire:model="password" placeholder="Enter Password" />
                                    @error('password')
                                    <span class="text-danger text-uppercase " style="font-size: 10px;"> {{$errors->first('password')}} </span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <span class="mt-1" for="confirm-password">Confirm Password</span>
                                    <input type="password" class="form-control" id="cpassword" wire:model="confirmPassword" placeholder="Confirm Password" />
                                    @error('confirmPassword')
                                    <span class="text-danger text-uppercase" style="font-size: 10px;"> {{$errors->first('confirmPassword')}} </span>
                                    @enderror
                                </div>
                                <div class="container m-0 p-0 mt-4">
                                    <span class="text-center" style="display: flex; align-items: center; justify-content: center;"><button class="btn btn-success" wire:click="change()">Change Password</button></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        Livewire.on('password-error', function(){
            toastr.error('Old Password is Incorrect');
        });
        Livewire.on('password-update', function(){
            $('#changePassword').modal('hide');
            toastr.success('Password Updated');
        });
    </script>
@endpush
