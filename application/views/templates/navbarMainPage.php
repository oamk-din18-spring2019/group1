<body>

  <!-- Start your project here-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
    <div class="container">
      <a href="#" class="navbar-brand">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="basicExampleNav">
        <ul class="navbar-nav mr-auto smooth-scroll">
          <li class="nav-item">
            <a href="#intro" class="nav-link waves-effect wawes-light">Home</a>
          </li>
          <li class="nav-item">
            <a href="#best-features" class="nav-link waves-effect wawes-light">Best features</a>
          </li>
          <li class="nav-item">
            <a href="#examples" class="nav-link waves-effect wawes-light">Examples</a>
          </li>
        </ul>
          <div class="text-center">
            <a href="<?php echo site_url("LoginRegistration/login")?>" class=""> 
              <button  class="btn-sm btn waves-effect wawes-light">
                <div class="loginButtonText">Login</div>
              </button>
            </a> 
          </div>
          <div class="text-center">
            <a href="<?php echo site_url("LoginRegistration/register")?>" class=""> 
              <button  class="btn-sm btn btn-outline-white">
                <div class="loginButtonText">Sign Up</div>
              </button>
            </a> 
          </div>       

      </div>
    </div>
  </nav>