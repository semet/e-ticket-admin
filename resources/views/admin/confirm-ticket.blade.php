<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Konfirmasi E-Tiket</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body>
        <div class="container-fluid" style="margin-top:200px">
            <div class="" style="margin-top:200px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-left mb-4">
                            <h3 class="text-primary">E-Ticket Approval</h3>
                        </div>
                        <dl class="row">
                            <dt class="col-sm-4 mb-2">Kode Booking</dt>
                            <dd class="col-sm-8 mb-2">{{ $passenger->booking->number }}</dd>
                            <dt class="col-sm-4 mb-2">Nama Penumpang</dt>
                            <dd class="col-sm-8 mb-2">{{ $passenger->name }}</dd>
                            <dt class="col-sm-4 mb-2">Tanggal Terbang</dt>
                            <dd class="col-sm-8 mb-2">{{ $passenger->booking->date }}</dd>
                            <dt class="col-sm-4 mb-2">Jam Terbang</dt>
                            <dd class="col-sm-8 mb-2">{{ substr($passenger->booking->schedule->start_hour, 0, 5). ' - ' .substr($passenger->booking->schedule->end_hour, 0, 5) }}</dd>
                        </dl>

                        @if(!$passenger->is_claimed)
                        <div class="d-flex justify-content-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#passwordCheck" class="btn btn-primary mx-auto">Approve</button>
                        </div>
                        @else
                        <div class="alert alert-danger" role="alert">
                            Sudah di claim
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    <div class="modal fade" id="passwordCheck" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="passwordCheckLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="passwordCheckLabel">Approve Tiket</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.confirm.approve') }}" id="approvalForm" method="post">
                <div class="modal-body">
                    @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    @csrf
                    <input type="hidden" value="{{ $passenger->id }}" name="passengerId">
                    <input type="password" class="form-control" name="password" placeholder="type password">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mx-auto" id="approvalButton">Approve</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('passwordCheck'))
        @if(!$passenger->is_claimed)
            myModal.show()
        @endif
    </script>

</html>
