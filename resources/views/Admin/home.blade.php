@extends('admin.layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if ($user->name)
                        <span>Welcome back, {{$user->name}}</span>
                    @else
                        <span>Welcome back!</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
