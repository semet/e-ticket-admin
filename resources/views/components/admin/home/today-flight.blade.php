<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-header">
            <h3>Penerbangan Hari ini</h3>
        </div>
        <div class="card-body">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Take off</th>
                        <th scope="col">Landing</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Total Penumpang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $sch)
                    <tr>
                        <th scope="row">{{ substr($sch->start_hour, 0, 5) }}</th>
                        <td>{{  substr($sch->end_hour, 0, 5) }}</td>
                        <td>{{ $sch->destination->name }}</td>
                        <td>{{ count($sch->bookings) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
