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
                                    <h2 class="mb-1">Selamat Datang {{ auth()->user()->name }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- sidebar starts -->
                <x-user.sidebar/>
            </div>
        </div>
    </section>
</x-layouts.main>
