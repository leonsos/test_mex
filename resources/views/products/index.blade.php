@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card border-0 shadow table-wrapper table-responsive">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h2 class="mb-4 h5 text-primary">{{ __('Products') }}</h2>
                <button class="btn btn-secondary animate-up-2" data-bs-toggle="modal" data-bs-target="#modal-default">create <i class="fas fa-plus"></i></button>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-gray-200">{{ __('Name') }}</th>
                            <th class="border-gray-200">{{ __('price') }}</th>
                            <th class="border-gray-200">{{ __('Tax') }}</th>
                            <th class="border-gray-200">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                            <tr>
                                <td><span class="fw-normal">{{ $p->name }}</span></td>
                                <td><span class="fw-normal">{{ $p->price }}</span></td>
                                <td><span class="fw-normal">{{ $p->tax }}</span></td>
                                <td style="display: flex;justify-content:end;">
                                    <button style="margin-right: 2px;" class="btn btn-secondary animate-up-2"
                                    data-bs-toggle="modal" data-bs-target="#modal-default-add{{$p->id}}"
                                    ><i class="fas fa-edit"></i></button>
                                    {{-- <a href="#" class="btn btn-secondary animate-up-2"><i class="fas fa-trash"></i></a> --}}
                                    <form action="{{route('products.delete',$p)}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-secondary"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @include('layouts.modal_edit_product')
                        @endforeach
                    </tbody>
                </table>
            </div>           
        </div>
    </div>
    @include('layouts.modal_add_product')
@endsection
