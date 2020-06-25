function checkLogin(){

   var username=document.getElementById("user").value;
   var password=document.getElementById("pass").value;

   if (/^\S+@\S+\.\S+$/.test(username) )
   {
     if(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$/.test(password)){
       alert('Login Successful');
	   
     }
     else{
         alert("Password matching expression. Password must be at least 4 characters, no more than 8 characters, and must include at least one upper case letter, one lower case letter, and one numeric digit.");
     }

   }
   else{
     alert("Invalid Email");
   }
}

function searchresult(){
   var input, filter, ul, li, a, i;
   input =  document.getElementById("search_box_input");
   filter = input.value.toUpperCase();
   ul = document.getElementById("myMenu");
   li = ul.getElementsByTagName("li");
   for (i = 0; i < li.length; i++) {
     a = li[i].getElementsByTagName("a")[0];
     if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
     li[i].style.display = "";
     } else {
       li[i].style.display = "none";
       }
   }
}
