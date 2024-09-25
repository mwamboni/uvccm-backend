<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-scheme="navy">
<head>
    @include('temp.css')
</head>

<body class="">
   <div id="root" class="root front-container">
      <section id="content" class="content">
         <div class="content__boxed w-100 min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="content__wrap">

               <div class="card shadow-lg">
                  <div class="card-body p-4">

                     <div class="text-center">
                        <h1 class="h3">Account Login</h1>
                        <p>Sign In to your account</p>
                     </div>

                     <form class="mt-4" action="#" autocomplete="off">

                        <div class="mb-3">
                           <input type="text" class="form-control" placeholder="Username" autofocus>
                        </div>

                        <div class="mb-3">
                           <input type="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="d-grid mt-5">
                           <button class="btn btn-primary btn-lg" type="submit">Sign In</button>
                        </div>
                     </form>

                     <div class="d-flex justify-content-between gap-md-5 mt-4">
                        <a href="#" class="btn-link text-decoration-none">Forgot password ?</a>
                        <a href="#" class="btn-link text-decoration-none">Create a new account</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

   </div>
   @include('temp.js')
</body>
</html>
