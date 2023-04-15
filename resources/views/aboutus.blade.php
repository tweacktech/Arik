@extends('layouts.app', ['title' => 'Error Page '])

@section('content')

<style>
html{
  scroll-behavior: smooth;
}
 
body{
  background-color:#fff;
}

aside {
  width: 30%;
  padding-left: 15px;
  margin-left: 15px;
  float: right;
  font-style: italic;
  background-color: lightgray;
}

.bg-black{
  background: linear-gradient(109.6deg, rgb(36, 45, 57) 11.2%, rgb(16, 37, 60) 51.2%, rgb(0, 0, 0) 98.6%);

}
.text-white{
    color:  white;
}
.text-black{
    color:  black;
}
.bg-primary-orange{
  background-color: #fec503;
}
.primary-orange{
  color: #fec503;
}
.org-btn{
  border: 1px solid #fec503;
  color: #fec503;
}
.org-btn:hover{
  background-color: #fec503;
  color: white;
}

.light-grey{
  color:#6c757d;
}

.bg-light-grey{
  background-color: #6c757d:
}

.social-buttons-circle-dark-grey{
  background:  #1a1d20;
}

/* img css */

/* .testimonals-container img{
  width:300px;
  
} */

/* hero */
.center{
  text-align: center;
}

/*  Card hover */
.move-up:hover{
    background-color: #fec503;
  color: white;
    transition: all .5s;
    transform : translateY(-10px);
}

.ng-mrg-t{
  margin-top: -50px;
}


/* Footer code */
.foot{
/*   position: relative; */
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #1a1d20;
   color: white;
   text-align: center;
   top: 75px;
}

a {
  color: #6c757d ;
}
a:hover {
  color: #fec503;
  text-decoration: none;
}

::selection {
  background: #fec503;
  text-shadow: none;
}
.footer-column {
  text-align: center;
}
.nav-link {
      padding: 0.1rem 0;
    }
span.nav-link {
      color: #6c757d;
    }
span.nav-link:hover {
      color: #fec503;
    }
span.footer-title {
      font-size: 14px;
      font-weight: 700;
      color: #fff;
      text-transform: uppercase;
    }
    .fas {
      margin-right: 0.5rem;
    }

footer {
  padding: 2rem 0;
  background-color: #212529;
  
}


ul.social-buttons {
  margin-bottom: 0;
}

ul.social-buttons li a:active,
ul.social-buttons li a:focus,
ul.social-buttons li a:hover {
  background-color: #fec503;
}

ul.social-buttons li a {
  font-size: 20px;
  line-height: 40px;
  display: block;
  width: 40px;
  height: 40px;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
  color: #fff;
  border-radius: 100%;
  outline: 0;
  background-color:  #1a1d20;
}

footer .quick-links {
  font-size: 90%;
  line-height: 40px;
  margin-bottom: 0;
  text-transform: none;
  font-family: Montserrat, "Helvetica Neue", Helvetica, Arial, sans-serif;
}


.copyright {
  color: white;
}

.fa-ellipsis-h {
  color: white;
  padding: 2rem 0;
}
</style>
<div class="nav-bar">

</div>

<div class="hero-container" id="hero-sec" style="margin-top:150px">
  <div class="container-fluid ">
  <div class="row d-flex">
    <div class="col align-middle">
      <div class="px-2 py-2">
      <img src="https://img.freepik.com/free-vector/happy-freelancer-with-computer-home-young-man-sitting-armchair-using-laptop-chatting-online-smiling-vector-illustration-distance-work-online-learning-freelance_74855-8401.jpg?w=900&t=st=1667037491~exp=1667038091~hmac=7c71ea8afc8f3cc8065c5ccc05d105e3c8a7b76f0133016cb210a7882dc19611" class="img-fluid" alt="...">
      </div>
    </div>
    <div class="col">
      <div class="px-5 py-5 mt-5">
        <div class="px-2 py-2 align-middle">
        	<img style="width:30%" src="https://gapaautoparts.com/uploads/b79logo11__1_-removebg-preview.png" />
       
        </div>
        <div class="px-2 py-2">
          <h1 class="btn btn-outline-info">About Us</h1>
        </div>
      </div>
    </div>
</div>
</div>
<!-- main container -->
<div class="main-container">
  <div class="container-fluid">
  ...
</div>
</div>


</div>


@endsection