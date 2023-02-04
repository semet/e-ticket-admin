<x-layouts.admin>
    <div class="search-box p-4 bg-white rounded mb-3 box-shadow">
        <form class="forms-sample" action="{{ url()->current() }}" method="get" id="filterForm">
            <div class="row align-items-center">
                <div class="col-lg-3">
                <h5>Jangka Waktu</h5>
                </div>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control datePicker" name="start_date" id="start_date">
                </div>
                <div class="col-lg-3 col-md-4">
                    <input type="text" class="form-control datePicker" name="end_date" id="end_date">
                </div>
                <div class="col-lg-3 col-md-4">
                    <button class="btn btn-primary btn-sm" type="submit">
                        <i data-feather="filter"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Nama Customer</th>
                                <th>Email</th>
                                <th>Status Pembayaran</th>
                                <th>Nominal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script type="text/javascript">
        $(function () {

            var url = '{{ route('admin.bookings.list', ['startDate' => request()->get('start_date'), 'endDate' => request()->get('end_date')]) }}';
            var parseResult = new DOMParser().parseFromString(url, "text/html");
            var parsedUrl = parseResult.documentElement.textContent;

            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: parsedUrl,
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'number', name: 'number'},
                    {data: 'customer_name', name: 'customer_name'},
                    {data: 'customer_email', name: 'customer_email'},
                    {data: 'status', name: 'status'},
                    {data: 'nominal', name: 'nominal'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

            $('#showBooking').on('show.bs.modal', function (e) {
                const id = e.relatedTarget.id;
                const url = '{{ route('admin.bookings.show', ':param') }}'
                const parsedUrl = url.replace(':param', id)
                //
                axios.get(parsedUrl)
                .then(function (response) {
                   console.log(response.data)
                   $('#bookingCode').html(response.data.booking.number)
                   $('#bookingDate').html(response.data.booking.date)
                   $('#flightTime').html(`${response.data.booking.schedule.start_hour.substring(0, 5)} - ${response.data.booking.schedule.end_hour.substring(0, 5)}`)
                   $('#bookingStatus').html(response.data.booking.status)
                   $('#bookingType').html(response.data.booking.type)
                   $('#paymentTime').html(response.data.details.transaction_time)
                   $('#paymentStatus').html(response.data.details.transaction_status)
                   $('#paymentType').html(response.data.details.payment_type)
                })
            })
        });
      </script>
    @endpush
      <x-admin.booking.show/>

</x-layouts.admin>
