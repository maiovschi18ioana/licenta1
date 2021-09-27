<html>

<head>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>


<body style='font-family: Arial; background-color: #cde8f9; font-size: 14px;'>
<div class='container-fluid text-center'>
<div class="gridMaster"> 
<form method="POST" action="/login">
   @csrf
    <div class="row">
     <h4>Username</h4>
     <input type="text" name="user">
    </div>
    <div class="row">
     <h4>Parola</h4>
     <input type="password" name="password" >
    </div>
    <div class="row">
        <input type="submit" value="Log in">
    </div>
    <div class="row">
        <button class="passreset"> Reset parola </button>
        <button class="userreset"> Reset username </button>
    </div>

    <div class="row">
        @if($err)
            <h4>Datele sunt gresite!</h4>
        @endif
    
 </div>
 </div>
</form>
<script>
    $('.passreset').on('click',function(ev){
        ev.preventDefault();
       var email = prompt("Introduceti mail-ul pentru care doriti sa resetati parola","");
       var payload={email:email}; 
        $.ajax({
            url:"/resetpass",
            type:"post",
            data:payload,
            success:function(data){
                if(data.scs){
                    alert("Parola a fost resetata cu succes");
                }else{
                    alert("Parola nu a fost resetata cu succes");
                }
            },
            error:function(data){
                alert("A aparut o problema!");
                console.log(data);
            }
        })
    })
    $('.userreset').on('click',function(ev){
        ev.preventDefault();
       var email = prompt("Introduceti mail-ul pentru care doriti sa resetati usernameul","");
       var payload={email:email}; 
        $.ajax({
            url:"/resetuser",
            type:"post",
            data:payload,
            success:function(data){
                if(data.scs){
                    alert("Username-ul a fost resetat cu succes");
                }else{
                    alert("Username-ul nu a fost resetat cu succes");
                }
            },
            error:function(data){
                alert("A aparut o problema!");
                console.log(data);
            }
        })
    })
    
</script>
</div>
<style>
.gridMaster{
         margin: 0 auto;
        margin-top: 100px;
        
                   /* box-shadow:0px 10px 50px 0px black;*/
            
        }
form {
    width: max-content;
    margin: 0 auto;
}
</style>
<body>
</html>