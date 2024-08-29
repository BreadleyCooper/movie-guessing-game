<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Movie</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="max-w-7xl mx-auto border border-1 border-black">
<h1 class="text-3xl font-bold underline p-3">
    Hello world!
</h1>
<div class="border border-1 border-red-500 m-2 p-2">
    <livewire:movie />
</div>
@livewireScripts

</body>
</html>
