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
                                    <h4 class="mb-1">Detail Order</h4>
                                </div>
                            </div>
                            <div class="card card-body">
                                <dl class="row">
                                    <dt class="col-sm-3 my-2">Order ID</dt>
                                    <dd class="col-sm-9 my-2">{{ $order->number }}</dd>

                                    <dt class="col-sm-3 my-2">Tanggal</dt>
                                    <dd class="col-sm-9 my-2">{{ $order->date }}</dd>

                                    <dt class="col-sm-3 my-2">Jam Terbang</dt>
                                    <dd class="col-sm-9 my-2">{{ substr($order->schedule->start_hour, 0, 5). ' - ' .substr($order->schedule->end_hour, 0, 5) }}</dd>

                                    <dt class="col-sm-3 my-2">Status</dt>
                                    <dd class="col-sm-9 my-2">
                                        <span class="badge @if($order->status == 'pending') bg-info @elseif($order->status == 'confirmed') bg-success @elseif($order->status == 'cancelled') bg-danger @endif">{{ $order->status }}</span>
                                    </dd>

                                    <dt class="col-sm-3 my-2">Waktu Transaksi</dt>
                                    <dd class="col-sm-9 my-2">{{ $status->transaction_time }}</dd>

                                    <dt class="col-sm-3 my-2">Total Harga</dt>
                                    <dd class="col-sm-9 my-2">Rp. {{ number_format($status->gross_amount) }}</dd>

                                    <dt class="col-sm-3 my-2">Status Transaksi</dt>
                                    <dd class="col-sm-9 my-2">{{ $status->transaction_status }}</dd>
                                </dl>
                                <h4>Detail Penumpang</h4>
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nama Lengkap</th>
                                            <th scope="col">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->passengers as $passenger)
                                        <tr>
                                            <th scope="row">{{ $passenger->nik }}</th>
                                            <td>{{ $passenger->name }}</td>
                                            <td>{{ $passenger->email }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- sidebar starts -->
                <x-user.sidebar/>
            </div>
        </div>
    </section>
</x-layouts.main>
