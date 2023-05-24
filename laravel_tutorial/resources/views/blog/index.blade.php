<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>

    {{-- {{ $posts->title }} --}}
    {{-- {{ dump($posts) }} --}}
    {{-- @if (count($posts) < 100)
        <h1>
            {{ dd($posts) }}
        </h1>
    @elseif (count($posts) === 102)
        <h1>
            You have exactly 102 posts
        </h1>
    @else
        <h1>
            No posts
        </h1>
    @endif --}}
    @forelse ($posts as $post)
        {{ $loop->parent }}
    @empty
        <p>No posts have been set</p>
    @endforelse

</body>
</html>