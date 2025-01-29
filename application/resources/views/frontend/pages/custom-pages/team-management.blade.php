@extends('frontend.layout-v2.master')
@section('title', 'Team Collaboration in Home Building')
<?php
$faqs = [
    [
        'question' => 'How can {app_name} help me improve team collaboration?',
        'answer' => 'Utilize task assignments, team chat features, and project discussions to foster communication and collaboration across teams.'
    ],
    [
        'question' => 'Can I track team member workload and resource allocation with {app_name}?',
        'answer' => 'Yes, {app_name} allows you to assign tasks, track progress, and monitor individual workloads to ensure efficient resource allocation.'
    ],
    [
        'question' => 'Does {app_name} provide reporting tools for team performance?',
        'answer' => '{app_name} may offer reports that provide insights into individual and team performance metrics, allowing you to identify areas for improvement.'
    ]
];

?>
@section('content')
    <!-- ------------------Team Coordination hero --------- -->
    <section
            class="py-36 md:px-20 px-5 grid md:grid-cols-2 grid-cols-1 gap-10 items-center relative overflow-hidden bg_construction_hero"
    >
        <div
                class="flex flex-col items-center text-center md:items-start md:text-left gap-5 md:w-[616px] w-full"
        >
            <p class="font-large text-base text-primary">Team Management</p>
            <h1
                    class="text-5xl leading-[60px] md:text-[56px] md:leading-[67.2px] font-bold text-black"
            >
                Streamline <span class="text-primary">Team Coordination</span> for
                Home Construction Success
            </h1>
            <p class="text-lg font-normal text-secondary">
                Keep your team on track and productive. Builtfront's team management tools simplify task assignment,
                progress tracking,and communication across your entire organization. With real-time insights and
                streamlined workflows, you can boost team performance and deliver projects on time, every time.
            </p>
            @include('frontend.layout-v2.hero-form')
        </div>
        <div class="w-full flex justify-end ml-10">
            <div class="relative w-full md:h-[530px] h-[350px]">
                <div
                        class="bg-white z-30 w-full md:h-[530px] h-[350px] absolute top-0 left-0 rounded-xl"
                ></div>
                <div
                        class="bg-[#C8E89D] w-full md:h-[530px] h-[350px] absolute -top-4 -left-4 z-20 rounded-xl"
                ></div>
                <img
                        src="{{ asset('public/frontend-v2/team/Content.png') }}"
                        alt=""
                        class="absolute top-10 -right-10 z-40 md:h-[400px] h-[300px]"
                />
            </div>
        </div>

        <img
                src="{{ asset('public/frontend-v2/red_arrow_up.png') }}"
                alt=""
                class="absolute md:bottom-6 -bottom-1 md:left-[37%] left-3 rotate-90"
        />
        <img
                src="{{ asset('public/frontend-v2/Group.png') }}"
                alt=""
                class="absolute md:top-12 bottom-5 md:right-[42%] -right-16 z-10"
        />
    </section>

    <!-- ---------------- Empower ---------------- -->
    <section
            class="md:px-20 px-5 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden"
    >
        <div class="">
            <img src="{{ asset('public/frontend-v2/team/Group_1261154670.png') }}" alt="" class="w-full" />
        </div>
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Knowledge Base
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Builtfront's Internal Knowledge Base feature ensures that all team
                members have access to important data and best practices. It
                centralizes information, making it easy to find and share.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Streamline Collaboration
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Enhance Team Communication
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Improve Knowledge Sharing
            </span>
                </li>
            </ul>
        </div>

        <div class="absolute bottom-8 right-0 md:flex items-center gap-9 hidden">
            <img src="{{ asset('public/frontend-v2/red_arrow_up.png') }}" alt="" class="rotate-90" />
            <img src="{{ asset('public/frontend-v2/sales_process/Rectangle_25.png') }}" alt="" class="" />
        </div>
    </section>

    <!-- -------------- Real time -->
    <section
            class="md:px-20 px-5 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden"
    >
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Team Chat
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Enables seamless communication among team members, fostering collaboration and enabling quick problem
                resolution. With real-time messaging and file sharing capabilities, team members can easily share updates,
                discuss project details, and address any issues that arise.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Seamless Communication
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Real-Time Messaging
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              File Sharing Capabilities
            </span>
                </li>
            </ul>
        </div>
        <div class="relative md:p-8 p-0">
            <img src="{{ asset('public/frontend-v2/team/Group_1261154671.png') }}" alt="" class="w-full" />
            <div
                    class="absolute -bottom-10 -left-6 md:w-[250px] md:h-[300px] w-[200px] h-[250px] bg-white p-5 rounded-xl"
            >
                <h3 class="md:text-[22px] text-base font-bold text-center">
                    Team Collaboration
                </h3>
                <div class="relative mt-5 h-full w-full">
                    <img src="{{ asset('public/frontend-v2/team/size_02.png') }}" alt="" class="w-full" />
                    <img
                            src="{{ asset('public/frontend-v2/team/image_806.png') }}"
                            alt=""
                            class="absolute top-12 left-12"
                    />
                </div>
            </div>
        </div>

        <img
                src="{{ asset('public/frontend-v2/Ellipse_87.png') }}"
                alt=""
                class="absolute top-10 -left-10"
        />
    </section>

    <!-- ---------------- Empower ---------------- -->
    <section
            class="md:px-20 px-5 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden mb-12"
    >
        <div class="">
            <img src="{{ asset('public/frontend-v2/team/Group_1261154672.png') }}" alt="" class="w-full" />
        </div>
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Roles & Permissions
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Assign specific access rights to team members, ensuring data security and streamlining workflow efficiency. Collaborate
                seamlessly and keep sensitive information secure.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Control access to sensitive data and streamline collaboration.
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Assign specific permissions to team members for enhanced
              efficiency.
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Ensure data security with granular user access controls.
            </span>
                </li>
            </ul>
        </div>

        <div class="absolute bottom-7 right-0 md:flex items-center gap-7 hidden">
            <img src="{{ asset('public/frontend-v2/red_arrow_up.png') }}" alt="" class="rotate-90" />
            <img src="{{ asset('public/frontend-v2/sales_process/Rectangle_25.png') }}" alt="" class="" />
        </div>
    </section>

    <!-- -------------- manage workloads -->
    <section
            class="md:px-20 px-5 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden"
    >
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Time Tracking
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Allows teams to log hours, monitor project progress, and effectively manage workloads.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Streamline project progress with accurate time tracking and
              workload management.
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Efficiently manage workloads and track project progress with Time
              Tracking.
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Track project progress and manage workloads effectively with Time
              Tracking.
            </span>
                </li>
            </ul>
        </div>
        <div class="relative md:p-8 p-0">
            <img src="{{ asset('public/frontend-v2/team/Group_1261154674.png') }}" alt="" class="w-full" />
            <div
                    class="absolute -bottom-10 -left-6 md:w-[250px] md:h-[300px] w-[200px] h-[250px] bg-white p-5 rounded-xl"
            >
                <h3 class="md:text-[22px] text-base font-bold text-center">
                    Manage Workloads
                </h3>
                <div class="relative mt-5 h-full w-full">
                    <img
                            src="{{ asset('public/frontend-v2/team/Group_1261154682.png') }}"
                            alt=""
                            class="w-full"
                    />
                    <img
                            src="{{ asset('public/frontend-v2/team/image_814.png') }}"
                            alt=""
                            class="absolute top-12 left-12"
                    />
                </div>
            </div>
        </div>

        <!-- <img
          src="{{ asset('public/frontend-v2/Ellipse_87.png') }}"
          alt=""
          class="absolute top-10 -left-10"
        /> -->
    </section>

    <!-- ---------------- Subcontractors ---------------- -->
    <section
            class="md:px-20 px-5 md:py-20 py-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden my-10"
    >
        <div class="">
            <img src="{{ asset('public/frontend-v2/team/Group_1261154675.png') }}" alt="" class="w-full" />
        </div>
        <div class="space-y-7 text-center md:text-left md:w-[616px] w-full">
            <h2 class="font-bold text-4xl md:text-[40px] md:leading-[48px]">
                Enhance Collaboration and Efficiency with
                <span class="text-primary">Subcontractors</span> Access
            </h2>
            <p class="text-secondary font-normal text-base md:text-lg">
                Builtfront's Subcontractors Access feature allows external parties
                like subcontractors to securely access and contribute to relevant
                parts of the platform, streamlining project integration and
                collaboration. With real-time updates and communication, you can
                ensure smooth workflows and deliver projects on time and within
                budget.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Streamline project integration and collaboration with external
              parties.
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Real-time updates and communication for smooth workflows.
            </span>
                </li>
                <li class="flex items-start gap-3 text-left">
                    <img src="{{ asset('public/frontend-v2/client/tick-circle.png') }}" alt="" />
                    <span class="font-normal text-base text-secondary">
              Deliver projects on time and within budget.
            </span>
                </li>
            </ul>
        </div>

        <div class="absolute bottom-0 right-0 md:flex items-center gap-7 hidden">
            <img src="{{ asset('public/frontend-v2/red_arrow_up.png') }}" alt="" class="rotate-90" />
            <img src="{{ asset('public/frontend-v2/sales_process/Rectangle_25.png') }}" alt="" class="" />
        </div>
    </section>

    <!-- ------------------------ faq----------------- -->
    @include('frontend.layout-v2.dynamic-faqs', ['faqs' => $faqs])

@endsection

@push('head')
    <meta name="description" content="Enhance teamwork and productivity with Builtfront's team management tools. Assign tasks, track progress, and improve communication.">
    <link rel="canonical" href="{{ url('/page/team-management') }}" />
@endpush