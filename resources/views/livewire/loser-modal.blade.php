<x-modal>
            <div class="flex justify-between">
                <div>
                    <h3 class="text-3xl font-bold">You Lose!</h3>
                </div>
                <button class="h-min w-8" @click="$dispatch('closeLoserModal')">
                    <img
                        src="{{\Illuminate\Support\Facades\Vite::asset('resources/images/closeIcon.svg')}}"
                    >

                </button>
            </div>
            <x-guess-container :dailyMovie="$dailyMovie" :selectedMovie="$selectedMovie" />

</x-modal>
