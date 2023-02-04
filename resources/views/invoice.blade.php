<x-layouts.main>
    <x-slot:title>
        Invoice
    </x-slot:title>
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xs-12 mb-4 mx-auto">
                    <div class="payment-book">
                        <div class="booking-box">
                            <div class="travellers-info mb-4">
                                <h4>Detail Pesanan</h4>
                                <table>
                                    <thead>
                                        <th>No. Booking</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Jumlah Penumpang</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="theme2">{{ $booking->number }}</td>
                                        <td class="theme2">{{ \Carbon\Carbon::parse($booking->date)->format('d/m/yy') }}</td>
                                        <td class="theme2">{{ substr($booking->schedule->start_hour, 0, 5). ' - '. substr($booking->schedule->end_hour, 0, 5) }}</td>
                                        <td class="theme2">{{ $booking->passengers->count() }} orang</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="travellers-info mb-4">
                                <h4>Detail Penumpang</h4>
                                <table>
                                    <thead>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    </thead>
                                    <tbody>
                                    @foreach($booking->passengers as $passenger)
                                        <tr>
                                            <td class="theme2">{{ $passenger->nik }}</td>
                                            <td class="theme2">{{ $passenger->name }}</td>
                                            <td class="theme2">{{ $passenger->email }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="my-3">
                                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::generate(route('home.page')); !!}
                            </div>
                            <div class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-primary">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="btn btn-danger">
                                    <i class="fas fa-envelope"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
