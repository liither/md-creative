<!-- ***** Header Area Start ***** -->
<!-- Navbar -->
<header class="header-area header-sticky header-area-blog wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
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
              <li><x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link></li>
              <li><x-nav-link href="/posts" :active="request()->is('/posts')">Blog</x-nav-link></li>
              <li><x-nav-link href="/login">Login</x-nav-link></li>

              <li><div class="border-first-button"><a href="https://wa.me/+62882008206140?text=Saya%20Mau%20Promo%20Analisa%20Bisnis%20Saya">Check Out</a></div></li> 
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