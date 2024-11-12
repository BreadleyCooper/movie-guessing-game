<div class="flex flex-col ">
    <div class="absolute top-0 left-0 w-screen h-screen bg-black/50 z-10">
    </div>
    <div class="flex flex-col items-center justify-center">
        <div class="z-20 bg-white p-4 rounded-md">
            <div class="flex justify-between">
                <div>
                    <h3 class="text-3xl font-bold">Congratulations!</h3>
                </div>
                <button class="h-min w-8" @click="$dispatch('closeWinnerModal')">
                    <img
                    src="{{\Illuminate\Support\Facades\Vite::asset('resources/images/closeIcon.svg')}}"
                    >

                </button>
            </div>
            <x-guess-container :dailyMovie="$dailyMovie" :selectedMovie="$dailyMovie" />
        </div>
    </div>
</div>
