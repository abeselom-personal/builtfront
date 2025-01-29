@extends('frontend.layout-v2.master')
@section('title', 'Boost Home Sales with Builtfront\'s Sales CRM')
<?php
$faqs = [
    [
        'question' => 'Can {app_name} help me identify and manage sales leads?',
        'answer' => 'Utilize the built-in CRM tools to capture leads, track their progress through the sales funnel, and prioritize opportunities.'
    ],
    [
        'question' => 'Does {app_name} help me create and manage sales proposals?',
        'answer' => 'Yes, {app_name} allows you to generate professional proposals with customizable templates and pricing options.'
    ],
    [
        'question' => 'How can {app_name} improve communication with potential clients?',
        'answer' => 'Utilize reminder tools, track communication history, and schedule follow-up tasks within the platform'
    ],
    [
        'question' => 'How can {app_name} shorten my sales cycle?',
        'answer' => 'Streamlined lead management, proposal generation, and communication tools can help you close deals faster.'
    ]
];
?>
@section('content')
    <!-- ------------------sales process hero --------- -->
    <section
            class="py-32 md:px-20 px-5 grid md:grid-cols-2 grid-cols-1 gap-10 items-center relative overflow-hidden bg_construction_hero"
    >
        <div
                class="flex flex-col items-center text-center md:items-start md:text-left gap-5 md:w-[616px] w-full"
        >
            <p class="font-large text-base text-primary">Sales Management</p>
            <h1
                    class="text-5xl leading-[60px] md:text-[56px] md:leading-[67.2px] font-bold text-black"
            >
                Streamline <span class="text-primary">Sales Process</span> for Home
                Builders
            </h1>
            <p class="text-lg font-normal text-secondary">
                Designed to help home builders improve their sales process and client relationships.
                Utilize features like Sales Proposals, Sales Pipeline, and Lead Management to simplify
                your workflow and provide exceptional service to your clients.
            </p>
            @include('frontend.layout-v2.hero-form')
        </div>
        <div class="z-20 flex justify-end relative w-full h-full">
            <img
                    src="{{ asset('public/frontend-v2/sales_process/Content.png') }}"
                    alt=""
                    class="md:w-[520px] w-full z-50 bg-white"
            />

            <div
                    class="md:w-[520px] h-full rounded-xl w-full absolute -top-2 -right-2 border-[1px] border-[#C8E89D] z-40"
            ></div>
        </div>
        <img
                src="{{ asset('public/frontend-v2/sales_process/Followers.png') }}"
                alt=""
                class="absolute bottom-[10%] md:bottom-[45%] right-[60%] md:right-[27%] md:h-[240px] h-[150px] z-40"
        />
        <img
                src="{{ asset('public/frontend-v2/sales_process/Group_412.png') }}"
                alt=""
                class="absolute bottom-[30%] right-[50%] md:bottom-[70%] md:right-[10%] md:h-[80px] h-[60px] z-40"
        />

        <img
                src="{{ asset('public/frontend-v2/red_arrow_up.png') }}"
                alt=""
                class="absolute md:bottom-6 -bottom-1 md:left-[37%] left-3 rotate-90"
        />
        <img
                src="{{ asset('public/frontend-v2/Group.png') }}"
                alt=""
                class="absolute md:top-14 bottom-5 md:right-[40%] -right-16 z-10"
        />
    </section>

    <!-- ---------------- Lead Management ---------------- -->
    <section
            class="md:px-20 px-5 md:py-36 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden"
    >
        <div class="relative">
            <img
                    src="{{ asset('public/frontend-v2/sales_process/Group_1261154660.png') }}"
                    alt=""
                    class="w-full"
            />
            <img
                    src="{{ asset('public/frontend-v2/sales_process/Size-03.png') }}"
                    alt=""
                    class="absolute top-0 md:-top-[12%] right-0 md:right-5 md:h-[353px] h-[200px]"
            />
        </div>
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Lead Management
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Easily capture and organize leads, track communications, and manage follow-ups.
                With our intuitive interface and powerful tools, you can stay on top of your
                leads and close deals faster.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Capture and Organize Leads
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Track Communications
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Manage Follow-ups
            </span>
                </li>
            </ul>
        </div>

        <img
                src="{{ asset('public/frontend-v2/Ellipse_87.png') }}"
                alt=""
                class="absolute top-32 -right-10"
        />
        <img
                src="{{ asset('public/frontend-v2/red_arrow_up.png') }}"
                alt=""
                class="absolute bottom-0 right-1/2 -translate-x-1/2 rotate-90"
        />
    </section>

    <!-- -------------- Proposals -->
    <section
            class="md:px-20 px-5 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden"
    >
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <div>
                <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                    Estimates & Proposals
                </h2>
            </div>
            <p class="text-secondary font-normal text-base md:text-lg">
                Create, send, and track customized sales proposals within the
                Builtfront platform. Impress your clients with professional and
                personalized proposals that showcase your expertise and attention to
                detail.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Create Customized Proposals
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Track Proposal Progress
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Win More Deals with Professional Proposals
            </span>
                </li>
            </ul>
        </div>
        <div class="">
            <img
                    src="{{ asset('public/frontend-v2/sales_process/Group_1261154664.png') }}"
                    alt=""
                    class="w-full"
            />
        </div>

        <img
                src="{{ asset('public/frontend-v2/sales_process/Rectangle_25.png') }}"
                alt=""
                class="absolute -bottom-3 left-20 hidden md:flex"
        />
        <img
                src="{{ asset('public/frontend-v2/red_arrow_up.png') }}"
                alt=""
                class="absolute -bottom-3 left-0 rotate-90 hidden md:flex"
        />
    </section>

    <!-- ---------------- Sales Pipeline ---------------- -->
    <section
            class="md:px-20 px-5 md:py-32 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden mt-10"
    >
        <div class="relative">
            <img
                    src="{{ asset('public/frontend-v2/sales_process/Group_1261154660_1.png') }}"
                    alt=""
                    class="w-full rounded-2xl md:w-[450px] md:h-[360px] h-full"
            />
            <img
                    src="{{ asset('public/frontend-v2/sales_process/Frame_482666.png') }}"
                    alt=""
                    class="absolute -top-5 -right-3 md:w-[600px] md:h-[372px] w-full h-full"
            />
        </div>
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <div>
                <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                    Sales Pipeline
                </h2>
            </div>
            <p class="text-secondary font-normal text-base md:text-lg">
                Easily visualize their sales process, identify bottlenecks, and improve conversion rates.
                With a clear overview of each stage in the pipeline, track the progress of your prospects,
                prioritize leads, and take proactive actions to close deals faster.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Visualize Sales Process
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Identify Bottlenecks
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Improve Conversion Rates
            </span>
                </li>
            </ul>
        </div>

        <img
                src="{{ asset('public/frontend-v2/Ellipse_87.png') }}"
                alt=""
                class="absolute top-24 -right-10"
        />
        <img
                src="{{ asset('public/frontend-v2/red_arrow_up.png') }}"
                alt=""
                class="absolute -bottom-8 right-1/2 -translate-x-1/2 rotate-90"
        />
    </section>

    <!-- ---------------- Project Management ---------------- -->
    <section
            class="md:px-20 px-5 md:py-20 py-10 flex flex-col md:flex-row gap-10 md:gap-20 items-center relative overflow-hidden my-20"
    >
        <div class="z-50">
            <img
                    src="{{ asset('public/frontend-v2/construction/Group_1261154681.png') }}"
                    alt=""
                    class="rounded-full shadow_m border-[36px] border-custGray"
            />
        </div>
        <div class="space-y-7 text-center md:text-left">
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Sales Management
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Efficiently manage tasks, schedules, budgets, and more with Builtfront
            </p>
            <div class="flex items-center justify-center md:justify-start gap-5">
                <a href="{{ url('/account/signup') }}" class="main_btn">Get Started For Free</a>
            </div>
        </div>

        <img
                src="{{ asset('public/frontend-v2/Group_70.png') }}"
                alt=""
                class="absolute bottom-10 right-0"
        />
        <img
                src="{{ asset('public/frontend-v2/sales_process/rec.png') }}"
                alt=""
                class="absolute top-10 left-0 z-0"
        />
    </section>

    <!-- ------------------------ faq----------------- -->
    @include('frontend.layout-v2.dynamic-faqs', ['faqs' => $faqs])

@endsection

@push('head')
    <meta name="description" content=" Convert more leads into home sales with Builtfront's sales CRM. Manage your sales pipeline, track opportunities, and improve closing rates.">
    <link rel="canonical" href="{{ url('/page/sales-management') }}" />
@endpush