<?php
$faqs = \App\Models\Landlord\Faq::OrderBy('faq_position', 'ASC')->get();
$content = \App\Models\Landlord\Frontend::Where('frontend_name', 'page-faq')->first();

?>

@if($faqs->count())
    <!-- ------------------------ faq----------------- -->
    <section id="faqs" class="md:px-20 px-5 py-20 bg-custGray relative">
        <div
                class="mb-10 flex flex-col items-center justify-center text-center gap-5"
        >
            <h3 class="text-5xl font-bold text-black">{{ $content->frontend_data_1 }}</h3>
            <p class="text-secondary text-base font-normal">
                {{ $content->frontend_data_2 }}
            </p>
        </div>





        <div class="flex flex-col items-center justify-center">
            @foreach($faqs as $index => $faq)
                <div class="faq border-grey border-b @if($index == 0) border-t @endif">
                    <div class="faq_top">
                        <h3 class="faq_title">{{ $faq['faq_title'] }}</h3>
                        <div class="faq_icon">
                            <img src="{{ asset('public/frontend-v2/arrowicon.png')}}" alt="" />
                        </div>
                    </div>
                    <div class="faq_content">
                        <p>
                            {{ $faq['faq_content'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <img
                src="{{ asset('public/frontend-v2/faq.png')}}"
                alt=""
                class="absolute bottom-[10%] right-0 hidden md:flex"
        />
        <img
                src="{{ asset('public/frontend-v2/faq2.png')}}"
                alt=""
                class="absolute top-[10%] left-0 hidden md:flex"
        />
    </section>
@endif
