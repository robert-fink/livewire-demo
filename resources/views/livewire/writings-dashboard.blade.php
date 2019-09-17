<div class="p-3 w-auto text-center block">

    <h1 class="text-center font-bold text-5xl">Writings</h1>

    <br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <span class="block text-center px-4 py-2 mt-2">
        <div class="w-auto inline-block text-center">
            <div class="px-6 py-4">
                <div class="font-bold text-xl tracking-wide">
                    <input wire:model="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Title">
                </div>
                <div class="font-bold text-xl tracking-wide">
                    <textarea wire:model="entry" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Write something..."></textarea>
                </div>

                <br>

                <div class="font-bold text-xl tracking-wide">
                    <button wire:click="save" class="bg-white text-gray-800 font-bold rounded border-b-2 border-purple-500 hover:border-purple-600 hover:bg-purple-500 hover:text-purple-500 shadow-md py-2 px-6 inline-flex items-center">
                        <span class="mr-2">Save</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="hover:text-purple-500 hover:border-purple-600"><path d="M13 3h2.996v5h-2.996v-5zm11 1v20h-24v-24h20l4 4zm-17 5h10v-7h-10v7zm15-4.171l-2.828-2.829h-.172v9h-14v-9h-3v20h20v-17.171z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </span>

    <hr>

    <br>

    @if(isset($writings) && !empty($writings))

        @foreach($writings as $writing)

            <span class="block text-center px-4 py-2 mt-2">
                <div class="w-auto inline-block text-center rounded material-card bg-white">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl tracking-wide">{{ $writing['title'] }}</div>
                        <div class="text-gray-500 text-sm mb-3">{{ $writing['name'] ?? $writing['user']['name'] }} - {{ $writing['created_at'] }}</div>
                        <p class="text-gray-700 text-base">
                            {{ $writing['entry'] }}
                        </p>
                    </div>
                    <div class="mx-4 mt-2 mb-4">

                        @if(!preg_match('/lorem ipsum/i', $writing['title']))

                            <button wire:click="delete({{ $writing['id'] }})" class="tracking-wider uppercase font-bold text-red-700 hover:bg-red-100 rounded p-2 inline-block">Delete</button>

                        @endif

                    </div>
                </div>
            </span>

        @endforeach

    @endif

</div>
