<div >
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>State Details</h1>
            <p class="breadcrumbs"><span><a href="{{route('dashboard')}}>Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>State
            </p>
        </div>
        <div>
            <a href="javascript:void(0)" data-bs-toggle="modal"
            data-bs-target="#stateModal" wire:click="$emit('resetData')" class="btn btn-primary">Add</a>
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
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (isset($datas) && !empty($datas))
                            @foreach ($datas as $key => $data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    <a class="text-dark" href="">{{$data->name}}</a>
                                </td>
                                <td>
                                    <span class="badge badge-{{$data->status == 1 ? 'success' :'danger'}}">{{$data->status == 1 ? 'Active' :'InActive'}}</span>
                                </td>
                                <td class="">
                                    <button wire:click="edit({{$data->id}})" class="btn btn-primary btn-sm " >Edit</button>
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
    <div wire:ignore.self class="modal fade" id="stateModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <h4 class="text-dark mb-1 text-center mb-3" id="title" >Add State</h4>
                                <form method="POST" wire:click.prevent.submit  enctype="multipart/form-data" >
                                    @csrf
                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control"  name="name" id="name" placeholder="Enter State Name" wire:model="name"   >
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Status</label>
                                                    <select class="form-control" wire:click="changeEvent($event.target.value)" id="">
                                                        <option value="1">Active</option>
                                                        <option value="0">InActive</option>
                                                    </select>
                                                @if ($errors->has('status'))
                                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end mt-5">
                                            <button type="submit" wire:click="save" wire:loading.attr="disabled" wire.loading.class="btn-light" class="btn btn-primary mb-2 btn-pill" id="submit">Submit</button>
                                            <button type="submit" wire:click="update" wire:loading.attr="disabled" wire.loading.class="btn-light" class="btn btn-primary mb-2 btn-pill d-none " id="update" >Update</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="stateEditModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <h4 class="text-dark mb-1 text-center mb-3" id="title" >Edit State</h4>
                                <form method="POST" wire:click.prevent.submit  enctype="multipart/form-data" >
                                    @csrf
                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control"  name="name" id="name" placeholder="Enter State Name" wire:model="name"   >
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Status</label>
                                                    <select class="form-control" wire:model="status" wire:click="changeEvent($event.target.value)" id="">
                                                        <option value="1">Active</option>
                                                        <option value="0">InActive</option>
                                                    </select>
                                                @if ($errors->has('status'))
                                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end mt-5">
                                            <button type="submit" wire:click="update" wire:loading.attr="disabled" wire.loading.class="btn-light" class="btn btn-primary mb-2 btn-pill  " id="update" >Update</button>
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
            $('#stateModal').modal('hide');
            Livewire.emit('resetData');
            toastr.success('State Added Successfully');
        });
        Livewire.on('updated', function() {
            $('#stateEditModal').modal('hide');
            Livewire.emit('resetData');
            toastr.success('State Updated Successfully');
        });
        Livewire.on('editData', function() {
            $('#stateEditModal').modal('show');
        });
    </script>
@endpush
