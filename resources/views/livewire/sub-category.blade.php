<div>
    <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
        <h1>Sub-Category</h1>
        <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Sub-Category
        </p>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-12" wire:ignore.self>
            <div class="ec-cat-list card card-default mb-24px">
                <div class="card-body">
                    <div class="ec-cat-form">
                        <h4 id="title">{{$editId != null ? 'Edit' : 'Add'}} Sub-Category</h4>

                        <form wire:prevent.submit="save" id="formReset" enctype="multipart/form-data">

                            <div class="row">

                                <div class="form-group col-12">
                                    <label for="text" class="col-12 col-form-label">Name</label>
                                    <div class="col-12">
                                        <input id="text" name="text" wire:model="name" placeholder="Enter Sub-Category Name"
                                            class="form-control here slug-title" type="text">
                                        <input type="hidden" wire:model="editId">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group col-12">
                                        <label for="category">Select Category</label>
                                        <select class="form-control" wire:model="category_id"
                                            wire:click="changeCategory($event.target.value)" id="">
                                            <option value="">Select Category</option>

                                            @if (isset($categories) && !empty($categories))
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
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
                                    <th>Sub-Category Name</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @if (isset($subcategories) && !empty($subcategories))
                                    @foreach ($subcategories as $subcategory)
                                        <tr>
                                            <td><img class="cat-thumb"
                                                    src="{{ asset('storage/media/' . $subcategory->image) }}"
                                                    alt="subCategory Image" /></td>
                                            <td>{{@$subcategory->name}}</td>
                                            <td>{{@$subcategory->category->name}}</td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" wire:click="status({{$subcategory->id}})" type="checkbox"
                                                        id="flexSwitchCheckChecked" {{@$subcategory->status == 1 ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <button type="button" class="btn btn-outline-success" wire:click=edit({{$subcategory->id}}) >Edit</button>
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
        Livewire.on('datatable', function() {
            $('#responsive-data-table').dataTable();
        });

        Livewire.on('stored', function() {
            $('#formReset').trigger("reset");
            toastr.success('SubCategory Added');
            location.reload();
        });
        Livewire.on('updated', function() {

            toastr.info('SubCategory Updated');
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
