<div class="sidebar-sticky">
    <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
        <h4>Detail Booking Anda</h4>
        <div class="trend-full border-b pb-2 mb-2">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                   <div class="trend-item2 rounded">
                        <a href="destination-single1.html" style="background-image: url({{ asset('assets/images/destination/destination17.jpg') }});"></a>
                         <div class="color-overlay"></div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 ps-0">
                    <div class="trend-content position-relative">
                        <h5 class="mb-1"><a href="grid-leftfilter.html">{{ $destination->name }}</a></h5>
                        <h6 class="theme mb-0"><i class="icon-location-pin"></i> {{ $destination->location }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="trend-check border-b pb-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trend-check-item bg-grey rounded p-3 mb-2">
                        <p class="mb-0">Check In</p>
                        <h6 class="mb-0">{{ \Carbon\Carbon::parse($date)->format('d, M Y') }}</h6>
                        <small>{{ substr($bookingTime->start_hour, 0, 5) }} - {{ substr($bookingTime->end_hour, 0, 5) }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="trend-check">
            <h6 class="mb-0">Quantity: <span class="float-end fw-normal">{{ $quantity }} orang</span> </h6>
        </div>

    </div>
    <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
        <h4>Your Price Summary</h4>
        @if($packet == 'couple')
            <table>
                <tbody>
                    <tr>
                        <td> Paket Couple x 1</td>
                        <td class="theme2">Rp. {{ number_format(config('site.couple_price')) }}</td>
                    </tr>
                    <tr>
                        <td>Discount</td>
                        <td class="theme2">Rp. -50.000</td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td class="theme2">Rp. {{ number_format(config('site.couple_actual_price')) }}</td>
                    </tr>
                </tbody>
                <tfoot class="bg-title">
                    <tr>
                        <th class="font-weight-bold white">Total</th>
                        <th class="font-weight-bold white">Rp. {{ number_format(config('site.couple_actual_price')) }}</th>
                    </tr>
                </tfoot>
            </table>
        @elseif($packet == 'family')
            <table>
                <tbody>
                <tr>
                    <td> Paket Family x 1</td>
                    <td class="theme2">Rp. {{ number_format(config('site.family_price')) }}</td>
                </tr>
                <tr>
                    <td>Discount</td>
                    <td class="theme2">Rp. -50.000</td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td class="theme2">Rp. {{ number_format(config('site.family_actual_price')) }}</td>
                </tr>
                </tbody>
                <tfoot class="bg-title">
                <tr>
                    <th class="font-weight-bold white">Total</th>
                    <th class="font-weight-bold white">Rp. {{ number_format(config('site.family_actual_price')) }}</th>
                </tr>
                </tfoot>
            </table>
        @elseif($packet == '')
            <table>
                <tbody>
                <tr>
                    <td> Rp. {{ number_format($destination->price) }} x {{ $quantity }}</td>
                    <td class="theme2">Rp. {{ number_format($destination->price * $quantity) }}</td>
                </tr>
                <tr>
                    <td>Discount</td>
                    <td class="theme2">0%</td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td class="theme2">Rp. {{ number_format($destination->price * $quantity) }}</td>
                </tr>
                </tbody>
                <tfoot class="bg-title">
                <tr>
                    <th class="font-weight-bold white">Total</th>
                    <th class="font-weight-bold white">Rp. {{ number_format($destination->price * $quantity) }}</th>
                </tr>
                </tfoot>
            </table>
        @endif
        <div class="my-3 mx-auto">
            @auth
            <button class="nir-btn float-lg-star w-100" id="checkOutButton">Checkout</button>
            @endauth
        </div>
    </div>
    {{-- <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3">
        <h4>Do you have a promo code?</h4>
        <input type="text" name="">
        <a href="#" class="nir-btn-black mt-2">Apply</a>
    </div> --}}
</div>
