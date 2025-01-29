@if($faqs)
<section id="faqs" class="md:px-20 px-5 py-20 mb-50 bg-custGray relative">
    <div
            class="mb-10 flex flex-col items-center justify-center text-center gap-5"
    >
        <h2 class="text-5xl font-bold text-black">{!! $title ?? "FAQs"  !!}</h2>
        <p class="text-secondary text-base font-normal">
            {{ $description ?? 'Find answers to common questions about our features and how they can benefit you.' }}
        </p>
    </div>

    <div class="flex flex-col items-center justify-center">
        @foreach($faqs as $index => $faq)
            <div class="faq border-b border-grey @if($index == 0) border-t border-grey @endif">
                <div class="faq_top">
                    <h3 class="faq_title">{{ str_replace('{app_name}', config('app.name'), $faq['question']) }}</h3>
                    <div class="faq_icon">
                        <img src="{{ asset('public/frontend-v2/arrowicon.png')}}" alt="" />
                    </div>
                </div>
                <div class="faq_content">
                    <p>
                        {{ str_replace('{app_name}', config('app.name'), $faq['answer']) }}
                    </p>
                </div>
            </div>
        @endforeach

    </div>

    <img
            src="{{ asset('public/frontend-v2/faq.png') }}"
            alt=""
            class="absolute bottom-[40%] right-0 hidden md:flex"
    />
    <img
            src="{{ asset('public/frontend-v2/faq2.png') }}"
            alt=""
            class="absolute top-[10%] left-0 hidden md:flex"
    />
</section>
@endif