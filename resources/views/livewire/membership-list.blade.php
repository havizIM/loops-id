<div class="w-full grid gap-6 grid-cols-3">
    @foreach ($memberships as $membership)
    <div class="bg-white shadow-lg p-4 rounded-xl text-left">
        <div class="text-3xl font-semibold mb-6">
            {{ $membership->name }}
        </div>

        <div class="mb-10">
            <div class="mb-1">Membership Period :</div>
            <div class="font-semibold text-xl">{{ $membership->duration_in_month }} Month</div>
        </div>

        <div class="text-right text-3xl font-semibold text-green-600 mb-6">
            Rp. {{ number_format($membership->price) }}
        </div>

        <form wire:submit.prevent="buy">
            <button type="submit" class=" w-full font-semibold bg-[navy] text-white p-4 rounded-xl">Beli Sekarang</button>
        </form>
    </div>
    @endforeach
</div>