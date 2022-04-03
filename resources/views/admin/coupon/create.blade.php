@extends('admin.layouts.master')
@section('content')
            <!-- Basic multiple Column Form section start -->
            <section id="multiple-column-form">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Coupon Create/Edit</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" name="couponStore" action="{{route('coupon.store')}}" id="couponStore">
                                    <div class="modal-body">
                                        <div class="alert alert-danger" style="display: none;"></div>
                                        <div class="container">
                                            <div class="row" >
                                                <div class="mb-1 col-4 ">
                                                    <label>Promo-Code: </label>
                                                    <input type="text" name="code" placeholder="Enter Promocode" wire:model="code" class="form-control" />
                                                    @error('code') <span class="text-danger error">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-1 col-4 ">
                                                    <label>Description:</label>
                                                    <textarea class="form-control"  name="description" wire:model="description" ></textarea>
                                                    @error('description') <span class="text-danger error">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-1 col-4 ">
                                                    <label>Min.Amount for using coupon: </label>
                                                    <input type="text" name="min_amount" placeholder="Enter Min.Amount" wire:model="min_amount" class="form-control" />
                                                    @error('min_amount') <span class="text-danger error">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-1 col-4 ">
                                                    <label>Type: </label>
                                                    <select  name="type" wire:model="type" class="form-control type" id="type" >
                                                        <option value="1" selected >Percentage</option>
                                                        <option value="2"  >Amount</option>
                                                    </select>
                                                </div>
                                                <div class="mb-1 col-4 percentage " id="percentage" >
                                                        <label >Enter Percentage: </label>
                                                        <input type="text" name="percentage" wire:model="percentage" placeholder="Enter Percentage for coupon" class="form-control" />
                                                        @error('percentage') <span class="text-danger error">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-1  col-4 percentage " id="max_amount" >
                                                        <label >Maximum Amount: </label>
                                                        <input type="text" name="max_amount" wire:model="max_amount"  placeholder="Maximum Amount for coupon" class="form-control" />
                                                        @error('max_amount') <span class="text-danger error">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-1 col-4 amount " id="amount" >
                                                    <label>Enter Amount: </label>
                                                    <input type="text" name="amount" placeholder="Enter Amount for coupon" wire:model="amount"  class="form-control" />
                                                    @error('amount') <span class="text-danger error">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-1 col-4 offer"  >
                                                    <label>Offer Type: </label>
                                                    <select  name="offer_type" id="offer_type"  class="form-control offer-type " wire:model="offer_type" >
                                                        <option value="1" selected >New</option>
                                                        <option value="2"  >Category</option>
                                                        <option value="3"  >Product</option>
                                                    </select>
                                                    @error('offer_type') <span class="text-danger error">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-1 col-4 category">
                                                    <label>Select Category: </label>
                                                    <select  name="category_id"  class="form-control" wire:model="category_id" >
                                                        {{-- @foreach ($categories as $category)
                                                        <option value="{{$category->id}}"  >{{$category->name}}</option>
                                                        @endforeach --}}
                                                    </select>
                                                    @error('category_id') <span class="text-danger error">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-1 col-4  product">
                                                    <label>Select Product: </label>
                                                    <select  name="product_id"  class="form-control" wire:model="product_id" >
                                                        {{-- @foreach ($products as $product)
                                                        <option value="{{$product->id}}"  >{{$product->english_name}}</option>
                                                        @endforeach --}}
                                                    </select>
                                                    @error('product_id') <span class="text-danger error">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-1  col-4">
                                                    <label >User Limit: </label>
                                                    <input type="text" name="user_limit" placeholder="Maximum Amount for coupon" wire:model="user_limit" class="form-control" />
                                                    @error('user_limit') <span class="text-danger error">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-1  col-4">
                                                    <label >Coupon Limit: </label>
                                                    <input type="text" name="max_limit" placeholder="Maximum Amount for coupon" class="form-control" wire:model="max_limit" />
                                                    @error('max_limit') <span class="text-danger error">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-1 col-4 ">
                                                    <label>Expiry Date: </label>
                                                    <input type="text" wire:model="valid_date" name="valid_date" placeholder="Exipiry-Date" class="form-control flatpickr-basic flatpickr-input" />
                                                    @error('valid_date') <span class="text-danger error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" >Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Floating Label Form section end -->
@endsection

