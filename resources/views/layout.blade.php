<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Movie</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="max-w-7xl mx-auto bg-amber-100">
<h1 class="text-3xl font-bold underline p-3 w-fit mx-auto">
    Moodle
</h1>
<div class=" m-2 p-2 mx-auto">
    {{$slot}}
</div>
@livewireScripts

{{--<script>--}}
{{--    const gameState = localStorage.getItem("gameState");--}}
{{--    console.log(gameState);--}}
{{--    if(!gameState){--}}
{{--        const gameState = {--}}
{{--            selectedMovies: [],--}}
{{--        };--}}
{{--        localStorage.setItem("gameState", JSON.stringify(gameState));--}}
{{--    } else {--}}
{{--        const gameState = JSON.parse(localStorage.getItem("gameState"));--}}
{{--    }--}}
{{--</script>--}}

</body>
</html>
