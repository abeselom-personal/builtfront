@extends('frontend.layout-v2.master')
@section('title', 'Streamline Home Construction Projects with Builtfront')
<?php
$faqs = [
    [
        'question' => 'How can {app_name} help me improve project scheduling?',
        'answer' => 'Utilize Gantt charts, task dependencies, and critical path analysis tools to create clear and efficient project schedules.'
    ],
    [
        'question' => 'Can I track project progress and identify delays in real-time?',
        'answer' => 'Yes, {app_name} offers dashboards and reports that provide a real-time overview of project progress and potential delays.'
    ],
    [
        'question' => 'How does {app_name} help with project budgeting and cost control?',
        'answer' => 'Create detailed project budgets, track expenses, and receive alerts for potential budget overruns.'
    ],
    [
        'question' => 'Can I collaborate with subcontractors and vendors through {app_name}?',
        'answer' => 'Yes, {app_name} allows you to invite subcontractors and vendors to relevant projects for improved communication and collaboration.'
    ],[
        'question' => 'Does {app_name} help with document management for projects?',
        'answer' => 'Yes, {app_name} provides a centralized platform for storing,and sharing, of all project documents.'
    ],
    [
        'question' => 'How can {app_name} improve communication within my project teams?',
        'answer' => 'Utilize task comments, team chat features, and built-in notifications to keep everyone informed and on the same page.'
    ]

];

?>
@section('content')

    <!-- ------------------construcetion hero --------- -->
    <section
            class="py-32 md:px-20 px-5 grid md:grid-cols-2 grid-cols-1 gap-10 items-center relative overflow-hidden bg_construction_hero"
    >
        <div
                class="flex flex-col items-center text-center md:items-start md:text-left gap-5 md:w-[616px] w-full"
        >
            <p class="font-large text-base text-primary">Project Management</p>
            <h1
                    class="text-5xl leading-[60px] md:text-[52px] md:leading-[65.2px] font-bold text-black"
            >
                Efficient Project Management for Home
                <span class="text-primary">Construction</span> Builders
            </h1>
            <p class="text-lg font-normal text-secondary">
                Builtfront streamlines home construction project management with
                features like task scheduling, time tracking, budgeting, expenses,
                estimating, document management, and reporting in one platform.
            </p>
            @include('frontend.layout-v2.hero-form')
        </div>
        <div class="relative w-full flex justify-end">
            <img
                    src="{{ asset('public/frontend-v2/construction/Content.png') }}"
                    alt=""
                    class="md:w-[520px] w-full"
            />

            <img
                    src="{{ asset('public/frontend-v2/Group.png') }}"
                    alt=""
                    class="absolute md:-top-16 md:-left-3 -right-16 z-10"
            />
        </div>
        <img
                src="{{ asset('public/frontend-v2/construction/Group.png') }}"
                alt=""
                class="absolute md:bottom-10 bottom-20 md:right-14 md:h-[400px]"
        />

        <img
                src="{{ asset('public/frontend-v2/red_arrow_up.png') }}"
                alt=""
                class="absolute md:bottom-6 -bottom-1 md:left-[37%] left-3 rotate-90"
        />
    </section>
    
    <!-- ---------------- project tasks ---------------- -->
    <section
            class="md:px-20 px-5 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden"
    >
        <div class="">
            <img
                    src="{{ asset('public/frontend-v2/construction/Group_1261154650.png') }}"
                    alt=""
                    class="w-full"
            />
        </div>
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Tasks & Scheduling
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Manage and track project tasks, set deadlines, and schedule work efficiently.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Stay on track with task deadlines and schedules
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Effortlessly prioritize and manage project tasks
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Streamline task organization and scheduling for construction
              projects
            </span>
                </li>
            </ul>
        </div>

        <img
                src="{{ asset('public/frontend-v2/Ellipse_87.png') }}"
                alt=""
                class="absolute top-10 -right-10"
        />
    </section>

    <!-- -------------- Time Tracking -->
    <section
            class="md:px-20 px-5 mt-16 mb-10 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center bg-[#F2F9E7] relative"
    >
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Time Tracking
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Record and monitor the time spent on various tasks, providing a clear overview of
                project progress and resource allocation.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Track and Manage Time Efficiently
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Stay on Schedule with Time Tracking
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Optimize Productivity with Time Tracking
            </span>
                </li>
            </ul>
        </div>
        <div class="z-50">
            <img
                    src="{{ asset('public/frontend-v2/construction/Group_1261154650.png') }}"
                    alt=""
                    class="w-full"
            />
        </div>

        <img
                src="{{ asset('public/frontend-v2/construction/Clip_path_group.png') }}"
                alt=""
                class="absolute bottom-10 right-6 z-0"
        />
    </section>

    <!-- ---------------- Project Finances ---------------- -->
    <section
            class="md:px-20 px-5 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden"
    >
        <div class="">
            <img
                    src="{{ asset('public/frontend-v2/construction/Group_1261154651.png') }}"
                    alt=""
                    class="w-full rounded-2xl"
            />
        </div>
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Bills & Expense Tracking
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Log bills, track expenses in real-time, and maintain a clear overview of your project finances.
                Stay on top of your budget and ensure financial success.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Expense Categorization
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Attach Receipts and Invoices
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Audit Trail
            </span>
                </li>
            </ul>
        </div>

        <img
                src="{{ asset('public/frontend-v2/Ellipse_87.png') }}"
                alt=""
                class="absolute top-10 -right-10"
        />
    </section>


    <!-- -------------- Project Insights -->
    <section class="md:px-20 px-5 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 gap-10 items-center bg-[#F2F9E7] relative">
        <div class="space-y-7 text-center md:text-left flex flex-col items-center justify-center md:justify-start md:items-start">
            <img src="{{ asset('public/frontend-v2/construction/Placeholder.png') }}" alt="" />
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Reports
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Generate reports to gain valuable insights on project progress and performance. Stay informed and make
                data-driven decisions.
            </p>
        </div>
        <div class="z-30">
            <img
                    src="{{ asset('public/frontend-v2/construction/Group_1261154654.png') }}"
                    alt=""
                    class="w-full"
            />
        </div>

        <img
                src="{{ asset('public/frontend-v2/construction/Clip_path_group.png') }}"
                alt=""
                class="absolute bottom-10 right-7 z-0"
        />
        <img
                src="{{ asset('public/frontend-v2/construction/Followers.png') }}"
                alt=""
                class="absolute top-[25%] right-[35%] z-50 hidden md:flex"
        />
    </section>


    <!-- ---------------- Document Management ---------------- -->
    <section
            class="md:px-20 px-5 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden"
    >
        <div class="">
            <img
                    src="{{ asset('public/frontend-v2/construction/Group_1261154653.png') }}"
                    alt=""
                    class="w-full rounded-2xl"
            />
        </div>
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Document and Media Storage
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Builtfront's Documents/Files management system allows home builders to
                store, share, and collaborate on project-related documents securely.
                With this feature, builders can easily access and manage all their
                important files in one centralized location, eliminating the need for
                manual document handling and reducing the risk of misplacing or losing
                important information.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Store and Organize Project-Related Documents
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Efficient File Sharing and Collaboration
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Enhance Team Productivity with Seamless Document Management.
            </span>
                </li>
            </ul>
        </div>

        <img
                src="{{ asset('public/frontend-v2/Ellipse_87.png') }}"
                alt=""
                class="absolute top-10 -right-10"
        />
    </section>

    <!-- ---------------- Project Management ---------------- -->
    <section class="md:px-20 px-5 my-10 md:py-20 py-10 flex flex-col md:flex-row gap-10 md:gap-20 items-center relative overflow-hidden">
        <div class="">
            <img
                    src="{{ asset('public/frontend-v2/construction/Group_1261154681.png') }}"
                    alt=""
                    class="rounded-full shadow_m border-[36px] border-custGray"
            />
        </div>
        <div class="space-y-7 text-center md:text-left">
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Streamline your
                <span class="text-primary">Project Management</span> Process
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Efficiently manage tasks, schedules, budgets, and more with Builtfront
            </p>
        </div>

        <img
                src="{{ asset('public/frontend-v2/Group_70.png') }}"
                alt=""
                class="absolute bottom-32 right-0"
        />
    </section>

    <!-- ------------------------ faq----------------- -->
    @include('frontend.layout-v2.dynamic-faqs', ['faqs' => $faqs])

@endsection

@push('head')
    <meta name="description" content="Take control of your home building projects with Builtfront's project management tools. Manage schedules, budgets, and teams effortlessly.">
    <link rel="canonical" href="{{ url('/page/project-management') }}" />
@endpush