<x-modal>

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

</x-modal>
