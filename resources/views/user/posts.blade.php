@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <a href="{{ route('user.other-profile') }}" class="text-2xl font-medium mb-1">{{ $user->name }}</a>
                <p class="mt-3">Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg">
                @if($posts->count())
                    @foreach($posts as $post)
                        <x-post :post="$post"/>
                    @endforeach

                    {{ $posts->links() }}
                @else
                    <p>{{ $user->name }} does not have any posts!</p>
                @endif
            </div>
        </div>
    </div>
@endsection
