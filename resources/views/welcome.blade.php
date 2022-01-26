@extends('layouts.main')
@section('content')
    <!-- HOME -->
  <section id="home" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
           <div class="row">

                <div class="col-md-6 col-sm-12">
                     <div class="home-info">
                       @forelse ($home as $item)
                           <h1>{{ $item->title }}</h1>
                           <div class="body">{{ $item->body }}</div>
                       @empty
                           
                       @endforelse
                          
                          <a href="#about" class="btn section-btn smoothScroll">Start a project</a>
                          <span>
                               CALL US (+66) 010-020-0340
                               <small>For any inquiry</small>
                          </span>
                     </div>
                </div>
           </div>
      </div>
 </section>


 <!-- ABOUT -->
 <section id="about" data-stellar-background-ratio="0.5">
      <div class="container">
           <div class="row">
              <div class="about-info">
                @forelse ($profil as $item)
                    <div class="section-title">
                        <h2>Sejarah</h2>
                  </div>
                  <p>{{ $item->profil }}</p>
                @empty
                    
                @endforelse
                @forelse ($profil as $item)
                    <h2 class="text-center" >Visi & Misi</h2>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="service-item">
                        <h3 class="text-center">Visi</h3>
                        <p>{{ $item->visi }}</p>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="service-item">
                        <h3 class="text-center">Misi</h3>
                        <p>{{ $item->misi }}</p>
                      </div>
                    </div>
                @empty
                    
                @endforelse
                  
                  
              </div>
           </div>
      </div>
 </section>


 <!-- BLOG -->
 <section id="blog" data-stellar-background-ratio="0.5">
      <div class="container">
           <div class="row">

                <div class="col-md-12 col-sm-12">
                     <div class="section-title">
                          <h2>Blog</h2>
                          <span class="line-bar">...</span>
                     </div>
                </div>

                <div class="col-md-6 col-sm-6">
                     <!-- BLOG THUMB -->
                     @forelse ($blog as $item)
                         <div class="media blog-thumb">
                                <div class="media-object media-left">
                                    <a href="/blog/{{ $item->slug }}"><img src="{{ asset('storage/'. $item->image) }}" class="img-responsive" alt=""></a>
                                </div>
                                <div class="media-body blog-info">
                                    <small><i class="fa fa-clock-o"></i> December 22, 2017</small>
                                    <h3><a href="/blog/{{ $item->slug }}">{{ $item->title }}</a></h3>
                                    <p>Posted In: <span>{{ $item->author }}</p>
                                    <a href="/blog/{{ $item->slug }}" class="btn section-btn">Read article</a>
                                </div>
                          </div>
                     @empty
                         
                     @endforelse
                     
                </div>                
           </div>
      </div>
 </section>


 <!-- WORK -->
 <section id="work" data-stellar-background-ratio="0.5">
      <div class="container">
           <div class="row">

                <div class="col-md-12 col-sm-12">
                     <div class="section-title">
                          <h2>Portfolio</h2>
                          <span class="line-bar">...</span>
                     </div>
                </div>

                <div class="col-md-3 col-sm-6">
                     <!-- WORK THUMB -->
                     <div class="work-thumb">
                          @forelse ($portfolio as $item)
                              <a href="{{ asset('storage/' . $item->image) }}" class="image-popup">
                               <img src="{{ asset('storage/' . $item->image) }}" class="img-responsive" alt="Work">

                               <div class="work-info">
                                    <h3>{{ $item->title }}</h3>
                                    <small>{{ $item->keterangan }}</small>
                               </div>
                              </a>
                          @empty
                              
                          @endforelse    
                     </div>
                </div>
           </div>
      </div>
 </section>
<!-- BLOG -->
<section id="gallery" data-stellar-background-ratio="0.5">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                         <h2>
                              Gallery</h2>
                         <span class="line-bar">...</span>
                    </div>
               </div>

               <div class="col-md-3 col-sm-6">
                    <!-- WORK THUMB -->
                    <div class="work-thumb">
                         @forelse ($gallery as $item)
                             <a href="{{ asset('storage/' . $item->image) }}" >
                              <img src="{{ asset('storage/' . $item->image) }}" class="img-responsive" alt="Work">

                              <div class="work-info">
                                   <h3>{{ $item->title }}</h3>
                              </div>
                             </a>
                         @empty
                             
                         @endforelse    
                    </div>
               </div>
          </div>
     </div>
</section>
 <!-- CONTACT -->
 <section id="contact" data-stellar-background-ratio="0.5">
      <div class="container">
           <div class="row">

                <div class="col-md-12 col-sm-12">
                     <div class="section-title">
                          <h2>Contact us</h2>
                          <span class="line-bar">...</span>
                     </div>
                </div>

                <div class="col-md-8 col-sm-8">
                    
                     <!-- CONTACT FORM HERE -->
                     <form id="contact-form" role="form" action="#" method="post">
                          <div class="col-md-6 col-sm-6">
                               <input type="text" class="form-control" placeholder="Full Name" id="cf-name" name="cf-name" required="">
                          </div>

                          <div class="col-md-6 col-sm-6">
                               <input type="email" class="form-control" placeholder="Your Email" id="cf-email" name="cf-email" required="">
                          </div>

                          <div class="col-md-6 col-sm-6">
                               <input type="tel" class="form-control" placeholder="Your Phone" id="cf-number" name="cf-number" required="">
                          </div>

                          <div class="col-md-6 col-sm-6">
                               <select class="form-control" id="cf-budgets" name="cf-budgets">
                                    <option>Budget Level</option>
                                    <option>$500 to $1,000</option>
                                    <option>$1,000 to $2,200</option>
                                    <option>$2,200 to $4,500</option>
                                    <option>$4,500 to $7,500</option>
                                    <option>$7,500 to $12,000</option>
                                    <option>$12,000 or more</option>
                               </select>
                          </div>

                          <div class="col-md-12 col-sm-12">
                               <textarea class="form-control" rows="6" placeholder="Your requirements" id="cf-message" name="cf-message" required=""></textarea>
                          </div>

                          <div class="col-md-4 col-sm-12">
                               <input type="submit" class="form-control" name="submit" value="Send Message">
                          </div>

                     </form>
                </div>

                <div class="col-md-4 col-sm-4">
                     <div class="google-map">
<!-- How to change your own map point
        1. Go to Google Maps
        2. Click on your location point
        3. Click "Share" and choose "Embed map" tab
        4. Copy only URL and paste it within the src="" field below
-->
                         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.887433887394!2d110.94980311420805!3d-7.587229794528774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a18899172a6d9%3A0xe9c84052b95a73cb!2sPT.%20Kusuma%20Kreasi%20Utama!5e0!3m2!1sid!2sid!4v1643073476027!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                     </div>z
                </div>

           </div>
      </div>
 </section>
@endsection


     