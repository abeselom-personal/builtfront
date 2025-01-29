<?php
$isHomepage = request()->url() == url('/');
$isPricingPage = request()->url() == url('/pricing');
$isContactPage = request()->url() == url('/contact');
?>
<section class="md:px-20 px-5 py-5 flex items-center justify-between text-black">
    <div>
        <a href="{{ url('/') }}">
            <img
                    src="{{ asset('public/frontend-v2/logo.png')}}"
                    alt="{{ config('app.name') }}"
                    class="md:w-[220px] md:h-[43px] w-[150px] h-[30px]"
            />
        </a>
    </div>
    <div class="md:flex items-center gap-10 hidden">
        <ul class="flex items-center gap-10 text-base font-medium">
            <li class="@if($isHomepage) text-[#79C711] border-b-4 border-[#79C711] mt-1 @endif">
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li class="flex items-center cursor-pointer relative" id="productToggle" onclick="toggleDropdown()">
                <p>Features</p>
                <img src="{{ asset('public/frontend-v2/arrowicon.png') }}" alt="down" class="w-6 transition-transform duration-300" id="arrowIcon" />
                <div id="productDropdown"
                     class="absolute top-[50px] right-0 z-50 w-[250px] hidden transition-opacity duration-300">
                    <ul class="bg-custGray p-2 rounded-md shadow-md">
                        <li class="hover:bg-primary hover:text-white rounded-lg">
                            <a class="py-2 px-3 block" href="{{ url('/page/project-management') }}">Project Management</a>
                        </li>
                        <li class="hover:bg-primary hover:text-white rounded-lg">
                            <a class="py-2 px-3 block" href="{{ url('/page/sales-management') }}">Sales Management</a>
                        </li>
                        <li class="hover:bg-primary hover:text-white rounded-lg">
                            <a class="py-2 px-3 block" href="{{ url('/page/client-management') }}">Client Management</a>
                        </li>
                        <li class="hover:bg-primary hover:text-white rounded-lg">
                            <a class="py-2 px-3 block" href="{{ url('/page/team-management') }}">Team Management</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="@if($isPricingPage) text-[#79C711] border-b-4 border-[#79C711] mt-1 @endif">
                <a href="{{ url('/pricing') }}">Pricing</a>
            </li>
            <li>
                <a href="{{ url('/blog/') }}">Blog</a>
            </li>
        </ul>
        <div class="flex items-center gap-5">
            <a class="secondary_btn" style="line-height: 30px" href="{{ url('/account/login')}}">Log In</a>
            <a class="main_btn" style="line-height: 32px" href="{{ url('/account/signup')}}">Get Started Free</a>
        </div>
    </div>

    <!-- mobile nav -->
    <button onclick="toggleNav()" class="lg:hidden">
        <img src="{{ asset('public/frontend-v2/menu.png')}}" alt="" class="cursor-pointer h-6 w-6" />
    </button>
</section>