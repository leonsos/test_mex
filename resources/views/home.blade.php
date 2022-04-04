@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <form action="{{route('save.shopping')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <h2 class="fs-5 fw-bold mb-1">{{ __('Products') }}</h2>                            
                                <card class="body">
                                    <label class="my-1 me-2" for="product_id">Products</label>
                                    <select class="form-select" id="product_id" aria-label="Default select example"
                                        name="product_id" required>
                                        <option selected>Open this select to see al product than you can buy</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="card-footer">
                                        <button type="submit" class="btn w-100 btn-secondary animate-up-2 text-dark">Purchase                                       
                                        </button>
                                    </div>
                                </card>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
