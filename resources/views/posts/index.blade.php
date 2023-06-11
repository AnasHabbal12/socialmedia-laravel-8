@extends('layouts.app')

@section('content')
    <div class="container"> 
        @foreach ($posts as $post)
        <div class="row">
            <div class="col-5 offset-4">
                <a href="/profile/{{ $post->user->id }}">
                    <img src="/storage/{{ $post->image }}" alt="" class="w-100">
                </a>               
            </div>
        </div>
        <div class="row pt-2 pd-6">
            <div class="col-5 offset-4">
                <div>
                    <p><a href="/profile/{{ $post->user->id }}"><span class="text-dark font-weight-bold">{{ $post->user->username }}</span></a> {{ $post->caption }}</p>
                </div>
                
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
        
    </div>
@endsection
