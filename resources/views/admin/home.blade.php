<x-layouts.admin>
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                {{-- Customers --}}
                <x-admin.home.user-count/>
                {{-- Income --}}
                <x-admin.home.income-count/>
                {{-- Booking --}}
                <x-admin.home.booking-count/>
            </div>
        </div>
        {{-- Today's Flight --}}
        <x-admin.home.today-flight/>
    </div>
</x-layouts.admin>
