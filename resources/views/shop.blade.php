<div class="bg-lightblue p-10">
    <span class="font-bold text-black text-4xl">
        Marketplace
    </span>
    <div class="h-14 w-96 bg-darkblue rounded-xl my-5 text-white font-bold p-2">
        <div class="flex flex-row">
            @auth
                <div class="flex-grow">{{ auth()->user()->gold }}</div>
                <div class="flex-grow">{{ auth()->user()->points }}</div>
            @endauth
        </div>
    </div>
    <div class="flex flex-wrap justify-evenly">
        @foreach($materials as $material)
            <x-material-card :material="$material" />
        @endforeach
    </div>
</div>



