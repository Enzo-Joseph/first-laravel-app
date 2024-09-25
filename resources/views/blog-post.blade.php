<x-layout>
    <x-slot:title>{{$title}}</x-slot>

    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <a href='/blog/{{$post["slug"]}}' class="font-medium text-gray-900 hover:underline">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{$post['title']}}</h2>
        </a>
        <div>
            <a href="/authors/{{ $post->author->username }}" class="text-base text-gray-500 hover:underline">
                {{ $post->author->name }}
            </a>
             |
            <a href="/category/{{ $post->category->slug }}" class="text-base text-gray-500 hover:underline">
                {{ $post->category->name }}
            </a>
             | {{ $post->created_at->diffForHumans() }}
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>
        <a href='/blog' class="font-medium text-blue-500 hover:underline">&laquo; Back</a>
    </article>
</x-layout>
