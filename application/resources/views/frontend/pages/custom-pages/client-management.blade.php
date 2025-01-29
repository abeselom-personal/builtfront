@extends('frontend.layout-v2.master')
@section('title', 'Build Strong Relationships with Your Home Buyers')
<?php
$faqs = [
    [
        'question' => 'How can I improve communication with my clients using {app_name}?',
        'answer' => 'Utilize the built-in messaging system to send updates, share documents, and answer questions directly within the platform.'
    ],
    [
        'question' => 'Can clients see all project details in the client portal?',
        'answer' => 'You can customize access levels within the client portal, allowing them to view specific project details relevant to them.'
    ],
    [
        'question' => 'How can {app_name} help me manage client selections?',
        'answer' => 'Create a centralized selection catalog where clients can browse options, make choices, and track approvals.'
    ],
    [
        'question' => 'Can clients submit change orders through the client portal?',
        'answer' => 'Yes, {app_name} allows clients to submit change order requests electronically, streamlining the approval process.'
    ]
];
?>
@section('content')
    <!-- ------------------client hero --------- -->
    <section
            class="bgImg_client py-24 md:px-20 px-5 grid md:grid-cols-2 grid-cols-1 gap-10 items-center relative overflow-hidden"
    >
        <div
                class="flex flex-col items-center text-center md:items-start md:text-left gap-5"
        >
            <p class="font-large text-base text-primary">Client Management</p>
            <h1
                    class="md:text-[56px] md:leading-[67.2px] text-5xl font-bold text-black"
            >
                Streamline Your <span class="text-primary">Client</span> Interactions
            </h1>
            <p class="md:text-lg text-base font-normal text-secondary">
                Build stronger relationships with your clients. Our client management tools simplify communication and financial
                processes. Give your clients a dedicated portal to track project progress, pay invoices online, and sign documents
                digitally. From start to finish, keep your clients informed and engaged.
            </p>
            @include('frontend.layout-v2.hero-form')
        </div>
        <div class="z-50">
            <img
                    src="{{ asset('public/frontend-v2/client/client_hero_content.png') }}"
                    alt=""
                    class="md:w-[588px] w-full"
            />
        </div>

        <img
                src="{{ asset('public/frontend-v2/red_arrow_up.png') }}"
                alt=""
                class="absolute md:bottom-12 -bottom-3 md:left-[37%] left-3 rotate-90"
        />
        <img
                src="{{ asset('public/frontend-v2/Group.png') }}"
                alt=""
                class="absolute md:top-7 bottom-5 md:right-[42%] -right-16 z-10"
        />
    </section>

    <!-- ---------------- client portal ---------------- -->
    <section
            class="md:px-20 px-5 mb-10 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative"
    >
        <div class="border-[1px] border-primary rounded-2xl p-2">
            <img src="{{ asset('public/frontend-v2/client/people.png') }}" alt="" class="w-full" />
        </div>
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <h2 class="font-bold md:text-[40px] md:leading-[48px] text-4xl">
                Client Portal
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                With the Client Portal, clients have real-time access to project
                updates, important documents, and direct communication with builders,
                ensuring transparency and collaboration throughout the construction
                process.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Stay Informed
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Access Important Documents
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Direct Communication with Builder
            </span>
                </li>
            </ul>
        </div>


        <img
                src="{{ asset('public/frontend-v2/Rectangle_25.png') }}"
                alt=""
                class="absolute md:bottom-0 md:right-0 z-20 hidden md:flex"
        />
        <img
                src="{{ asset('public/frontend-v2/red_arrow_up.png') }}"
                alt=""
                class="absolute md:bottom-0 md:right-28 rotate-90 -z-0 hidden md:flex"
        />
    </section>

    <!-- -------------- {{ config('app.name') }}  messaging -->
    <section
            class="md:px-20 px-5 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden"
    >
        <div class="space-y-7 text-center md:text-left md:w-[618px] w-full">
            <h2 class="font-bold text-3xl md:text-[39px] md:leading-[48px]">
                Messaging & Comments
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Builders and clients can easily communicate and collaborate within the platform.
                Say goodbye to scattered emails and missed messages.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Streamlined communication for efficient project management.
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Real-time messaging for instant updates and feedback.
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Centralized comments for easy reference and collaboration.
            </span>
                </li>
            </ul>
        </div>
        <div class="flex items-center justify-end z-30">
            <img
                    src="{{ asset('public/frontend-v2/client/people2.png') }}"
                    alt=""
                    class="border-[1px] border-primary rounded-2xl z-30 md:w-[500px] p-2"
            />
        </div>

        <img
                src="{{ asset('public/frontend-v2/client/list_people.png') }}"
                alt=""
                class="absolute md:bottom-5 md:right-[30%] z-50 md:h-[279px] hidden md:flex"
        />
        <img
                src="{{ asset('public/frontend-v2/Group.png') }}"
                alt=""
                class="absolute bottom-7 right-0 z-0 hidden md:flex"
        />
    </section>

    <!-- ---------------- {{ config('app.name') }}'s Client ---------------- -->
    <section
            class="md:px-20 px-5 mb-10 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative"
    >
        <div class="border-[1px] border-primary rounded-2xl z-20 p-2">
            <img
                    src="{{ asset('public/frontend-v2/client/people3.png') }}"
                    alt=""
                    class="w-full rounded-2xl"
            />
        </div>
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Client Invoices
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Easily create, send, and track invoices, streamlining the billing process and improving cash flow.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Create Professional Invoices
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Effortlessly Send Invoices to Clients
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Track Payments and Manage Outstanding Invoices
            </span>
                </li>
            </ul>
        </div>

        <img
                src="{{ asset('public/frontend-v2/client/chart_rounded.png') }}"
                alt=""
                class="absolute md:bottom-32 bottom-[70%] md:left-[37%] md:w-[175px] w-[100px] z-50"
        />
        <img
                src="{{ asset('public/frontend-v2/Rectangle_25.png') }}"
                alt=""
                class="absolute md:bottom-0 md:right-0 z-20 hidden md:flex"
        />
        <img
                src="{{ asset('public/frontend-v2/red_arrow_up.png') }}"
                alt=""
                class="absolute md:bottom-0 md:right-28 rotate-90 -z-0 hidden md:flex"
        />

        <img
                src="{{ asset('public/frontend-v2/Group.png') }}"
                alt=""
                class="absolute bottom-7 left-0 z-0 hidden md:flex"
        />
    </section>

    <!-- -------------- {{ config('app.name') }}'s Advanced -->
    <section
            class="md:px-20 px-5 md:py-20 mb-10 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center justify-between relative"
    >
        <div class="space-y-7 text-center md:text-left md:w-[610px] w-full">
            <h2 class="font-bold text-4xl md:text-[39px] md:leading-[48px]">
                Contracts & E-Signatures
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Simplifies the process of creating, sending, and obtaining e-signatures on
                contracts, making contract management effortless.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Create Contracts Easily
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Send Contracts for E-Signatures
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Effortlessly Obtain E-Signed Contracts
            </span>
                </li>
            </ul>
        </div>
        <div class="w-full flex items-center justify-end">
            <img
                    src="{{ asset('public/frontend-v2/client/people4.png') }}"
                    alt=""
                    class="border-[1px] border-primary rounded-2xl z-30 md:w-[500px] p-2"
            />
        </div>

        <div class="absolute bottom-0 md:right-[30%] right-0 z-50">
            <div class="relative">
                <img
                        src="{{ asset('public/frontend-v2/client/service_proposal.png') }}"
                        alt=""
                        class="md:w-[250px] w-[150px]"
                />
                <img
                        src="{{ asset('public/frontend-v2/client/img.png') }}"
                        alt=""
                        class="absolute md:bottom-5 md:right-2 bottom-4 right-0 md:w-[100px] w-[70px]"
                />
            </div>
        </div>
        <img
                src="{{ asset('public/frontend-v2/Group.png') }}"
                alt=""
                class="absolute bottom-7 right-0 z-0 hidden md:flex"
        />
    </section>

    <!-- ---------------- Manage Client ---------------- -->
    <section
            class="md:px-20 px-5 md:py-20 mb-10 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative"
    >
        <div class="border-[1px] border-primary rounded-2xl z-20 p-2">
            <img
                    src="{{ asset('public/frontend-v2/client/people5.png') }}"
                    alt=""
                    class="w-full rounded-2xl"
            />
        </div>
        <div class="space-y-7 text-center md:text-left">
            <h2 class="font-bold md:text-[40px] text-4xl md:leading-[48px]">
                Online Payments
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Securely process client payments and easily track transactions. With our intuitive interface,
                you can streamline your payment processes and ensure a smooth financial workflow.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Effortlessly process client payments with our secure payment
              system.
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Track and manage all transactions in one centralized location.
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Streamline your financial workflow with {{ config('app.name') }}'s Payments
              feature.
            </span>
                </li>
            </ul>
        </div>

        <img
                src="{{ asset('public/frontend-v2/client/Group_1261154693.png') }}"
                alt=""
                class="absolute bottom-0 left-0 md:left-[30%] md:w-[310px] hidden md:flex z-40"
        />
        <img
                src="{{ asset('public/frontend-v2/client/Frame_52049.png') }}"
                alt=""
                class="absolute top-[25%] left-0 md:w-[219px] z-40"
        />
        <img
                src="{{ asset('public/frontend-v2/Group.png') }}"
                alt=""
                class="absolute bottom-7 left-0 z-0 hidden md:flex"
        />
    </section>

    @include('frontend.layout-v2.dynamic-faqs', ['faqs' => $faqs])

@endsection

@push('head')
    <meta name="description" content="Delight your home buyers with exceptional service using Builtfront. Manage client information, communications, and expectations effectively.">
    <link rel="canonical" href="{{ url('/page/client-management') }}" />
@endpush