 <!-- footer start -->
 <div class="cv-footer cv-footer-two spacer-bottom">
    <div class="container">
     
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="cv-foot-box cv-foot-logo">
                    <img src="{{ url('nassets/images/logo.png') }}" alt="image" class="img-fluid"/>
                    <p>The purpose of medical uncle is to make the purchase of medical Equipments for local businesses and hospitals more accessible.</p>
                   
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="cv-foot-box cv-foot-links">
                    <h2>Categories</h2>
                    <ul>
                        <?php $categories = App\Category::limit(5)->get(); ?>
                        @foreach ($categories as $category)
                            <li><a href="{{ url('category/'.$category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                       
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="cv-foot-box cv-foot-links">
                    <h2>Usefull links</h2>
                    <ul>
                        <li><a href="{{ url('shop') }}">Shop</a></li>
                        <li><a href="{{ url('about') }}">About</a></li>
                        <li><a href="{{ url('contact') }}">Contact</a></li>
                        {{-- <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li> --}}
                        <li><a href="{{ url('blog') }}">Blog</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="cv-foot-box cv-foot-contact">
                    <h2>Contact</h2>
                    <p><span>Contact : </span>(+92) 348 5583125</p>
                    <p><span>Email : </span>support@medicaluncle.com</p>
                  
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer end -->
<!-- copyright start -->
<div class="cv-copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>&copy; 2021. All right reserverd by Medical Uncle</p>
            </div>
        </div>
    </div>
</div>
<!-- copyright end -->