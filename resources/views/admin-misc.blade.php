<div class="w-full h-screen relative">
    <div class="w-full flex flex-wrap content-center items-center flex-col justify-center h-1/3 bg-themegreen">
        <button id="finish-btn" class="font-bold h-10 rounded-xl w-40 h-20 bg-darkblue text-themeyellow text-xl btn hover:bg-blue-500 hover:text-white transition duration-300">
            Finish Game
        </button>
    </div>
    <div class="w-full flex flex-wrap content-center items-center flex-col justify-center h-1/3 bg-deepblue">
        <div class="text-3xl font-bold my-5">
            Toggle Finish State
        </div>
        <x-switch-toggle checkboxID="finishCB"
                         originalValue="{{ $misc->finish == 1 ? 'on' : 'off' }}"></x-switch-toggle>
    </div>
    <div class="flex flex-row h-1/3 ">
        <div class="w-1/2 h-full bg-themered flex flex-wrap content-center items-center flex-col justify-center">
            <div class="text-3xl font-bold my-5">
                Use Items
            </div>
            <x-switch-toggle checkboxID="useItemCB"
                             originalValue="{{ $misc->use_item == 1 ? 'on' : 'off' }}"></x-switch-toggle>
        </div>
        <div class="w-1/2 h-full bg-themeyellow flex flex-wrap content-center items-center flex-col justify-center">
            <div class="text-3xl font-bold my-5">
                Freeze Leaderboard
            </div>
            <x-switch-toggle checkboxID="freezeCB"
                             originalValue="{{ $misc->freeze_leaderboard == 1 ? 'on' : 'off' }}"></x-switch-toggle>
        </div>
    </div>
    <div class="absolute right-10 bottom-5 ">
        <button id="save-btn" class="font-bold h-10 rounded-xl w-32 h-10 bg-darkblue text-themeyellow text-sm hover:bg-blue-500 hover:text-white transition duration-300">
            Save Changes
        </button>
    </div>
</div>

<script src="{{ asset('js/adminMisc.js') }}"></script>


