<x-layouts.main>
    <x-slot:title>
        Proses ke pembayaran
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
                                        <th>Harga</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="theme2">{{ $booking->number }}</td>
                                            <td class="theme2">{{ \Carbon\Carbon::parse($booking->date)->format('d/m/yy') }}</td>
                                            <td class="theme2">{{ substr($booking->schedule->start_hour, 0, 5). ' - '. substr($booking->schedule->end_hour, 0, 5) }}</td>
                                            <td class="theme2">{{ $booking->passengers->count() }} orang</td>
                                            <td class="theme2">Rp. {{ number_format($price) }}</td>
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
                            @if($booking->status === 'pending')
                            <div class="my-3">
                                <button class="nir-btn w-25" id="pay-button">Bayar Sekarang</button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script>
            const payButton = document.querySelector('#pay-button');
            payButton.addEventListener('click', function(e) {
                e.preventDefault();

                snap.pay('{{ $snapToken }}', {
                    // Optional
                    onSuccess: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        console.log(result)
                        window.location.href = '{{ route('checkout.success', $booking->id) }}'
                    },
                    // Optional
                    onPending: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        console.log(result)
                        window.location.href = '{{ route('checkout.pending', $booking->id) }}'
                    },
                    // Optional
                    onError: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        console.log(result)
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: JSON.stringify(result, null, 2),
                        })
                    },
                    onClose: function(){
                        location.reload();
                    }
                });
            });
        </script>
    @endpush
</x-layouts.main>
