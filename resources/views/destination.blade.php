<x-layouts.main>
    <x-slot:title>
        Destination Details
    </x-slot:title>
    <!-- top Destination starts -->
    <section class="trending pt-6 pb-0 bg-lgrey">
       <div class="container">
           <div class="row">
               <div class="col-lg-8">
                   <div class="single-content">
                       <div id="highlight" class="mb-4">
                           <div class="single-full-title border-b mb-2 pb-2">
                               <div class="single-title">
                                   <h2 class="mb-1">{{ $destination->name }}</h2>
                                   <div class="rating-main d-flex align-items-center">
                                       <p class="mb-0 me-2"><i class="icon-location-pin"></i> {{ $destination->location }}</p>
                                       <div class="rating me-2">
                                           <span class="fa fa-star checked"></span>
                                           <span class="fa fa-star checked"></span>
                                           <span class="fa fa-star checked"></span>
                                           <span class="fa fa-star checked"></span>
                                           <span class="fa fa-star checked"></span>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <div class="description-images mb-4">
                               <img src="{{ asset('assets/images/trending/trending-large.jpg') }}" alt="" class="w-100 rounded">
                           </div>

                           <div class="description mb-2">
                               <h4>Description</h4>
                                <p>{{ $destination->description }}</p>
                            </div>


                       </div>

                       <div  id="single-map" class="single-map mb-4">
                           <h4>Map</h4>
                           <div class="map rounded overflow-hidden">
                               <div style="width: 100%">
                                   {{-- <iframe class=" rounded overflow-hidden" height="400" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+(mangal%20bazar)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> --}}
                               </div>
                           </div>
                       </div>

                       <!-- blog review -->
                       <div  id="single-add-review" class="single-add-review">
                           <h4>Write a Review</h4>
                           <form>
                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group mb-2">
                                           <input type="text" placeholder="Name">
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group mb-2">
                                           <input type="email" placeholder="Email">
                                       </div>
                                   </div>
                                   <div class="col-md-12">
                                       <div class="form-group mb-2">
                                           <textarea>Comment</textarea>
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-btn">
                                           <a href="#" class="nir-btn">Submit Review</a>
                                       </div>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>

               <!-- sidebar starts -->
               <x-shared.sidebar :destination="$destination"/>
           </div>
       </div>
   </section>
   <!-- top Destination ends -->
</x-layouts.main>
