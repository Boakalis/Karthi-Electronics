<div>
    @php
        use App\Models\SubCategory;
        use App\Models\Product;
    @endphp
    <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
        <h1>Banner List</h1>
        <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Banner
        </p>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-12" wire:ignore.self>
            <div class="ec-cat-list card card-default mb-24px">
                <div class="card-body">
                    <div class="ec-cat-form">
                        <h4 id="title">{{ $editId != null ? 'Edit' : 'Add' }} Banner</h4>
                        <form wire:prevent.submit="save" id="formReset" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group row">
                                    <label for="type">Banner Type</label>
                                    <select class="form-control" wire:model="type_id"
                                        wire:click="changeType($event.target.value)" id="">
                                        <option value="0">None</option>
                                        <option value="1">Sub-Category</option>
                                        <option value="2">Product</option>
                                    </select>
                                    @if ($errors->has('type_id'))
                                        <span class="text-danger">{{ $errors->first('type_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="type">Select Option</label>
                                    <select class="form-control select" wire:model="option_id" onchange="changeOption(event)"
                                         id="" style="width:100%">
                                            <option value="">Select Option</option>
                                        @if (isset($options) && !empty($options))
                                            @foreach ($options as $option)
                                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('option_id'))
                                        <span class="text-danger">{{ $errors->first('option_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="slug" class="col-12 col-form-label">Image</label>
                                <div class="col-12">
                                    <input id="image" class="form-control" wire:model="image" type="file">
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastName">Status</label>
                                <select class="form-control" wire:model="status"
                                    wire:click="changeEvent($event.target.value)" id="">
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="javascript:void(0)" onClick="resetData()"
                                        class="btn btn-secondary">Reset</a>
                                    <a name="button" href="javascript:void(0)" wire:click="save"
                                        class="btn btn-primary">Submit</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-12">
            <div class="ec-cat-list card card-default">
                <div class="card-body">
                    <div class="table-responsive" wire:ignore>
                        <table id="responsive-data-table" class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Banner Type</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>



                                @if (isset($banners) && !empty($banners))
                                    @foreach ($banners as $banner)
                                        @php


                                        @endphp
                                        <tr>
                                            <td><img class="cat-thumb"
                                                    src="{{ asset('storage/media/' . $banner->image) }}"
                                                    alt="banner Image" /></td>
                                            <td>{{ @$banner->type_id == 0 ? 'Advertisement' : (@$banner->type_id == 1 ? 'Category' : 'Product') }}
                                            </td>
                                            <td>
                                                @if ($banner->type_id == 1)

                                                     {{(SubCategory::where('id', $banner->option_id)->pluck('name')->first())}}
                                                @elseif ($banner->type_id == 2)
                                                    {{Product::where('id', $banner->option_id)->pluck('name')->first()}}
                                                @else
                                                    NOT AVAILABLE
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input"
                                                        wire:click="status({{ $banner->id }})" type="checkbox"
                                                        id="flexSwitchCheckChecked"
                                                        {{ @$banner->status == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked"></label>
                                                </div>
                                            <td>
                                                <div class="">
                                                    <button type="button" class="btn btn-outline-success"
                                                        wire:click=edit({{ $banner->id }})>Edit</button>
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
</div>
@push('scripts')
    <script>
        Livewire.on('select', function() {
            $('.select').select2({

                allowClear: true,
                width: "resolve",
                placeholder: 'Select Option'
            });
        });

        $(document).ready(function() {
            $('.select').select2({

                allowClear: true,
                width: "resolve",
                placeholder: 'Select Option'
            });
        });

        Livewire.on('stored', function() {
            $('#formReset').trigger("reset");
            toastr.success('Category Added');
            location.reload();
        });
        function changeOption(e) {
            Livewire.emit('changeOption',e.target.value);
        }
        Livewire.on('updated', function() {

            toastr.info('Category Updated');
            location.reload();
        });
    </script>
    <script>
        function resetData(params) {
            $('#formReset').trigger("reset");
            Livewire.emit('resetData');
        }
    </script>
@endpush
