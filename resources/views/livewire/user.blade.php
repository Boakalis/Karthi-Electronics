<div>
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>User Details</h1>
            <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Users
            </p>
        </div>
        <div>
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#select2Modal"
                wire:click="$emit('resetData')" class="btn btn-primary">Add</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="container col-4 p-0 my-1 mx-0 ">
                <input type="text" class="form-control" wire:model="search" placeholder="Search User By Email Address">
            </div>
            <div class="ec-vendor-list card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table">
                            <thead>
                                <tr>
                                    <th>Profile Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Referal Code</th>
                                    <th>Refered By</th>
                                    <th>Wallet Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (isset($vendors) && !empty($vendors))
                                    @foreach ($vendors as $vendor)
                                        <tr>
                                            <td><img class="vendor-thumb" src="{{$vendor->image != null ? asset($vendor->image) : 'https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png'}}" alt="vendor image" />
                                            </td>
                                            <td>{{$vendor->name}}</td>
                                            <td>{{$vendor->email}}</td>
                                            <td>{{$vendor->mobile}}</td>
                                            <td><span class="badge badge-{{$vendor->status == 1 ? 'success' :'danger'}}">{{$vendor->status == 1 ? 'Active' :'InActive'}}</span></td>
                                            <td>{{isset($vendor->code->code) && !empty($vendor->code->code) ? $vendor->code->code : 'NA' }}</td>
                                            <td>{{isset($vendor->referer->name) && !empty($vendor->referer->name) ? $vendor->referer->name : 'NA' }}</td>
                                            <td>{{isset($vendor->wallet->amount) && !empty($vendor->wallet->amount) ? $vendor->wallet->amount : 'NA' }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('user.profile',$vendor->id)}}" class="btn btn-outline-success">View</a>
                                                    <button type="button"
                                                        class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                        data-display="static">
                                                        <span class="sr-only">Info</span>
                                                    </button>

                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0)"  onclick="openWallet({{$vendor->id}})" >Add Wallet Amount</a>
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="openreferer({{$vendor->id}})" >Referer List</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="wallet" wire:ignore.self tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Wallet Amount</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="number" id="amount" wire:model="walletAmount" class="form-control" placeholder="Enter wallet amount" required >
                <input type="hidden" id="id" wire:model="currentId" class="form-control" >
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" wire:click="walletAdd()">Add</button>
            </div>
          </div>
        </div>
    </div>
    <div class="modal" id="list" wire:ignore.self tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Refer List</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-responsive" >
                    <thead>
                        <th>S.No</th>
                        <th>Name</th>
                    </thead>
                    <tbody>
                        @if (isset($refer_list->referList) && !empty($refer_list->referList))
                        @foreach ($refer_list->referList as $key => $list)
                        <tr>
                            <td>{{$key +1}}</td>
                            <td>{{$list->name}}</td>
                        </tr>
                        @endforeach
                        @else
                        <span>No Results</span>
                        @endif
                    </tbody>
                </table>
            </div>

          </div>
        </div>
    </div>
    <div class="modal fade modal-add-contact" wire:ignore.self id="select2Modal" data-focus="false" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form wire:click.prevent.submit="" enctype="multipart/form-data">
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Dealer</h5>
                    </div>

                    <div class="modal-body px-4">
                        {{-- <div class="form-group row mb-6">
                            <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Upload Image</label>

                            <div class="col-sm-8 col-lg-10">
                                <div class=" mb-1">
                                    <input type="file" class="form-control" wire:model="image">
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif

                                </div>
                            </div>
                        </div> --}}

                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">First name</label>
                                    <input type="text" class="form-control" id="name" wire:model="name"
                                        placeholder="Enter Name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif

                                </div>
                            </div>


                            {{-- <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="storeName">Store name</label>
                                    <input type="text" class="form-control" id="storeName"
                                        placeholder="Enter Store Name" wire:model="storeName">
                                    @if ($errors->has('storeName'))
                                        <span class="text-danger">{{ $errors->first('storeName') }}</span>
                                    @endif
                                </div>
                            </div> --}}

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" wire:model="email"
                                        placeholder="Enter Email Address">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="text" class="form-control" id="Phone" wire:model="mobile"
                                        placeholder="Enter Mobile Number">
                                    @if ($errors->has('mobile'))
                                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" wire:model="password" id="password"
                                        placeholder="Enter Password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div> --}}

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="refere">Referal Code</label>
                                    <input type="text" class="form-control" wire:model="referal_code" id="referal_code"
                                        placeholder="Enter Referal Code if any">
                                    @if ($errors->has('referal_code'))
                                        <span class="text-danger">{{ $errors->first('referal_code') }}</span>
                                    @endif
                                </div>
                            </div>



                            {{-- <div class="col-lg-6" wire:ignore.self>
                                <div class="form-group mb-4">
                                    <label for="serviceArea">Select Serviceable Area</label>
                                    <select class=" form-select select2 select-2"
                                        wire:click="changeEvent($event.target.value)" wire:model="serviceAreas" multiple="multiple">
                                        @if (isset($areas) && !empty($areas))
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('serviceAreas'))
                                    <span class="text-danger">{{ $errors->first('serviceAreas') }}</span>
                                @endif
                                </div>
                            </div> --}}



                        </div>
                    </div>

                    <div class="modal-footer px-4">

                        <button type="submit" class="btn btn-primary btn-pill" wire:click="save">Add</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@push('scripts')
    <script>
        Livewire.on('stored', function() {

            $('#select2Modal').modal('hide');
            Livewire.emit('resetData');
            toastr.success('Vendor Added Successfully');
            location.reload();
        });
        Livewire.on('updated', function() {
            $('#areaEditModal').modal('hide');
            Livewire.emit('resetData');
            toastr.success('Area Updated Successfully');
        });
        Livewire.on('editData', function() {
            $('#areaEditModal').modal('show');
        });
        Livewire.on('addPin', function() {
            $('#addPin').modal('show');
        });
        Livewire.on('walletAdded', function() {
            $('#wallet').modal('hide');
            location.reload();
        });
        Livewire.on('pinAdded', function() {
            toastr.success('Pin Added Successfully');

        });
    </script>
    <script>
        window.loadSelect2 = () => {
            $('.select2').select2().on('change', function() {
                livewire.emitTo('vendor', 'selectedItem', $(this).val());
                // @this.set('propertyName',$(this).val());
            });
            $('.select2').select2({
                dropdownParent: $("#select2Modal"),
                placeholder: "Select...",
                allowClear: true,
                width: "100%"
            });
        }
        loadSelect2();
        window.livewire.on('loadSelect2Hydrate', () => {
            loadSelect2();
        });
    </script>

    <script>
        function openWallet(id) {

            Livewire.emit('currentIdEvent',id);
            $('#amount').val(0);

            $('#wallet').modal('show');
        }
        function openreferer(id) {

            Livewire.emit('currentIdEvent',id);


            $('#list').modal('show');
        }
    </script>
@endpush
