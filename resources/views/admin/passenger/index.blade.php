<x-layouts.admin>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK/Passport</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
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
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.passengers.list') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nik', name: 'nik'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                ]
            });
        });
      </script>
    @endpush
      <x-admin.booking.show/>

</x-layouts.admin>
