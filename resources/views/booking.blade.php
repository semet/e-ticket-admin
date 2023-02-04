<x-layouts.main>
    <x-slot:title>
        Book your ticket
    </x-slot:title>
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="payment-book">
                        <form class="booking-box needs-validation" data-parsley-validate data-parsley-errors-messages-disabled action="{{ route('booking.confirm') }}" method="post" novalidate>
                            <div class="customer-information mb-4">
                                <h3 class="border-b pb-2 mb-2">Informasi Pemumpang ({{ $bookingType === 'quantity' ? 'Quantity': $bookingPacket  }})</h3>
                                <div class="mb-2">
                                    @csrf
                                    <input type="hidden" name="destinationId" value="{{ $destination->id }}">
                                    <input type="hidden" name="userId" value="1">
                                    <input type="hidden" name="scheduleId" value="{{ $bookingTime }}">
                                    <input type="hidden" name="date" value="{{ $bookingDate }}">
                                    <input type="hidden" name="status" value="pending">
                                    <input type="hidden" name="type" value="{{ $bookingType === 'quantity' ? 'quantity' : $bookingPacket }}">
                                    @if($bookingType == 'quantity')
                                        @for($i = 0; $i <= (int)$ticketQuantity - 1; $i++)
                                        <h5>Penumpang {{ $i+1 }}</h5>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label>NIK</label>
                                                    <input type="text" name="nik[{{ $i }}]" placeholder="NIK" class="form-control" required/>
                                                    <div class="invalid-feedback">
                                                        NIK tidak boleh kosong
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label>Nama</label>
                                                    <input type="text" name="name[{{ $i }}]" placeholder="Nama Lengkap" class="form-control" required/>
                                                    <div class="invalid-feedback">
                                                        Nama tidak boleh kosong
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label>Email</label>
                                                    <input type="text" name="email[{{ $i }}]" placeholder="Email" class="form-control" required/>
                                                    <div class="invalid-feedback">
                                                        Email tidak boleh kosong
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    @elseif($bookingType === 'paket' && $bookingPacket === 'couple')
                                        <h5>Penumpang 1</h5>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label>NIK</label>
                                                    <input type="text" name="nik[0]" placeholder="NIK" class="form-control" required/>
                                                    <div class="invalid-feedback">
                                                        NIK tidak boleh kosong
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label>Nama</label>
                                                    <input type="text" name="name[0]" placeholder="Nama Lengkap" class="form-control" required/>
                                                    <div class="invalid-feedback">
                                                        Nama tidak boleh kosong
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label>Email</label>
                                                    <input type="text" name="email[0]" placeholder="Email" class="form-control" required/>
                                                    <div class="invalid-feedback">
                                                        Email tidak boleh kosong
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Penumpang 2</h5>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label>NIK</label>
                                                    <input type="text" name="nik[1]" placeholder="NIK" class="form-control" required/>
                                                    <div class="invalid-feedback">
                                                        NIK tidak boleh kosong
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label>Nama</label>
                                                    <input type="text" name="name[1] placeholder="Nama Lengkap" class="form-control" required/>
                                                    <div class="invalid-feedback">
                                                        Nama tidak boleh kosong
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label>Email</label>
                                                    <input type="text" name="email[1]" placeholder="Email" class="form-control" required/>
                                                    <div class="invalid-feedback">
                                                        Email tidak boleh kosong
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($bookingType === 'paket' && $bookingPacket === 'family')
                                        @for($i = 0; $i < (int)$familyCount; $i++)
                                        <h5>Anggota Keluarga {{ $i+1 }} </h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group mb-2">
                                                        <label>NIK</label>
                                                        <input type="text" name="nik[{{ $i }}]" placeholder="NIK" class="form-control" required/>
                                                        <div class="invalid-feedback">
                                                            NIK tidak boleh kosong
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-2">
                                                        <label>Nama</label>
                                                        <input type="text" name="name[{{ $i }}]" placeholder="Nama Lengkap" class="form-control" required/>
                                                        <div class="invalid-feedback">
                                                            Nama tidak boleh kosong
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-2">
                                                        <label>Email</label>
                                                        <input type="text" name="email[{{ $i }}]" placeholder="Email" class="form-control" required/>
                                                        <div class="invalid-feedback">
                                                            Email tidak boleh kosong
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    @endif
                                </div>
                            </div>
                            <div class="customer-information mb-4 d-flex align-items-center bg-grey rounded p-4">
                                <i class="fa fa-grin-wink rounded fs-1 bg-theme white p-3 px-4"></i>
                                <div class="customer-info ps-4">
                                    <h6 class="mb-1">Good To Know:</h6>
                                    <small>Beberapa informasi berguna untuk penumpang</small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 ps-ld-4">
                    @if($bookingType == 'quantity')
                    <x-shared.booking-sidebar :destination="$destination" :quantity="$ticketQuantity" :date="$bookingDate" :time="$bookingTime"/>
                    @elseif($bookingType === 'paket' && $bookingPacket === 'couple')
                    <x-shared.booking-sidebar :destination="$destination" quantity="1" :date="$bookingDate" :time="$bookingTime" packet="couple"/>
                    @elseif($bookingType === 'paket' && $bookingPacket === 'family')
                    <x-shared.booking-sidebar :destination="$destination" :quantity="$familyCount" :date="$bookingDate" :time="$bookingTime" packet="family"/>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="{{ asset('assets/js/parsleyjs/parsley.min.js') }}"></script>
{{--        <script src="{{ asset('assets/js/form-validation.init.js') }}"></script>--}}
        <script>
            {{--var myModal = new bootstrap.Modal(document.getElementById('loginModal'))--}}
            {{--@guest--}}
            {{--    myModal.show()--}}
            {{--@endguest--}}
            $(document).ready(function () {
                $('#checkOutButton').on('click', function (e) {
                    var parsley = $('.needs-validation').parsley({
                        errorClass: 'is-invalid',
                        successClass: 'is-valid'
                    })

                    parsley.validate()

                    if(parsley.isValid()) {
                        $('.needs-validation').submit();
                    }

                });
            })
        </script>
    @endpush
</x-layouts.main>
