@section('title', 'Home - Membership Web App')

<div>
    <div class="fixed top-0 w-full p-4">
        <div class="flex justify-between items-center">
            @auth
            <div>Selamat Datang, <b>{{ auth()->user()->name }}</b></div>
            @else
            <div class="font-semibold text-[navy] text-lg">Loops.id</div>
            @endauth

            @if (Route::has('login'))
            <div class="space-x-4">
                @auth
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    Log out
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>

    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center mb-6">
            <div class="flex flex-col justify-around">
                <div class="space-y-6">
                    <a href="{{ route('home') }}" class="flex justify-center">
                        <img src="{{ asset('logo.jpeg') }}" />
                    </a>



                    @if(isset($active_membership) && $active_membership !== null)
                    <h1 class="text-5xl font-extrabold tracking-wider text-center text-gray-600">
                        Member {{ $active_membership->membership_log['name'] }}
                    </h1>

                    <div class="text-center">
                        Berlaku Sampai <span class="font-semibold text-red-600">{{ date('d M Y H:i', strtotime($active_membership->expired_at)) }}</span>
                    </div>
                    @else
                    <h1 class="text-5xl font-extrabold tracking-wider text-center text-gray-600">
                        {{ config('app.name') }}
                    </h1>

                    <div class="text-center">
                        Pilih salah satu program :
                    </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="text-center p-6 lg:p-0">
            @if(isset($active_membership) && $active_membership !== null)
            <div>
                <button type="button" class="p-4 text-white bg-red-600 rounded-lg" wire:click="unsubscribe({{ $active_membership->id }})">Berhenti Berlangganan</button>
            </div>
            @else
            <div class="w-full grid gap-4 grid-cols-1 lg:gap-6 lg:grid-cols-3">
                @foreach ($memberships as $membership)
                <div class="bg-white shadow-lg p-4 rounded-xl text-left">
                    <div class="text-3xl font-semibold mb-6">
                        {{ $membership->name }}
                    </div>

                    <div class="mb-2">
                        <div class="mb-1">Harga Membership :</div>
                    </div>

                    <div class="flex items-end gap-2 mb-10">
                        <div class="text-3xl font-semibold text-green-600">
                            Rp. {{ number_format($membership->price) }}
                        </div>

                        <div class="font-semibold text-xl">/ {{ $membership->duration_in_month }} Bulan</div>
                    </div>

                    <a href="{{ route('buyMembership', $membership->id) }}" class="text-center block w-full font-semibold bg-[navy] text-white p-4 rounded-xl">Berlangganan Sekarang</a>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>