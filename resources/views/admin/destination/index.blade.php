<x-layouts.admin>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end gap-2 my-2">
                        <a href="" class="btn btn-primary"><i class="link-icon" data-feather="plus"></i> Add Destinasi</a>
                    </div>
                    <table class="table table-bordered table-hover datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Destinasi</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Harga (Perorang)</th>
                                <th scope="col">Tipe Order</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($destinations as $destination)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $destination->name }}</td>
                                <td>{{ $destination->location }}</td>
                                <td>{{ $destination->price }}</td>
                                <td>
                                    @if($destination->type == 'a')
                                    <span>Quantity/Paket</span>
                                    @elseif($destination->type == 'b')
                                    <span>Quantity</span>
                                    @elseif($destination->type == 'c')
                                    <span class="badge bg-secondary">Coming soon</span>
                                    @endif
                                </td>
                                <td>
                                    @if($destination->status == 'ready')
                                    <span>Ready</span>
                                    @elseif($destination->status == 'not ready')
                                    <span class="badge bg-secondary">Coming soon</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <ul class="d-flex list-unstyled mb-0 justify-content-center">
                                        <li class="me-2">
                                            <a href="{{ route('admin.destination.edit', $destination->id) }}"><i class="link-icon"  data-feather="edit"></i></a>
                                        </li>
                                        <li><a href="#"><i class="link-icon"  data-feather="delete"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script type="text/javascript">
        $(function () {

        });
      </script>
    @endpush
      <x-admin.booking.show/>

</x-layouts.admin>
