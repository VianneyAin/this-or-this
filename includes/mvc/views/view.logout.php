 <?php
   class Logout_View {
       function fn_logout_view($registration){

           if ($registration->CheckLogin()){
               if($registration->LogOut()){
                   $registration->RedirectToURL("http://localhost/jokes");
               }
           }
           else {
              $registration->RedirectToURL("http://localhost/jokes/connexion");
           }
       }
   }
 ?>
