<x-layouts.main>
    <x-slot:title>
       Profil User
    </x-slot:title>
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content">
                        <div id="highlight" class="mb-4">
                            <div class="single-full-title border-b mb-2 pb-2">
                                <div class="single-title">
                                    <h4 class="mb-1">Daftar Booking</h4>
                                </div>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order->number }}</th>
                                        <td>{{ $order->date }}</td>
                                        <td>
                                            @if($order->status == 'confirmed')
                                            <span class="badge bg-primary">{{ $order->status }}</span>
                                            @elseif($order->status == 'pending')
                                            <span class="badge bg-secondary">Menunggu pembayaran</span>
                                            @elseif($order->status == 'cancelled')
                                            <span class="badge bg-danger">{{ $order->status }}</span>
                                            @endif

                                            @if(\Carbon\Carbon::parse($order->date)->gt(now()))
                                            <span class="badge bg-warning">Up coming</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->status == 'confirmed' || $order->status == 'cancelled')
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                <a href="{{ route('user.order.details', $order->id) }}" class="btn btn-secondary">Lihat</a>
                                            </div>
                                            @elseif($order->status == 'pending')
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                <a href="{{ route('user.order.details', $order->id) }}" class="btn btn-secondary">Lihat</a>
                                                <a href="{{ route('checkout', $order->id) }}" class="btn btn-primary">Bayar</a>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>

                        </div>
                    </div>
                </div>

                <!-- sidebar starts -->
                <x-user.sidebar/>
            </div>
        </div>
    </section>
</x-layouts.main>
