@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Bill details</h3>
                <a href="{{route('dashboard')}}" type="button" class="btn btn-block btn-primary mb-3 animate-up-2">Back <i class="fas fa-reply"></i> </a>
            </div>
            <div class="card-body border-0 shadow table-wrapper table-responsive">                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-gray-200">{{ __('Name') }}</th>
                            <th class="border-gray-200">{{ __('Price') }}</th>
                            <th class="border-gray-200">{{ __('Tax') }}</th>                        
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($bills_details as $b)
                            <tr>
                                <td><span class="fw-normal">{{ $b->name }}</span></td>
                                <td><span class="fw-normal">{{ $b->price }}</span></td>                            
                                <td><span class="fw-normal">{{ $b->tax }}</span></td>                                                        
                            </tr>
                            
                        @endforeach 
                    </tbody>
                </table>
                <div
                    class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                    {{-- {{ $bills_details->links() }} --}}
                </div>
            </div>
        </div>
    </div>
    
@endsection
