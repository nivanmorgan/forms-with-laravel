@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-7 col-md-10 col-sm-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                <forms></forms>
            </div>
        </div>
    </div>
@endsection

@stack('scripts')
