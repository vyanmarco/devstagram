<div>

    <div class="container mx-auto">

        <div class="grid grid-cols-1 xl:grid-cols-3">
            @if ($posts->count())
        
            @foreach ($posts as $post)
                <!-- component -->
                <div class="bg-gray-100 p-4 mx-auto">
                    <div class="bg-white border rounded-lg max-w-md">
                    <div class="flex items-center px-4 py-3">
                        <a href="{{route('post.index', $post->user->username)}}">
                            <img class="h-8 w-8 rounded-full" src="{{ $post->user->imagen ? asset('perfiles/' . $post->user->imagen) : asset('img/user-icon.svg') }}"/>
                        </a>
                        <div class="ml-3 ">
                        <a href="{{route('post.index', $post->user->username)}}" class="text-sm font-semibold antialiased block leading-tight">{{ $post->user->username }}</a>
                        <span class="text-gray-600 text-xs block"> {{$post->created_at->diffForHumans()}} </span>
                        </div>
                    </div>
                    <a href="{{route('posts.show', ['user' => $post->user->username, 'post' => $post->id])}}">
                        <img src="{{asset('uploads/' . $post->imagen)}}"/>
                    </a>
                    <div class="flex items-center justify-between mx-4 mt-3 mb-2">
                        
                    </div>
                    <div class="font-semibold text-sm mx-4 mt-2 mb-4"></div>
                    </div>
                </div>        
            @endforeach
            @else
                <p class="text-lg font-mono font-bold text-gray-500 lg:text-xl dark:text-gray-400 text-center col-span-3">No hay publicaciones para mostrar</p>
            @endif
        </div>
    </div>

</div>