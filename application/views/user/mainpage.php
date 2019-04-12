
<div id="intro" class="view">
  <div class="mask rgba-black-strong">
    <div class="container-fluid d-flex align-items-center justify-content-center h-100">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-md-10">
          <h2 class="display-4 font-weight-bold white-text pt-5 mb-2">
            Hello, newcomers!
          </h2>
          <hr class="hr-light">
          <h4 class="white-text my-4">
            We provide a platform for arguing on different topics
          </h4>
          <button class="btn btn-outline-white waves-effect waves-light">
            Read more <i class="fa fa-book"></i>
          </button>

        </div>
      </div>
    </div>
  </div>
</div>
  
  <main class="mt-5 ">
    <section id="best-features" class="">
              <div class="container ">
             
                  <div class="col-md-4 "> <h1 class="display-7  bottomborder font-weight-bold">Why us?</h1> <br>
                  </div>
                  <div class="col-md-12"> <h3 class="pb-5 text-left">Have you ever wanted to talk so bad but had nowhere to go or nobody to talk to?</div>
                    </h3>

                </div>
          </section>
          
          <section id="examples" class="text-center my-5">
              <div class="container pt-5 text-white">
             <div class="row">
                  <div class="col-md-4"> <h1 class="display-7  bottomborder font-weight-bold">Why us?</h1> <br>
                  <div class=""> <h3 class="pb-5 text-left">Have you ever felt so bored that surfing the Internet is just not enough and you want to do something even more nonsense?</div>
                    </h3>
                  </div>
                  <div class="col-md-6"> <img style="width:80%" src="http://www.pngonly.com/wp-content/uploads/2017/05/Flowers-Vectors-PNG-Image.png" alt=""></div>
                  
                </div>
              </div>
    
          </section>
          
          <section id="best-features" class="">
              <div class="container ">
             
                  <div class="col-md-4 "> <h1 class="display-7  bottomborder font-weight-bold">Why us?</h1> <br>
                  </div>
                  <div class="col-md-12"> <h3 class="pb-5 text-left">OR are you a debate professional and want a playground to kill time and practice spontaneously?</div>
                    </h3>

                </div>
          </section>
      <hr class="my-3 hr-light">
    
      <section id="gallery" class="py-4">
        <div class="text-center"> <i class="fas fa-laugh-beam display-1"></i></div> <br>
        <div class="container text-center">
          <div class="row  mx-auto">
      <div class="col-md-3"></div>
      <div class="col-md-6"> <h1 class="display-7  bottomborder1 font-weight-bold">Are you interested ?</h1> <br> </div>
     <div class="col-md-3"></div>
    </div>
    </div>
    <div class="container-fluid" id=test>
      <style> .test{display: none; transition-delay: 0.4;}</style>
      <div class="row">   
          <div class="col-md-3"></div>
         <div class="col-md-6 font-weight-bold text-center pb-2">What are you waiting for? <br> Come join us. <span class=test>It's free,</span> <span class=test>it's fun</span> <span class=test>and it's f*cking educational.</span></div>
         <div class="col-md-3"></div>
        </div>
    </div>
   
    <script>
      //set the effect of how text appear
       let join = document.getElementById('test');
       let mottos = Array.from(document.getElementsByClassName('test'));
       window.onscroll = () =>{
         let i = 0;
        if(this.scrollY + 925 >= join.offsetTop){
          var itv = setInterval( () => {
            if(i<3){
              mottos[i].style.display = 'inline-block';
              i++;
            }else{
              clearInterval(itv)
            }
          } ,800)
        }
       }
    </script>
    <div class="text-center"><a  href="<?php echo site_url("LoginRegistration/register")?>" class=""> 
      <button  class="btn btn-lg btn-success waves-effect rounded loginButton ">
        <div class="loginButtonText">Sign Up</div>
      </button></a> 
    </div>
         
      </section>
    </main>