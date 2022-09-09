<x-layout>

    @include('partials._hero')

    @include('partials._heroInStock', ['stocks' => $stocks])
    @include('partials._mainPageHero')


    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">


    </div>


</x-layout>
