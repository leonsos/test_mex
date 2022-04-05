@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-header d-flex justify-content-between">
                            <h2 class="fs-5 fw-bold mb-1">{{ __('Dashboard') }}</h2>
                            <a href="{{ route('make') }}" class="btn btn-secondary animate-up-2">Facturar <i
                                    class="fas fa-donate"></i></a>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>                                        
                                        <th scope="col">price</th>
                                        <th scope="col">tax</th>
                                        <th scope="col">total</th>
                                        <th scope="col">date</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bills as $b)
                                        <tr>
                                            <th scope="row">{{ $b->id }}</th>
                                            {{-- <td>{{ $b->name }}</td> --}}
                                            <td>{{ $b->total_amount }}</td>
                                            <td>{{ $b->total_tax }}</td>
                                            <td>{{ $b->total_bill }}</td>
                                            <td>{{ $b->post_date_end}}</td>
                                            <td><a href="{{route('bills.details',$b->id)}}" type="button"
                                                    class="animate-up-2 btn btn-primary d-inline-flex align-items-center">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger" role="alert">
                                            whiout data to show!
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
