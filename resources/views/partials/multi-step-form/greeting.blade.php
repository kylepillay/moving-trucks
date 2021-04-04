<div class="col-span-6">
    @if(Auth::check())
        <div class="bg-white p-6 text-gray-700 rounded-md">
            You are logged in as {{ Auth::user()->name }}. If you would like to use alternative details, please first log out.
        </div>
    @endif
</div>
