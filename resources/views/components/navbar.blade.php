<!-- ***** Header Area Start ***** -->
<!-- Navbar -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="/" class="logo d-none d-sm-none d-md-block">
              <img src="{{ asset('images/Logo-MDC-01.png') }}" alt="Manifest Digital Creative Logo" height="55">
            </a>
    
            <a href="/" class="logo-sm d-block d-sm-block d-md-none">
              <img src="{{ asset('images/Logo-MDC-01.png') }}" alt="Manifest Digital Creative Logo">
            </a>


            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><x-nav-link href="#top" :active="request()->is('#top')">Home</x-nav-link></li>
              <li class="scroll-to-section"><x-nav-link href="#about" :active="request()->is('#about')">About</x-nav-link></li>
              <li class="scroll-to-section"><x-nav-link href="#services" :active="request()->is('#services')">Services</x-nav-link></li>
              <li class="scroll-to-section"><x-nav-link href="#portfolio" :active="request()->is('#portfolio')">Why Us</x-nav-link></li>
              <li class="scroll-to-section"><x-nav-link href="#contact" :active="request()->is('#contact')">Contact</x-nav-link></li>
              <li class="scroll-to-section"><x-nav-link href="/posts" :active="request()->is('/posts')">Blog</x-nav-link></li>

              <li class="scroll-to-section"><div class="border-first-button"><a href="https://wa.me/+62882008206140?text=Saya%20Mau%20Promo%20Analisa%20Bisnis%20Saya">Check Out</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->