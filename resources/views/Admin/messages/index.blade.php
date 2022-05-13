@extends('admin.layouts.base')

@section('pageTitle', 'Message list')

@push('script')
    <script src="{{ asset('js/messages.js') }}" defer></script>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Lista dei Messaggi</h1>

                @foreach ($messages as $message )
                <div class="list-group">
                
                    <a data-toggle="collapse" href="#collapse{{$message->id}}" role="button" aria-expanded="false" aria-controls="collapse{{$message->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$message->sender_name}}</h5>
                        <small>{{$message->created_at}}</small>
                      </div>
                      <small>{{$message->apartment->title}}</small>
                      <div class="collapse" id="collapse{{$message->id}}">
                        <div class="card card-body">
                            <p>{{$message->message}}</p>
                            <div class="text-right">
                                <button class="btn btn-primary">Reply</button>
                            </div>
                        </div>
                    </a>
                </div>
                    @endforeach


            </div>
        </div>
    </div>

 
@endsection