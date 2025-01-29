<form action="{{ url('/account/signup') }}">
    <div class="flex items-center flex-col md:flex-row w-full gap-3">
        <input
                type="email"
                name="email"
                placeholder="Enter your email"
                class="h-[48px] md:w-[350px] w-full border border-[#79C711] p-3 focux:outline outline-[#79C711] rounded-md"
        />
        <button type="submit" class="main_btn w-full md:w-[220px]">Start 14-Day Free Trial</button>
    </div>
</form>
<p class="text-sm font-normal text-primary">
    No Credit Card Required
</p>