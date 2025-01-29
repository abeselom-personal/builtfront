<section class="md:px-20 px-5 md:py-20 py-10 bg-white">
    <div class="bg-primary w-full rounded-md py-20 overflow-hidden relative">
        <div
                class="flex flex-col items-center justify-center  text-center px-1"
        >
            <h1 class="text-5xl font-bold text-white md:w-1/2 w-full">
                @if(isset($title))
                    {{ $title }}
                @else
                    Still have questions?
                @endif
            </h1>
            <p class="text-white text-lg mt-5">
                {{ $description ?? "Contact our sales team for more information." }}
            </p>
            <a href="{{ url('/contact') }}"
                    class="border border-white text-white px-6 py-3 mt-5 rounded-md"
            >
                {{ $buttonText ?? "Contact" }}
            </a>
        </div>

        <div
                class="absolute -top-[100%] md:-left-[20%] -left-[30%] md:rotate-[110deg]"
        >
            <img src="{{ asset('/public/frontend-v2/OBJECTS.png') }}" alt="OBJECTS" />
        </div>
        <div
                class="absolute md:-bottom-[60%] -bottom-[70%] md:-right-[15%] rotate-[110deg]"
        >
            <img src="{{ asset('/public/frontend-v2/OBJECTS_1.png') }}" alt="OBJECTS" />
        </div>
    </div>
</section>