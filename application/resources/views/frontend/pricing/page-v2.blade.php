@extends('frontend.layout-v2.master')
@section('title', 'Affordable Construction Management Software Pricing')
<?php
$faqs = [
    [
        'question' => 'What factors affect the cost of {app_name}?',
        'answer' => 'Pricing may vary based on the number of users, project volume, and features required.'
    ],
    [
        'question' => 'Can I get a free trial of {app_name}?',
        'answer' => 'Yes, we offer a free 14-day trial to allow you to explore the platform before committing.'
    ],
    [
        'question' => 'Is there a contract?',
        'answer' => 'No, you can cancel at any time.'
    ],
    [
        'question' => 'Do you offer discounts for long-term contracts?',
        'answer' => 'Contact our sales team to discuss potential discounts for extended subscription terms.'
    ],
    [
        'question' => 'How can I get a quote for {app_name}?',
        'answer' => 'Contact our sales team for a personalized quote based on your specific needs'
    ]
];

// Custom package attributes
$customAttributes = [
    // Project Management
    'progress_tracking' => [
        ['custom' => 'yes'], ['custom' => 'yes'], ['custom' => 'yes']
    ],
    'document_media_storage' => [
        ['custom' => 'yes'], ['custom' => 'yes'], ['custom' => 'yes']
    ],
    'reports' => [
        ['custom' => 'yes'], ['custom' => 'yes'], ['custom' => 'yes']
    ],

    // Sales Management
    'crm' => [
        ['custom' => 'yes'], ['custom' => 'yes'], ['custom' => 'yes']
    ],
    'sales_pipleline' => [
        ['custom' => 'yes'], ['custom' => 'yes'], ['custom' => 'yes']
    ],

    // Client Management
    'client_portal' => [
        ['custom' => 'yes'], ['custom' => 'yes'], ['custom' => 'yes']
    ],
    'online_payments' => [
        ['custom' => 'yes'], ['custom' => 'yes'], ['custom' => 'yes']
    ],

    // Team Management
    'team_chat' => [
        ['custom' => 'yes'], ['custom' => 'yes'], ['custom' => 'yes']
    ],
    'roles_permissions' => [
        ['custom' => 'yes'], ['custom' => 'yes'], ['custom' => 'yes']
    ],

    // Support
    'live_chat' => [
        ['custom' => 'yes'], ['custom' => 'yes'], ['custom' => 'yes']
    ],
    'email' => [
        ['custom' => 'yes'], ['custom' => 'yes'], ['custom' => 'yes']
    ],

];
?>
@section('content')

    <!-- ------------------- pricin plans ---------------- -->
    <section class="md:px-20 px-5 md:py-20 py-10">
        <div class="text-center space-y-5 relative">
            <p class="font-semibold text-base text-primary">Simplified</p>
            <h1 class="md:text-[56px] md:leading-[67.2px] text-4xl font-bold">
                {!! _clean($content->frontend_data_1) !!}
            </h1>
            <p class="md:text-lg text-base font-normal">
                {!! _clean($content->frontend_data_2) !!}
            </p>

            <div class="flex items-center justify-center">
                <button
                        onclick="togglePlan()"
                        class="toggle_btn main_btn"
                        style="
              width: 120px;
              border-top-right-radius: 0;
              border-bottom-right-radius: 0;
            "
                >
                    @lang('lang.monthly')
                </button>
                <button
                        onclick="togglePlan()"
                        class="toggle_btn secondary_btn"
                        style="
              width: 120px;
              border-top-left-radius: 0;
              border-bottom-left-radius: 0;
            "
                >
                    @lang('lang.yearly')
                </button>
            </div>

            <img
                    src="{{ asset('public/frontend-v2/red_arrow_up.png') }}"
                    alt=""
                    class="absolute md:top-0 -top-28 left-5"
            />
            <img
                    src="{{ asset('public/frontend-v2/red_arrow_up.png') }}"
                    alt=""
                    class="absolute md:-bottom-10 -bottom-0 right-5"
            />
        </div>

        <div class="monthly-plan">
            <div class="plan_cards grid md:grid-cols-3 grid-cols-1 gap-10 mt-20">

                    @foreach($packages as $package)
                        <div class="plan_card">
                            <p class="">{{ $package->package_name }}</p>
                            <p class="price">{{ runtimeMoneyFormatPricing($package->package_amount_monthly) }}</p>
                            <p class="per-month">Per Month</p>
                            @if($package->package_subscription_options == 'free')
                                <a href="{{ url('account/signup?ref=free_'.$package->package_id) }}" class="block w-full main_btn leading-7 text-center" style="line-height: 30px">Get Started</a>
                            @else
                                <a href="{{ url('account/signup?ref=monthly_'.$package->package_id) }}" class="block w-full main_btn leading-7 text-center" style="line-height: 30px">Get Started</a>
                            @endif
                        </div>
                    @endforeach

            </div>
        </div>

        <div class="yearly-plan hidden">
            <div class="plan_cards grid md:grid-cols-3 grid-cols-1 gap-10 mt-20">
                @foreach($packages as $package)
                    <div class="plan_card">
                        <p class="">{{ $package->package_name }}</p>
                        <p class="price">{{ runtimeMoneyFormatPricing($package->package_amount_yearly/12) }}</p>
                        <p class="per-month">Per Month</p>
                        @if($package->package_subscription_options == 'free')
                            <a href="{{ url('account/signup?ref=free_'.$package->package_id) }}" class="block w-full main_btn leading-7 text-center" style="line-height: 30px">Get Started</a>
                        @else
                            <a href="{{ url('account/signup?ref=yearly_'.$package->package_id) }}" class="block w-full main_btn leading-7 text-center" style="line-height: 30px">Get Started</a>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>

        <!-- table 1 -->
        <div class="text-black mt-20">
            <div class="overflow-x-auto">
                <table class="min-w-full text-xs pricing-table">
                    <tbody>
                    <tr>
                        <th><h2 class="table_title text-left mb-0 table_title p-3">General</h2></th>
                        @forelse($packages as $package)
                            <th><h2 class="table_title text-center mb-0 table_title p-3">{{ $package->package_name }}</h2></th>
                        @empty
                            <th><i>No package</i></th>
                            <th class="p-3" style="font-weight: 700"></th>
                        @endforelse
                    </tr>

                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_limits_team', 'label' => __('lang.team') . ' (' . __('lang.users') . ')' , 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_limits_clients', 'label' => __('lang.clients'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_limits_projects', 'label' => __('lang.projects'), 'packages' => $packages])



                    <?php /* // Default
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_limits_team', 'label' => __('lang.team') . ' (' . __('lang.users') . ')' , 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_limits_clients', 'label' => __('lang.clients'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_limits_projects', 'label' => __('lang.projects'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_tasks', 'label' => __('lang.tasks'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_leads', 'label' => __('lang.leads'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_invoices', 'label' => __('lang.invoices'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_estimates', 'label' => __('lang.estimates'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_subscriptions', 'label' => __('lang.subscriptions'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_contracts', 'label' => __('lang.contracts'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_proposals', 'label' => __('lang.proposals'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_tickets', 'label' => __('lang.tickets'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_expense', 'label' => __('lang.expenses'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_messages', 'label' => __('lang.messages'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_timetracking', 'label' => __('lang.time_tracking'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_knowledgebase', 'label' => __('lang.knowledgebase'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_reminders', 'label' => __('lang.reminders'), 'packages' => $packages])
                        */ ?>


                    <tr><td colspan="10"><h2 class="mb-0 table_title p-3">Project Management</h2></td></tr>
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_tasks', 'label' => __('Tasks & Scheduling'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_expense', 'label' => __('Bills/Expenses'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'custom', 'label' => __('Document & Media Storage '), 'packages' => $customAttributes['document_media_storage']])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'custom', 'label' => __('Reports'), 'packages' => $customAttributes['reports']])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'custom', 'label' => __('Progress Tracking'), 'packages' => $customAttributes['progress_tracking']])

                    <tr><td colspan="10"><h2 class="mb-0 table_title p-3">Sales Management</h2></td></tr>
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'custom', 'label' => __('CRM'), 'packages' => $customAttributes['crm']])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_leads', 'label' => __('Lead Management'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_proposals', 'label' => __('lang.proposals'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'custom', 'label' => __('Sales Pipeline'), 'packages' => $customAttributes['sales_pipleline']])

                    <tr><td colspan="10"><h2 class="mb-0 table_title p-3">Client Management</h2></td></tr>
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'custom', 'label' => __('Client Portal'), 'packages' => $customAttributes['client_portal']])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_messages', 'label' => __('Messaging/Comments'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_invoices', 'label' => __('Client Invoices'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_contracts', 'label' => __('Contracts & Esignatures'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'custom', 'label' => __('Online Payments'), 'packages' => $customAttributes['online_payments']])

                    <tr><td colspan="10"><h2 class="mb-0 table_title p-3">Team Management</h2></td></tr>
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_knowledgebase', 'label' => __('Internal Knowledgebase'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'custom', 'label' => __('Team Chat'), 'packages' => $customAttributes['team_chat']])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'custom', 'label' => __('Roles & Permissions'), 'packages' => $customAttributes['roles_permissions']])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_reminders', 'label' => __('lang.reminders'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_timetracking', 'label' => __('lang.time_tracking'), 'packages' => $packages])

                    <tr><td colspan="10"><h2 class="mb-0 table_title p-3">Support</h2></td></tr>
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'custom', 'label' => __('Email'), 'packages' => $customAttributes['email']])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'package_module_knowledgebase', 'label' => __('lang.knowledgebase'), 'packages' => $packages])
                    @include('frontend.layout-v2.pricing.package-feature', ['prop' => 'custom', 'label' => __('Live Chat'), 'packages' => $customAttributes['live_chat']])


                    <tr>
                        <td></td>
                        @foreach($packages as $package)
                            <td class="text-center">
                                <div class="monthly-plan">
                                    @if($package->package_subscription_options == 'free')
                                        <a href="{{ url('account/signup?ref=free_'.$package->package_id) }}" class="inline-block main_btn text-center mt-5" style="line-height: 30px">
                                            Get Started
                                        </a>
                                    @else
                                        <a href="{{ url('account/signup?ref=monthly_'.$package->package_id) }}" class="inline-block main_btn text-center mt-5" style="line-height: 30px">
                                            Get Started
                                        </a>
                                    @endif
                                </div>

                                <div class="yearly-plan hidden">
                                    @if($package->package_subscription_options == 'free')
                                        <a href="{{ url('account/signup?ref=free_'.$package->package_id) }}" class="inline-block main_btn text-center mt-5" style="line-height: 30px">
                                            Get Started
                                        </a>
                                    @else
                                        <a href="{{ url('account/signup?ref=yearly_'.$package->package_id) }}" class="inline-block main_btn text-center mt-5" style="line-height: 30px">
                                            Get Started
                                        </a>
                                    @endif
                                </div>
                            </td>
                        @endforeach
                    </tr>


                    </tbody>
                </table>
            </div>



        </div>

    </section>

    <!-- ------------------------ faq----------------- -->
    @include('frontend.layout-v2.dynamic-faqs', ['title' => 'Pricing <span class="text-primary">FAQs</span>', 'faqs' => $faqs])


@endsection

@push('head')
    <style>
        .plan_card .price{
            font-size: 56px;
            font-weight: 700;
            line-height: 67.2px;
            text-align: center;
            color: #000000;
            margin-top: 14px;
            margin-bottom: 10px;
        }
        .plan_card .per-month{
            font-size: 16px;
            font-weight: 400;
            line-height: 24px;
            text-align: center;
            color: #6b6b6b;
            margin-bottom: 30px;
        }
        .table_title{
            margin-top: 25px;
            margin-bottom: 5px;
        }
        table.pricing-table tr:nth-child(2n):nth-child(-n+14),
        table.pricing-table tr:nth-child(n+16):nth-child(2n+1)
        {
            --tw-bg-opacity: 1;
            background-color: rgb(242 249 231 / var(--tw-bg-opacity))
        }
    </style>
@endpush

@push('footer')
    <script>

        // pricing page tab
        function togglePlan() {
            toggleButtonClasses();

            let monthlyPlans = document.querySelectorAll('.monthly-plan');
            let yearlyPlans = document.querySelectorAll('.yearly-plan');

            monthlyPlans.forEach(function (el) {
                el.classList.toggle('hidden')
            })

            yearlyPlans.forEach(function (el) {
                el.classList.toggle('hidden')
            })
        }
    </script>
@endpush

@push('head')
    <meta name="description" content="Find the perfect Builtfront plan to fit your home building business. Choose from our flexible pricing options and start saving.">
    <link rel="canonical" href="{{ url('/pricing') }}" />
@endpush