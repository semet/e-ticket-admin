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
                                    <h4 class="mb-1">Kirim Pesan ke Admin</h4>
                                </div>
                            </div>

                            <form action="">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <button class="nir-btn float-lg-star w-25" >Send</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>

                <!-- sidebar starts -->
                <x-user.sidebar/>
            </div>
        </div>
    </section>
</x-layouts.main>
