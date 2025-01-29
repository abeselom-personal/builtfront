@php use Illuminate\Database\Eloquent\Builder; @endphp

<!-- ------------------ DiscoverProject section ----------------- -->
<section class="md:px-20 px-5 py-20 my-10">
    <div
            class="text-center flex flex-col items-center justify-center gap-y-5"
    >
        <h3 class="md:text-[48px] md:leading-[58px] text-4xl font-semibold">

            Discover Our all-in-one <br/><span class="text-primary">Construction Management</span> Solution
        </h3>
        <p class="font-normal text-lg w-full">
            Unlock the full potential of your construction projects with our
            comprehensive feature set.
        </p>

        <div class="flex items-center gap-5">
            <a href="{{ url('/account/signup') }}" class="main_btn">Get Started For Free</a>
        </div>
    </div>
</section>

<footer class="md:px-20 px-5 py-20">
    <div class="grid md:grid-cols-5 grid-cols-1 items-start gap-10">
        <div class="md:col-span-2 col-span-1 flex flex-col gap-y-5">
            <a href="{{ url('/') }}">
                <img
                        src="{{ asset('public/frontend-v2/logo.png')}}"
                        alt=""
                        class="md:w-[220px] md:h-[43px] w-[150px] h-[30px]"
                />
            </a>
            <p>
                Builtfront is construction management and CRM software created for home builders. It simplifies managing construction projects, sales, and client relationships, making your business run more smoothly and efficiently.
            </p>
        </div>
        <div class="md:col-span-3 col-span-1 grid md:grid-cols-3 grid-cols-3 gap-10 items-start">
            <div class="flex flex-col justify-center">
                <div>
                    <h4 class="text-lg font-semibold">Company</h4>
                    <ul class="flex flex-col gap-3 mt-7">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/pricing') }}">Pricing</a>
                        </li>
                        <li>
                            <a href="{{ url('/contact') }}">Contact Us</a>
                        </li>
                        <li>
                            <a href="https://builtfront.com/blog">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col justify-center">
                <div>
                    <h4 class="text-lg font-semibold">Features</h4>
                    <ul class="flex flex-col gap-3 mt-7">
                        <li>
                            <a href="{{ url('/page/project-management') }}">Project Management</a>
                        </li>
                        <li>
                            <a href="{{ url('/page/sales-management') }}">Sales Management</a>
                        </li>
                        <li>
                            <a href="{{ url('/page/client-management') }}">Client Management</a>
                        </li>
                        <li>
                            <a href="{{ url('/page/team-management') }}">Team Management</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col justify-center">
                <div>
                    <h4 class="text-lg font-semibold">Connect</h4>
                    <ul class="flex flex-col gap-3 mt-7">
                        <li class="flex items-center gap-2">
                            <img src="{{asset('public/frontend-v2/footer/Facebook.png')}}" alt="" />
                            <a href="https://www.facebook.com/Builtfront/">Facebook</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <img src="{{ asset('public/frontend-v2/footer/Instagram.png')}}" alt="" />
                            <a href="https://www.instagram.com/builtfront">Instagram</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <img src="{{ asset('public/frontend-v2/footer/X.png')}}" alt="" />
                            <a href="https://x.com/Builtfront/">X</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div
            class="flex md:flex-row flex-col gap-10 items-center md:justify-between justify-center mt-10 bg-white md:rounded-full rounded-md md:p-7 p-3 md:h-[80px] h-full"
    >
        <p>
            © 2024 <span class="text-[#79C711]">Builtfront</span>, LLC. All rights
            reserved.
        </p>
        <div class="flex items-center flex-wrap justify-between gap-5">
            <?php
                $pages = \App\Models\Landlord\Page::where('page_status', 'published')
                    ->where(function (Builder $query) {
                        $query->where('page_title', 'LIKE', '%privacy policy%')
                            ->orWhere('page_title', 'LIKE', '%terms%')
                            ->orWhere('page_title', 'LIKE', '%cookie policy%');
                    })
                    ->get();
                ?>
            @foreach($pages as $page)
                <a href="{{ url('/page') }}/{{ $page->page_permanent_link }}" class="underline-offset-4 underline">{{ $page->page_title }}</a>
            @endforeach
        </div>
    </div>
</footer>
<!-- arrow up btn -->
<button class="arrow_up -rotate-90" onclick="scrollToTop()">
    <img src="{{ asset('public/frontend-v2/chevron-right.png')}}" alt="Top" />
</button>

<script src="{{ asset('public/frontend-v2/js/app.js') }}"></script>
