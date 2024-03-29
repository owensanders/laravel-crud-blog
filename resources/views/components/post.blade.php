@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('user.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span
        class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
    <p class="mb-2">{{ $post->body }}</p>

    <div class="flex item-center">
        @auth
            @if(!$post->likedBy(auth()->user()))
                <form action="{{ route('post.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('post.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500 mr-1">Delete</button>
                </form>
            @endcan
        @endauth
        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>
