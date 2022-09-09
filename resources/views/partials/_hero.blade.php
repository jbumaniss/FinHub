<section class="relative h-60 bg-finHub flex flex-col justify-center align-center text-center space-y-4 w-90">

    <div class="absolute top-0 left-0 w-full h-full opacity-60 bg-no-repeat bg-center"
         style="background-image: url('{{asset('images/logo.jpg')}}')">
    </div>

    <div class="z-9">

        <h1 class="text-6xl font-bold uppercase text-white">
            Fin<span class="text-black">Hub</span>
        </h1>

        <p class="text-2xl text-gray-200 font-bold my-4">
            Find your investment
        </p>
        @if(!auth())
        <div>
            <a href="/register"
               class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">
                Sign Up to build your dream
            </a>
        </div>
        @endif

    </div>

</section>
