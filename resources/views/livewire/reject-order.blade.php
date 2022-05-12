<div>
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>Order Details</h1>
            <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
                <span><i class=" mdi mdi-chevron-right"></i></span>Orders
            </p>
        </div>
        {{-- <div>
            <a href="{{route('data.create')}}"
                class="btn btn-primary">Add</a>
        </div> --}}
    </div>
    <div class="row">
        @include('admin.layouts.error')
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th>S.No</th> --}}
                                    <th>OrderId</th>
                                    <th>User Name</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    <th>Order Date</th>
                                    <th>Delivered Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (isset($datas) && !empty($datas))
                                    @foreach ($datas as $key => $data)
                                        <tr>
                                            {{-- <td>{{@$key +1}}</td> --}}
                                            <td>{{ Str::limit(@$data->orderId, 15, '...') }}</td>
                                            <td>{{ @$data->user->name }}</td>
                                            <td>{{ @$data->amount }}</td>
                                            <td>{{ @$data->payment_type == 1 ? 'COD' : 'ONLINE' }}</td>
                                            <td>{{ \Carbon\Carbon::parse(@$data->order_date)->format('d-m-Y') }}</td>
                                            <td>{{ $data->delivery_date ? \Carbon\Carbon::parse(@$data->order_date)->format('d-m-Y') : 'NA' }}
                                            </td>

                                            <td>
                                                @if (@$data->status == 6)
                                                    <a href="javascript:void(0)" :key="{{ @$data->id }}"
                                                        class="btn btn-success my-2 btn-sm"
                                                        onclick="accept({{ @$data->id }})">Accept</a>
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm my-2"
                                                        onclick="remark({{ @$data->id }})">Reject</a>
                                                @endif
                                                @if (@$data->status == 7)
                                                    @if (isset($data->remarks) && $data->remarks != null)
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-danger my-2 btn-sm">Rejected</a>
                                                    @else
                                                        <a href="javascript:void(0)" class="btn btn-success my-2 btn-sm"  >Refunded</a>
                                                     @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                        <div class="">
                            @if (isset($datas) && !empty($datas))
                                {{ $datas->withQueryString()->links('pagination::bootstrap-5') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-add-contact" wire:ignore.self id="remarks" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Update Remarks</h5>
                    </div>

                    <div class="modal-body px-4">
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <input type="text" name="remarks" wire:model="remarks" class="form-control">
                                    @error('remarks')
                                        <span class="text-danger">{{ $errors->first('remarks') }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer px-4">
                        <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" wire:click="submit()" class="btn btn-primary btn-pill">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>


        Livewire.on('relo', function() {
            location.reload();
        });

        function remark(params) {
            Livewire.emit('rejectedId', params);
            $('#remarks').modal('show');
        }

        function accept(id) {
            Livewire.emit('accept', id);

        }
    </script>
@endpush
