@section('title', 'Buy - Membership Web App')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            Berlangganan {{ $membership->name }}
        </h2>
        <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
            atau
            <a href="{{ route('home') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                Kembali ke Home
            </a>
        </p>
    </div>

    <form wire:submit.prevent="subscribe({{ $membership->id }})">
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <div class="font-medium">{{ $membership->name }}</div>
                        <div class="text-sm">/ {{ $membership->duration_in_month }} Bulan</div>
                    </div>
                    <div>
                        Rp. {{ number_format($membership->price) }}
                    </div>
                </div>

                <hr>

                <div class="mt-4 flex justify-between items-center font-semibold">
                    <div>Total Bayar</div>
                    <div>Rp. {{ number_format($membership->price) }}</div>
                </div>
            </div>
        </div>

        <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                <div>
                    <div class="font-semibold text-lg mb-1">Informasi Akun</div>
                    @guest
                    <div class="text-xs">Jika sudah punya akun? <a href="{{ route('login') }}"><u>Masuk</u></a> untuk lanjutkan.</div>
                    @endguest
                </div>

                <div class="mt-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 leading-5">
                        Nama
                    </label>

                    @auth
                    <div>
                        {{ auth()->user()->name }}
                    </div>
                    @else
                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="name" id="name" type="text" autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>
                    @endauth

                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                        Alamat Email
                    </label>


                    @auth
                    <div>
                        {{ auth()->user()->email }}
                    </div>
                    @else
                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" type="email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>
                    @endauth

                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="phone" class="block text-sm font-medium text-gray-700 leading-5">
                        Telepon
                    </label>

                    @auth
                    <div>
                        {{ auth()->user()->phone }}
                    </div>
                    @else
                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="phone" id="phone" type="number" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>
                    @endauth

                    @error('phone')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="gender" class="block text-sm font-medium text-gray-700 leading-5">
                        Jenis Kelamin
                    </label>

                    @auth
                    <div>
                        {{ auth()->user()->gender }}
                    </div>
                    @else
                    <div class="mt-1 rounded-md shadow-sm">
                        <select wire:model.lazy="gender" id="gender" type="gender" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror">
                            <option value=""></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    @endauth

                    @error('gender')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                @guest
                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        Kata Sandi
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 leading-5">
                        Konfirmasi Sandi
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password" class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 appearance-none rounded-md focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
                @endguest
            </div>
        </div>

        <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-md">
            <button type="submit" class="w-full bg-[navy] p-4 text-white rounded-lg">Berlangganan</button>
        </div>
    </form>
</div>