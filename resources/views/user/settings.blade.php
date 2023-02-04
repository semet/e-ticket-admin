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
                                    <h4 class="mb-1">Setting Account</h4>
                                </div>
                            </div>

                            <form action="">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama lengkap</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{ auth()->user()->name }}">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Lama</label>
                                    <input type="password" class="form-control" id="password" placeholder="*****">
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" id="newPassword" placeholder="*****">
                                </div>
                                <div class="mb-3">
                                    <label for="newPasswordConfirmation" class="form-label">Ulang Password Baru</label>
                                    <input type="password" class="form-control" id="newPasswordConfirmation" placeholder="*****">
                                </div>

                                <div class="mb-3">
                                    <button class="nir-btn float-lg-star w-25" >Update</button>
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
