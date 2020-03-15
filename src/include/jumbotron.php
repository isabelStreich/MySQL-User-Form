 <!-- CSS jumbotron -->
 <style>
     .jumbotron {
         margin-top: 60px;
     }

     .login {
         padding-top: 150px;
         padding-bottom: 100px;
         width: 60%;
         margin: auto;
     }

     .page-content {
         font-size: 20px;
         text-align: center;
         margin-top: 60px;
     }
 </style>
 <div class="jumbotron">

     <div class="login">
         <form>
             <h1> Login </h1>
             <div class="form-group row">
                 <label for="inputEmail" class="col-sm-2 col-form-label">Username</label>
                 <div class="col-sm-10">
                     <input type="email" class="form-control" id="inputEmail">
                 </div>
             </div>

             <div class="form-group row">
                 <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                 <div class="col-sm-10">
                     <input type="password" class="form-control" id="inputPassword">
                 </div>
             </div>

             <div class="form-group row">
                 <div class="col text-center">
                     <button type="submit" class="btn btn-primary">Login</button>
                 </div>
             </div>
         </form>
     </div>
 </div>