<x-layouts.admin>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-4">
                    <h3 class="mb-4">Edit Data Destinasi</h3>
                    <form action="{{ route('admin.destination.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Destinasi</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $destination->name }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Harga (Per Seat)</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ $destination->price }}">
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Tipe</label>
                                    <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
                                        <option value="" selected>--Pilih Tipe--</option>
                                        <option value="a" @selected($destination->type == 'a')>A</option>
                                        <option value="b" @selected($destination->type == 'b')>B</option>
                                        <option value="c" @selected($destination->type == 'c')>C</option>
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="seat_count" class="form-label">Jumlah Seat</label>
                                    <input type="number" class="form-control @error('seat_count') is-invalid @enderror" name="seat_count" id="seat_count" value="{{ $destination->seat_count }}">
                                    @error('seat_count')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" id="location" value="{{ $destination->location }}">
                                    @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="map_url" class="form-label">URL Map</label>
                                    <input type="text" class="form-control" name="map_url" id="map_url" value="{{ $destination->map_url }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnail">
                                    @error('thumbnail')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="tinymceExample" rows="10">{{ $destination->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                    @if(session('success'))
                    <div class="alert alert-success my-4" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @push('scripts')

    <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
    <script type="text/javascript">
        $(function () {

        });
    </script>
    @endpush
    <x-admin.booking.show/>

</x-layouts.admin>
