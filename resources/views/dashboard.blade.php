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
                        <div class="card-body main-dashboard">
                            <div class="row">
                                <div class="col-4 col-lg-4">
                                    <div class="card border-0 shadow animate-up-2">
                                        <div class="card-body">
                                            <div class="row d-block d-xl-flex align-items-center">
                                                <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                                    <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                                        <svg class="icon icon-md" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                                                    </div>
                                                    <div class="d-sm-none">
                                                        <h2 class="fw-extrabold h5"> Bounce Rate</h2>
                                                        <h3 class="mb-1">50.88%</h3>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-7 px-xl-0">
                                                    <div class="d-none d-sm-block">
                                                        <h2 class="h6 text-gray-400 mb-0">Clientes regitrados</h2>
                                                        <h3 class="fw-extrabold mb-2">{{$users = DB::table('users')->where('id','<>','1')->count()}}</h3>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-4 col-lg-4">
                                    <div class="card border-0 shadow animate-up-2">
                                        <div class="card-body">
                                            <div class="row d-block d-xl-flex align-items-center">
                                                <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                                    <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                                        <svg class="icon icon-md" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                                                    </div>
                                                    <div class="d-sm-none">
                                                        <h2 class="fw-extrabold h5"> Bounce Rate</h2>
                                                        <h3 class="mb-1">50.88%</h3>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-7 px-xl-0">
                                                    <div class="d-none d-sm-block">
                                                        <h2 class="h6 text-gray-400 mb-0">Facturas emitidas</h2>
                                                        <h3 class="fw-extrabold mb-2">{{$bills_count = DB::table('bills')->count()}}</h3>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-4 col-lg-4">
                                    <div class="card border-0 shadow animate-up-2">
                                        <div class="card-body">
                                            <div class="row d-block d-xl-flex align-items-center">
                                                <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                                    <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                                        <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                                    </div>
                                                    <div class="d-sm-none">
                                                        <h2 class="fw-extrabold h5"> Bounce Rate</h2>
                                                        <h3 class="mb-1">50.88%</h3>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-7 px-xl-0">
                                                    <div class="d-none d-sm-block">
                                                        <h2 class="h6 text-gray-400 mb-0">Compras pendientes</h2>
                                                        <h3 class="fw-extrabold mb-2">{{$bills_count = DB::table('shoppings')->where('status','=','pending')->count()}}</h3>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
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
