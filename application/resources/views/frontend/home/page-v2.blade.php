@extends('frontend.layout-v2.master')
@section('title', 'Construction Management Software for Home Builders')

@section('content')
    <!-- ------------------ hero section ----------------- -->
    <section
            class="md:px-20 px-5 py-20 md:pb-[400px] pb-[200px] bg_construction_hero flex items-center justify-center relative"
    >
        <div class="text-center flex flex-col items-center gap-10 relative">
            <h1 class="md:text-[56px] md:leading-[67.2px] font-bold text-5xl">
                <span class="text-[#79C711]">Construction Management</span> <br class="hidden md:flex" />
                and <span class="text-[#79C711]"> CRM Software</span> for Home
                <br class="hidden md:flex" />
                Builders
            </h1>
            <p class="text-lg font-normal lg:w-[700px] w-full">
                Manage all your construction projects, sales, and clients in one place
            </p>

            <div
                    class="flex items-center flex-col md:flex-row w-full gap-3 justify-center"
            >
                <form action="/account/signup">
                    <input
                            type="email"
                            name="email"
                            placeholder="Enter your email"
                            class="h-[48px] md:w-[298px] w-full border border-[#79C711] p-3 focux:outline outline-[#79C711] rounded-md"
                    />
                    <button type="submit" class="w-full md:w-[210px] main_btn">
                        Start 14- Day Free Trial
                    </button>
                </form>

            </div>
            <p class="text-[#79C711] text-sm">No credit Card Required</p>

            <img
                    src="{{ asset('/public/frontend-v2/sendbtn.png') }}"
                    alt=""
                    class="absolute md:bottom-[10%] -bottom-10 md:-left-[15%] left-0"
            />
            <img
                    src="{{ asset('/public/frontend-v2/contactbtn.png') }}"
                    alt=""
                    class="absolute md:top-[30%] -top-14 md:-right-[15%] right-0"
            />
        </div>

        <div class="absolute md:-bottom-1/2 -bottom-[15%]">
            <img src="{{ asset('/public/frontend-v2/big_chart.png') }}" alt="" />
        </div>
    </section>

    <!-- ------------------ ManageAllAspects section ----------------- -->
    <div class="md:px-20 px-5 py-20 md:pt-[550px] pt-[200px] relative">
        <div
                class="text-center flex flex-col items-center justify-center gap-y-5"
        >
            <p class="text-base font-semibold text-primary">Streamline</p>
            <h2 class="md:text-[48px] md:leading-[58px] text-4xl font-semibold">
                Efficiently Manage All <span class="text-primary">Aspects</span> of
                <br class="hidden md:flex" />
                Your Business
            </h2>
            <p class="font-normal text-lg md:w-[700px] w-full">
                Builtfront is a comprehensive Construction Management and CRM Software
                that allows home builders to efficiently manage all their construction
                projects, sales, and clients in one centralized platform.
            </p>
        </div>
        <div class="grid md:grid-cols-4 grid-cols-1 gap-5 items-center mt-20">
            <div
                    class="bg-[#F2F9E7] p-5 h-[310px] rounded-md flex flex-col items-center justify-center gap-4 text-center"
            >
                <img
                        src="{{ asset('/public/frontend-v2/management/Group_1261154694.png') }}""
                        alt=""
                        class="w-[62px] h-[62px] rounded-full"
                />
                <h2 class="text-primary text-2xl font-bold">Client Management</h2>
                <p class="text-base font-normal text-[#6B6B6B]">
                    Easily organize and track all client information, communication, and
                    project details in one place.
                </p>
            </div>

            <div
                    class="bg-[#F2F9E7] p-5 h-[310px] rounded-md flex flex-col items-center justify-center gap-4 text-center"
            >
                <img
                        src="{{ asset('/public/frontend-v2/management/Group_1261154695.png') }}""
                        alt=""
                        class="w-[62px] h-[62px] rounded-full"
                />
                <h2 class="text-primary text-2xl font-bold">Project Management</h2>
                <p class="text-base font-normal text-[#6B6B6B]">
                    Effortlessly manage and track the progress of your construction
                    projects from start to finish.
                </p>
            </div>

            <div
                    class="bg-[#F2F9E7] p-5 h-[310px] rounded-md flex flex-col items-center justify-center gap-4 text-center"
            >
                <img
                        src="{{ asset('/public/frontend-v2/management/Group_1261154696.png') }}""
                        alt=""
                        class="w-[62px] h-[62px] rounded-full"
                />
                <h2 class="text-primary text-2xl font-bold">Sales Management</h2>
                <p class="text-base font-normal text-[#6B6B6B]">
                    Track and manage your sales pipeline, leads, and customer interactions to increase revenue.
                </p>
            </div>

            <div
                    class="bg-[#F2F9E7] p-5 h-[310px] rounded-md flex flex-col items-center justify-center gap-4 text-center"
            >
                <img
                        src="{{ asset('/public/frontend-v2/management/Group_1261154697.png') }}""
                        alt=""
                        class="w-[62px] h-[62px] rounded-full"
                />
                <h2 class="text-primary text-2xl font-bold">Team Management</h2>
                <p class="text-base font-normal text-[#6B6B6B]">
                    Efficiently communicate and collaborate with your team members to ensure project success.
                </p>
            </div>
        </div>

        <div class="flex items-center justify-center gap-5 mt-20">
            <a href="{{ url('/account/signup') }}" class="main_btn">Get Started For Free</a>

        </div>

        <img
                src="{{ asset('/public/frontend-v2/red_arrow_up.png') }}"
                alt=""
                class="absolute top-[20%] left-[3%] hidden md:flex"
        />
        <img
                src="{{ asset('/public/frontend-v2/red_arrow_up.png') }}"
                alt=""
                class="absolute top-[35%] right-[5%] hidden md:flex"
        />
    </div>

    <!-- ------------------ SalesManagement section ----------------- -->
    <section
            class="md:px-20 px-5 md:py-20 py-10 mb-24 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden"
    >
        <div class="z-50">
            <img src="{{ asset('/public/frontend-v2/salesmanagement.png') }}" alt="" class="" />
        </div>
        <div class="space-y-4 md:w-[616px] w-full">
            <h2
                    class="md:text-5xl text-4xl font-bold md:leading-[58px] text-center md:text-left"
            >
                Streamline your sales <br class="hidden md:flex" />
                process with our powerful <br class="hidden md:flex" />
                <span class="text-primary">Sales Management</span>
                <br class="hidden md:flex" />
                features.
            </h2>
            <p class="text-lg font-normal text-secondary text-center md:text-left">
                Track leads, manage follow-ups, and analyze sales pipelines to
                optimize your sales performance.
            </p>
        </div>

        <img
                src="{{ asset('/public/frontend-v2/Frame_17.png') }}"
                alt=""
                class="absolute top-1/2 right-1/2 z-50 hidden md:flex"
        />
        <div
                class="flex items-center gap-3 absolute top-[20%] right-[47%] bg-white shadow-lg p-3 rounded-lg z-50"
        >
            <p class="text-[#F85E9F] text-base font-semibold">Explore the Sales</p>
            <img src="{{ asset('/public/frontend-v2/job.png') }}" alt="" class="" />
        </div>

        <img
                src="{{ asset('/public/frontend-v2/Rectangle_25.png') }}"
                alt=""
                class="absolute bottom-[4%] right-1/2 -z-0 hidden md:flex"
        />
        <img
                src="{{ asset('/public/frontend-v2/Ellipse_87.png') }}"
                alt=""
                class="absolute bottom-[6%] right-[47%] -z-10 hidden md:flex"
        />
        <img
                src="{{ asset('/public/frontend-v2/Ellipse_87.png') }}"
                alt=""
                class="absolute top-[6%] -right-10 -z-10 hidden md:flex"
        />
        <img
                src="{{ asset('/public/frontend-v2/image_784.png') }}"
                alt=""
                class="absolute bottom-10 right-0 hidden md:flex h-[248px] w-[520px]"
        />
    </section>

    <!-- ------------------ TrackProgress section ----------------- -->
    <div class="bgImg py-40 relative">
        <div
                class="md:px-20 px-5 w-full h-full grid md:grid-cols-2 grid-cols-1 items-center gap-20 text-white"
        >
            <div class="flex flex-col text-center md:text-left md:w-[624px]">
                <span class="text-base font-semibold mb-3">Simplify</span>
                <h2 class="text-5xl leading-[57.6px] font-bold">
                    Efficiently track progress, manage tasks, collaborate
                </h2>
                <p class="text-lg font-normal my-5">
                    Builtfronts Construction Management feature allows users to easily
                    track the progress of their projects, manage tasks, and collaborate
                    with team members. With a user-friendly interface and intuitive
                    tools, builders can stay organized and ensure that projects are
                    completed on time and within budget.
                </p>
                <div class="flex items-center justify-center md:justify-start gap-5">
                    <a  href="{{ url('/account/signup') }}"
                            class="h-[48px] px-6 py-3 bg-[#F2F9E7] text-primary rounded-md text-lg font-semibold custom_button_1"
                    >
                        Get Started For Free
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-end relative">
                <img src="{{ asset('/public/frontend-v2/Placeholder_Image.png') }}" alt="" class="" />
                <img
                        src="{{ asset('/public/frontend-v2/Ellipse_87.png') }}"
                        alt=""
                        class="absolute -top-10 right-[75%] -z-10 hidden md:flex"
                />
            </div>
        </div>

        <img
                src="{{ asset('/public/frontend-v2/chart-3.png') }}"
                alt=""
                class="absolute md:bottom-20 bottom-0 md:right-[20%] right-0 z-50 md:w-[380px] w-[200px]"
        />
        <img
                src="{{ asset('public/frontend-v2/sales_report_graph.png')}}"
                alt=""
                class="absolute right-[45%] md:bottom-[25%] bottom-0 md:right-[5%] -z-0 md:w-[300px] w-[170px]"
        />
        <img
                src="{{ asset('/public/frontend-v2/Rectangle_25.png') }}"
                alt=""
                class="absolute bottom-[13%] right-5 -z-10 hidden md:flex"
        />
    </div>

    <!-- ------------------ Efficiency section ----------------- -->
    <section
            class="md:px-20 px-5 py-20 mt-10 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative"
    >
        <div class="z-50">
            <img src="{{ asset('/public/frontend-v2/streamline.png') }}" alt="" class="" />
        </div>
        <div class="space-y-4 md:w-[616px] w-full _width_fix_1559">
            <p class="font-medium text-base text-primary">Efficiency</p>
            <h2 class="md:text-5xl font-bold md:leading-[58px] text-4xl">
                Streamline Client Management
            </h2>
            <p class="text-lg font-normal text-secondary">
                Manage client profiles, communication logs, and document sharing. With our software,
                you can easily keep track of all client interactions, store important documents, and
                collaborate seamlessly with your team.
            </p>
            <div class="flex items-center gap-5 mt-10">
                <a href="{{ url('/account/signup') }}"
                        class="h-[48px] rounded-md px-6 py-3 text-base text-primary border border-primary font-semibold"
                >
                    Get Started For Free
                </a>
            </div>
        </div>

        <div
                class="absolute md:top-[55%] top-[40%] right-[51%] z-50 md:w-[104px] rounded-full bg-white shadow-md md:h-[104px] h-[75px] w-[75px] flex items-center justify-center"
        >
            <img src="{{ asset('/public/frontend-v2/image_802.png') }}" alt="" />
        </div>

        <img
                src="{{ asset('/public/frontend-v2/Group.png') }}"
                alt=""
                class="absolute top-[5%] right-[10%] z-50 hidden md:flex"
        />

        <img
                src="{{ asset('/public/frontend-v2/Rectangle_25.png') }}"
                alt=""
                class="absolute bottom-[5%] right-1/2 -z-0 hidden md:flex"
        />
        <img
                src="{{ asset('/public/frontend-v2/Ellipse_87.png') }}"
                alt=""
                class="absolute bottom-[7%] right-[47%] -z-10 hidden md:flex"
        />
        <img
                src="{{ asset('/public/frontend-v2/image_784.png') }}"
                alt=""
                class="absolute bottom-10 right-0 hidden md:flex h-[248px] w-[520px] -z-50"
        />
    </section>

    <!-- ------------------ StreamlineProjects section ----------------- -->
    <div class="md:px-20 px-5 md:py-20 py-10 mt-10">
        <div
                class="text-center flex flex-col items-center justify-center gap-y-5"
        >
            <h2 class="md:text-[48px] md:leading-[58px] text-4xl font-semibold">
                <span class="text-primary">Streamline</span> Your Construction
                <br />
                Projects
            </h2>
            <p class="font-normal text-lg">
                Builtfront provides all the necessary tools to manage your
                construction business efficiently.
            </p>
        </div>
        <div
                class="grid md:grid-cols-3 grid-cols-1 gap-16 items-center mt-28 relative overflow-hidden"
        >
            <div
                    class="p-5 h-[310px] rounded-md flex flex-col items-center justify-start gap-4 text-center"
            >
                <div
                        class="w-[64px] h-[64px] border border-primary rounded-full flex items-center justify-center"
                >
                    <img
                            src="{{ asset('/public/frontend-v2/streamline/tasks.png') }}"
                            alt=""
                            class="w-[40px] h-[40px]"
                    />
                </div>
                <h2 class="text-primary text-[32px] leading-[41.6px] font-bold">
                    Tasks
                </h2>
                <p class="text-base font-normal text-[#6B6B6B]">
                    Manage and prioritize project tasks to keep your team on schedule
                </p>
            </div>

            <div
                    class="p-5 h-[310px] rounded-md flex flex-col items-center justify-start gap-4 text-center"
            >
                <div
                        class="w-[64px] h-[64px] border border-primary rounded-full flex items-center justify-center"
                >
                    <img
                            src="{{ asset('/public/frontend-v2/streamline/invoicing.png') }}"
                            alt=""
                            class="w-[40px] h-[40px]"
                    />
                </div>
                <h2 class="text-primary text-[32px] leading-[41.6px] font-bold">
                    Invoicing
                </h2>
                <p class="text-base font-normal text-[#6B6B6B]">
                    Generate and track professional invoices to ensure timely payments and accurate records.
                </p>
            </div>

            <div
                    class="p-5 h-[310px] rounded-md flex flex-col items-center justify-start gap-4 text-center"
            >
                <div
                        class="w-[64px] h-[64px] border border-primary rounded-full flex items-center justify-center"
                >
                    <img
                            src="{{ asset('/public/frontend-v2/streamline/estimets.png') }}"
                            alt=""
                            class="w-[40px] h-[40px]"
                    />
                </div>
                <h2 class="text-primary text-[32px] leading-[41.6px] font-bold">
                    Estimates
                </h2>
                <p class="text-base font-normal text-[#6B6B6B]">
                    Create detailed and accurate estimates to provide clear cost breakdowns for clients.
                </p>
            </div>

            <div
                    class="p-5 h-[310px] rounded-md flex flex-col items-center justify-start gap-4 text-center"
            >
                <div
                        class="w-[64px] h-[64px] border border-primary rounded-full flex items-center justify-center"
                >
                    <img
                            src="{{ asset('/public/frontend-v2/streamline/userroles.png') }}"
                            alt=""
                            class="w-[40px] h-[40px]"
                    />
                </div>
                <h2 class="text-primary text-[32px] leading-[41.6px] font-bold">
                    User Roles
                </h2>
                <p class="text-base font-normal text-[#6B6B6B]">
                    Assign permissions and access levels to team members to maintain control and security.
                </p>
            </div>

            <div
                    class="p-5 h-[310px] rounded-md flex flex-col items-center justify-start gap-4 text-center"
            >
                <div
                        class="w-[64px] h-[64px] border border-primary rounded-full flex items-center justify-center"
                >
                    <img
                            src="{{ asset('/public/frontend-v2/streamline/work.png') }}"
                            alt=""
                            class="w-[40px] h-[40px]"
                    />
                </div>
                <h2 class="text-primary text-[32px] leading-[41.6px] font-bold">
                    Work Anywhere
                </h2>
                <p class="text-base font-normal text-[#6B6B6B]">
                    Access project data and manage tasks from any device for seamless remote work.
                </p>
            </div>

            <div
                    class="p-5 h-[310px] rounded-md flex flex-col items-center justify-start gap-4 text-center"
            >
                <div
                        class="w-[64px] h-[64px] border border-primary rounded-full flex items-center justify-center"
                >
                    <img
                            src="{{ asset('/public/frontend-v2/streamline/time.png') }}"
                            alt=""
                            class="w-[40px] h-[40px]"
                    />
                </div>
                <h2 class="text-primary text-[32px] leading-[41.6px] font-bold">
                    Time Tracking
                </h2>
                <p class="text-base font-normal text-[#6B6B6B]">
                    Monitor time spent on tasks to manage productivity and ensure accurate billing.
                </p>
            </div>

            <div
                    class="p-5 h-[310px] rounded-md flex flex-col items-center justify-start gap-4 text-center"
            >
                <div
                        class="w-[64px] h-[64px] border border-primary rounded-full flex items-center justify-center"
                >
                    <img
                            src="{{ asset('/public/frontend-v2/streamline/payment.png') }}"
                            alt=""
                            class="w-[40px] h-[40px]"
                    />
                </div>
                <h2 class="text-primary text-[32px] leading-[41.6px] font-bold">
                    Payments
                </h2>
                <p class="text-base font-normal text-[#6B6B6B]">
                    Simplify payment processes with integrated solutions for various payment methods.
                </p>
            </div>

            <div
                    class="p-5 h-[310px] rounded-md flex flex-col items-center justify-start gap-4 text-center"
            >
                <div
                        class="w-[64px] h-[64px] border border-primary rounded-full flex items-center justify-center"
                >
                    <img
                            src="{{ asset('/public/frontend-v2/streamline/leads.png') }}"
                            alt=""
                            class="w-[40px] h-[40px]"
                    />
                </div>
                <h2 class="text-primary text-[32px] leading-[41.6px] font-bold">
                    Leads & Opportunities
                </h2>
                <p class="text-base font-normal text-[#6B6B6B]">
                    Capture and nurture leads to convert potential clients and keep your sales pipeline organized.
                </p>
            </div>

            <div
                    class="p-5 h-[310px] rounded-md flex flex-col items-center justify-start gap-4 text-center"
            >
                <div
                        class="w-[64px] h-[64px] border border-primary rounded-full flex items-center justify-center"
                >
                    <img
                            src="{{ asset('/public/frontend-v2/streamline/dashboard.png') }}"
                            alt=""
                            class="w-[40px] h-[40px]"
                    />
                </div>
                <h2 class="text-primary text-[32px] leading-[41.6px] font-bold">
                    Client Dashboard
                </h2>
                <p class="text-base font-normal text-[#6B6B6B]">
                    Provide clients with real-time access to project updates and communication.
                </p>
            </div>

            <img
                    src="{{ asset('/public/frontend-v2/many-rectangle.png') }}"
                    alt=""
                    class="absolute bottom-[15%] w-1/2 -left-[5%] rotate-180"
            />
            <img
                    src="{{ asset('/public/frontend-v2/Group.png') }}"
                    alt=""
                    class="absolute md:top-0 -top-16 -left-[6%]"
            />
            <img
                    src="{{ asset('/public/frontend-v2/Group.png') }}"
                    alt=""
                    class="absolute md:bottom-[25%] bottom-0 -right-[4%]"
            />
        </div>
    </div>

    <!-- ------------------ ConstructionProjects section ----------------- -->
    <section
            class="md:px-20 px-5 py-20 grid md:grid-cols-2 grid-cols-1 md:gap-20 gap-10 items-center relative overflow-hidden"
    >
        <div class="space-y-4">
            <h2 class="md:text-5xl font-bold md:leading-[58px] text-4xl">
                Transform Your
                <span class="text-primary">Construction Projects</span> with Our
                Powerful Features
            </h2>
            <p class="text-lg font-normal text-secondary">
                Builtfronts Construction Management and CRM Software empowers home
                builders to reduce errors, enhance client satisfaction, and streamline
                operations. With our comprehensive suite of features, you can
                efficiently manage all your construction projects, sales, and clients
                in one centralized platform. Say goodbye to manual processes and hello
                to increased productivity and profitability.
            </p>
        </div>

        <div class="z-50">
            <img src="{{ asset('/public/frontend-v2/construction.png') }}" alt="" class="" />
            <img
                    src="{{ asset('/public/frontend-v2/construction_graph.png') }}"
                    alt=""
                    class="absolute md:-bottom-[10%] -bottom-[15%] right-0"
            />
            <img
                    src="{{ asset('/public/frontend-v2/construction_graph_1.png') }}"
                    alt=""
                    class="absolute top-[20%] left-[40%] hidden md:flex"
            />
            <img
                    src="{{ asset('/public/frontend-v2/BACKGROUND.png') }}"
                    alt=""
                    class="absolute bottom-[5%] left-[44%] hidden md:flex"
            />
        </div>

        <img
                src="{{ asset('/public/frontend-v2/Frame_50.png') }}"
                alt=""
                class="absolute top-[55%] right-[40%] z-50 w-[200px] hidden md:flex"
        />
        <img
                src="{{ asset('/public/frontend-v2/Vector.png') }}"
                alt=""
                class="absolute top-[5%] right-[1%] -z-50"
        />

        <img
                src="{{ asset('/public/frontend-v2/many-rectangle.png') }}"
                alt=""
                class="absolute -top-[20%] -left-[5%] rotate-90"
        />
        <img
                src="{{ asset('/public/frontend-v2/many-rectangle.png') }}"
                alt=""
                class="absolute -bottom-[10%] -left-[5%] rotate-90"
        />
    </section>


    @include('frontend.layout-v2.faqs')
@endsection

@push('head')
    <meta name="description" content="Simplify home building with Builtfront. Manage projects, sales, and clients efficiently. Increase profits and client satisfaction.">
    <link rel="canonical" href="{{ url('/') }}" />
@endpush