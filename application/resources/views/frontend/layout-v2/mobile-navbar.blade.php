<nav class="mobile_nav">
    <div class="flex items-center justify-between px-5 mb-5">
        <div class="flex items-center gap-2">
            <a href="{{ url('/') }}">
                <img
                        src="{{ asset('public/frontend-v2/logo.png')}}"
                        alt="{{ config('app.name') }}"
                        class="w-[150px] h-[30px]"
                />
            </a>
        </div>

        <button onclick="toggleNav()" class="">
            <img src="{{ asset('public/frontend-v2/close.png')}}" alt="close" class="cursor-pointer h-4 w-4" />
        </button>
    </div>

    <ul class="">
        <li><a href="{{ url('/') }}" class="text-primary">Home</a></li>
        <li><a href="{{ url('/pricing') }}">Pricing</a></li>
        <li class="cursor-pointer">
            <div class="flex items-center justify-between gap-2" onclick="toggleDropdown2()">
                <p class="">Features</p>
                <img src="{{ asset('public/frontend-v2/arrowicon.png') }}" alt="" class="w-6 transition-transform duration-300" id="arrowIcon2" />
            </div>
            <div class="mt-3 hidden transition-opacity duration-300" id="productDropdown2">
                <ul>
                    <li>
                        <a href="{{ url('/page/project-management') }}" class="text-base">Project Management</a>
                    </li>
                    <li>
                        <a href="{{ url('/page/sales-management') }}" class="text-base">Sales Management</a>
                    </li>
                    <li>
                        <a href="{{ url('/page/client-management') }}" class="text-base">Client Management</a>
                    </li>
                    <li>
                        <a href="{{ url('/page/team-management') }}" class="text-base">Team Management</a>
                    </li>
                </ul>
            </div>
        </li>
        <li><a href="{{ url('/blog/') }}">Blog</a></li>
    </ul>
    <div class="flex flex-col gap-3 px-5 mt-6 text-center">
        <a class="secondary_btn" style="line-height: 30px" href="/account/login">Log In</a>
        <a class="main_btn" style="line-height: 30px" href="/account/signup">Get Started Free</a>
    </div>
</nav>