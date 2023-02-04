<x-layouts.main>
    <x-slot:title>
        Top Destinations
    </x-slot:title>
    <section class="trending pb-0 pt-6">
        <div class="container">
            <div class="section-title mb-6 w-50 mx-auto text-center">
                <h2 class="mb-1">Explore <span class="theme">Top Destinations</span></h2>
            </div>
            <div class="row align-items-center">
                @foreach ($destinations as $des)
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="trend-item1">
                        <div class="trend-image position-relative rounded">
                            <img src="{{ asset('assets/images/destination/destination17.jpg') }}" alt="image">
                            <div class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                                <div class="trend-content-title">
                                    <h5 class="mb-0"><a href="{{ route('destination', $des->id) }}" class="theme1">Lombok, NTB</a></h5>
                                    <h3 class="mb-0 white">{{ $des->name }}</h3>
                                </div>
                            </div>
                            <div class="color-overlay"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.main>
