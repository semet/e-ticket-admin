<div class="col-lg-4">
    <div class="sidebar-sticky">
        <div class="list-sidebar">
            <div class="author-news border-all box-shadow p-4 rounded">
                <div class="author-news-content">

                    <div class="author-content">
                        <h3 class="title"><a href="#">Pilih Tanggal dan Waktu</a></h3>
                        <form action="{{ route('booking') }}" method="post" id="bookingCheckForm">
                            @csrf
                            <div class="my-2">
                                <label for="bookingDate" class="form-label text-white">Tanggal</label>
                                <input type="text" name="bookingDate" id="bookingDate" class="form-control form-control-sm date-picker">
                            </div>
                            <div class="my-2">
                                <label for="bookingTime" class="form-label text-white">Jam</label>
                                <select name="bookingTime" id="bookingTime" class="form-select">
                                    <option value="">--Pilih Jam--</option>
                                    @foreach($destination->schedules as $schedule)
                                        <option value="{{ $schedule->id }}">{{ substr($schedule->start_hour, 0, 5).' s/d '. substr($schedule->end_hour, 0, 5) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($destination->type == 'a')
                            <div class="my-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="bookingType" id="quantity" value="quantity" checked>
                                    <label class="form-check-label text-white" for="quantity">Quantity</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="bookingType" id="paket" value="paket">
                                    <label class="form-check-label text-white" for="paket">Paket</label>
                                </div>
                            </div>
                            @endif
                            @if($destination->type != 'a')
                                <input type="hidden" name="bookingType" id="bookingType" value="quantity">
                            @endif
                            <input type="hidden" name="destinationType" id="destinationType" value="{{ $destination->type }}">
                            <input type="hidden" name="destinationId" id="destinationId" value="{{ $destination->id }}">
                            <div class="my-2" id="passengerQuantity">
                                <label for="ticketQuantity" class="form-label text-white">Quantity</label>
                                <input type="number" name="ticketQuantity" id="ticketQuantity" class="form-control form-control-sm" min="1" max="{{ $destination->type == 'a' ? 8 : 14 }}" value="1" />
                            </div>
                            <div class="my-2" style="display: none" id="packetType">
                                <label for="bookingPacket" class="form-label text-white">Paket</label>
                                <select name="bookingPacket" id="bookingPacket" class="form-select">
                                    <option value="">--Pilih Paket--</option>
                                    <option value="couple">Couple</option>
                                    <option value="family">Family</option>
                                </select>
                            </div>
                            <div class="my-2" style="display: none" id="familySection">
                                <label for="familyCount" class="form-label text-white">Paket</label>
                                <select name="familyCount" id="familyCount" class="form-select">
                                    <option value="">--Pilih Jumlah anggota keluarga--</option>
                                    <option value="3">3 orang</option>
                                    <option value="4">4 orang</option>
                                </select>
                            </div>
                            <div class="my-2">
                                <button class="btn btn-primary" type="submit" id="submitButton">
                                    Check <i class="fas fa-filter"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script>

        $(document).ready(function () {
            var myModal = new bootstrap.Modal(document.getElementById('loginModal'))

            var someDate = new Date();
            var numberOfDaysToAdd = 24;
            var result = someDate.setDate(someDate.getDate() + numberOfDaysToAdd);
            $('.date-picker').datepicker({
                startDate: new Date(result),
                todayBtn: true,
                todayHighlight: true,
                autoclose: true,
                format: 'yyyy-mm-dd'
            })

            $('input[type=radio][name=bookingType]').change(function(e) {
                if(e.target.value == 'quantity')
                {
                    $('#passengerQuantity').show()
                    $('#packetType').hide()
                    $('#familySection').hide();
                    $('#familyCount').val('');
                }else{
                    $('#passengerQuantity').hide()
                    $('#packetType').show()
                }
            })
            $('#bookingPacket').change(function (e) {
                $('#familyCount').val('');
                if(e.target.value === 'family')
                {
                    $('#familySection').show();
                }else{
                    $('#familySection').hide();
                }
            });
            $('#submitButton').on('click', function (e) {

                e.preventDefault();
                var date = $('#bookingDate').val()
                var time = $('#bookingTime').val()
                var destination = $('#destinationId').val()
                var destinationType = $('#destinationType').val()
                var type = $('input[name="bookingType"]:checked').val()
                var quantity = $('#ticketQuantity').val()
                var packet = $('#bookingPacket').val()
                var familyCount = $('#familyCount').val()
                console.log(type)
                axios.post('{{ route('booking.check-availability') }}', {
                    _token: '{{ csrf_token() }}',
                    bookingDate: date,
                    bookingTime: time,
                    destinationId: destination,
                    destinationType: destinationType,
                    bookingType: type,
                    ticketQuantity: quantity,
                    bookingPacket: packet,
                    familyCount: familyCount
                })
                    .then(function (response) {
                        console.log(response.data.available)
                        if(response.data.available){
                            Swal.fire({
                                icon: 'success',
                                title: 'Yes...',
                                text: 'Kami memiliki seat untuk anda',
                                confirmButtonText: 'lanjutkan booking'
                            }).then(function(result) {
                                if(result.isConfirmed) {
                                    @guest
                                        myModal.show()
                                    @endguest
                                    @auth
                                        $('#bookingCheckForm').submit()
                                    @endauth
                                }
                            })
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Semua seat telah di booking di tanggal dan waktu yang dipilih!',
                            })
                        }
                    })
                    .catch(function (err) {
                        console.log(err.response.data)
                    })
            });
        });
    </script>
@endpush
