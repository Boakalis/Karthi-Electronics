<div>
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>Area Details</h1>
            <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Area
            </p>
        </div>
        <div>
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#areaModal"
                wire:click="$emit('resetData')" class="btn btn-primary">Add</a>
        </div>
    </div>
    <div class="card bg-white profile-content ec-vendor-profile">
        <div class="col-12">
            <!-- Recent Order Table -->
            <div class="card card-default card-table-border-none ec-tbl" id="recent-orders">
                <div class="card-header justify-content-between">
                    {{-- <h2>Recent Orders</h2> --}}

                    {{-- <div class="date-range-report">
                        <span>Feb 18, 2022 - Mar 19, 2022</span>
                    </div> --}}
                </div>

                <div class="card-body pt-0 pb-0 table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>State</th>
                                <th>District</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (isset($datas) && !empty($datas))
                                @foreach ($datas as $key => $data)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <a class="text-dark" href="">{{ $data->name }}</a>
                                        </td>
                                        <td>
                                            <a class="text-dark" href="">{{ $data->state->name }}</a>
                                        </td>
                                        <td>
                                            <a class="text-dark" href="">{{ $data->district->name }}</a>
                                        </td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $data->status == 1 ? 'success' : 'danger' }}">{{ $data->status == 1 ? 'Active' : 'InActive' }}</span>
                                        </td>
                                        <td class="">
                                            <button wire:click="$emit('setCurrentAreaId',{{ $data->id }})"
                                                class="btn btn-success btn-sm ">PIN</button>
                                            <button wire:click="edit({{ $data->id }})"
                                                class="btn btn-primary btn-sm ">EDIT</button>
                                            {{-- <button onclick=""deleteInitate({{$data->id}})"" class="btn btn-danger btn-sm " >Delete</button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" wire:ignore.self id="addPin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form class="modal-header text-center border-bottom-0" wire:click.prevent.submit="addPin">
                    <div class="row col-12">
                        <div class="container col-5">
                            <input type="text" class="form-control col-6" wire:model="pincodeName" placeholder="Enter Locality Name">
                            @if ($errors->has('pincodeName'))
                            <span class="text-danger">{{ $errors->first('pincodeName') }}</span>
                        @endif
                        </div>
                        <div class="container col-5">
                            <input type="text" class="form-control col-6" wire:model="pincode" placeholder="Enter Pincode">
                            @if ($errors->has('pincode'))
                            <span class="text-danger">{{ $errors->first('pincode') }}</span>
                        @endif
                        </div>

                        <div class="container col-2">
                            <button class="btn btn-primary btn-md">Add</button>
                        </div>
                    </div>
                </form>

                <div class="modal-body p-0" data-simplebar style="height:320px">
                    <ul class="list-unstyled border-top mb-0">
                        @if (isset($pins) && !empty($pins))
                            @foreach ($pins as $pin)
                                <li>
                                    <div class="row">
                                        <div class="media media-message">
                                            <div class="justify-content-center text-center col-4">
                                                <p class="text-center">{{$pin->pincode}}</p>
                                            </div>
                                            <div class=" d-flex justify-content-between col-4 align-items-center">
                                                <div class="message-contents">
                                                    <h4 class="title">{{$pin->name}}</h4>
                                                </div>

                                                <div class="">
                                                    <span class="mdi-trash-can mdi text-danger" wire:click=deletePin({{$pin->id}}) ></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            @endforeach
                        @else
                            No Pincode Found
                        @endif
                    </ul>
                </div>

                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-pill">Add new member</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="areaModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-end border-bottom-0">
                    <button type="button" class="btn-close-icon" data-bs-dismiss="modal" aria-label="Close">
                        <i class="mdi mdi-close"></i>
                    </button>
                </div>

                <div class="modal-body pt-0">
                    <div class="row no-gutters">


                        <div class="col-md-12">
                            <div class="contact-info px-4">
                                <h4 class="text-dark mb-1 text-center mb-3" id="title">Add Area</h4>
                                <form method="POST" wire:click.prevent.submit enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Enter Area Name" wire:model="name">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <select class="form-control" wire:model="state"
                                                    wire:click="changeState($event.target.value)" id="">
                                                    <option value="">
                                                         State</option>
                                                    @if (isset($states) && !empty($states))
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}">{{ $state->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if ($errors->has('state'))
                                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="district">District</label>
                                                <select class="form-control" wire:model="district"
                                                    wire:click="changeDistrict($event.target.value)" id="">
                                                    <option value="">Select district</option>
                                                    @if (isset($districts) && !empty($districts))
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}">
                                                                {{ $district->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if ($errors->has('district'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('district') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Status</label>
                                                <select class="form-control" wire:model="status"
                                                    wire:click="changeEvent($event.target.value)" id="">
                                                    <option value="1">Active</option>
                                                    <option value="0">InActive</option>
                                                </select>
                                                @if ($errors->has('status'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-5">
                                        <button type="submit" wire:click="save" wire:loading.attr="disabled"
                                            wire.loading.class="btn-light" class="btn btn-primary mb-2 btn-pill"
                                            id="submit">Submit</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="areaEditModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-end border-bottom-0">

                    <button type="button" class="btn-close-icon" data-bs-dismiss="modal" aria-label="Close">
                        <i class="mdi mdi-close"></i>
                    </button>
                </div>

                <div class="modal-body pt-0">
                    <div class="row no-gutters">


                        <div class="col-md-12">
                            <div class="contact-info px-4">
                                <h4 class="text-dark mb-1 text-center mb-3" id="title">Edit Area</h4>
                                <form method="POST" wire:click.prevent.submit enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Enter State Name" wire:model="name">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <select class="form-control" wire:model="state"
                                                    wire:click="changeState($event.target.value)" id="">
                                                    @if (isset($states) && !empty($states))
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}">{{ $state->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if ($errors->has('state'))
                                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="district">District</label>
                                                <select class="form-control" wire:model="district"
                                                    wire:click="changeDistrict($event.target.value)" id="">
                                                    <option value="">Select district</option>
                                                    @if (isset($districts) && !empty($districts))
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}">
                                                                {{ $district->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if ($errors->has('district'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('district') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Status</label>
                                                <select class="form-control" wire:model="status"
                                                    wire:click="changeEvent($event.target.value)" id="">
                                                    <option value="1">Active</option>
                                                    <option value="0">InActive</option>
                                                </select>
                                                @if ($errors->has('status'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-5">
                                        <button type="submit" wire:click="update" wire:loading.attr="disabled"
                                            wire.loading.class="btn-light" class="btn btn-primary mb-2 btn-pill  "
                                            id="update">Update</button>
                                    </div>
                                </form>
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
        Livewire.on('stored', function() {
            $('#title').text('Add State');
            $('#areaModal').modal('hide');
            Livewire.emit('resetData');
            toastr.success('Area Added Successfully');
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
        Livewire.on('pinAdded', function() {
            toastr.success('Pin Added Successfully');

        });
    </script>
@endpush
