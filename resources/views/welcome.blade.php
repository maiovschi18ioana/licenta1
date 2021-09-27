<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> HOME </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  </head>
  <body style='font-family: Arial; background-color: #cde8f9; font-size: 14px;'>


    <div class="header" style="padding:10px; border-bottom:1px solid black;">
      <div class="clock" style="position:absolute;top:10px;left:10px;">

      </div>
      <div class="" style="margin:0 auto;text-align:center;">
          {{Session::get('user')->nume.' '.Session::get('user')->prenume.' '.Session::get('user')->tip_angajat}}
      </div>
      <div class="" style="position:absolute;top:10px;right:10px;">
          <a href="{{route('delogare')}}" class=''>Delogare</a>
      </div>

    </div>
    <script>
     var time = new Date();
            $('.clock').html(time.toLocaleString());
      window.onload = function(){
       
        setInterval(function(){
          var time = new Date();
            $('.clock').html(time.toLocaleString());
        },1000);
      }
    </script>



    <div class='container-fluid text-center'>
    
    </div>

    <div class="gridMaster"> 
       
        @if($nivel_acc ==='Administrator')
        <div class="grid">
            <a href="{{route('profil')}}" class="blocks"> Profil </a>
            <a href="{{route('documents')}}" class="blocks"> Documente </a>
            <a href="{{route('angajati')}}" class="blocks"> Angajati </a>
            <a href="{{route('ruta')}}" class="blocks"> Rute </a>
            <a href="{{route('avioane')}}" class="blocks"> Avioane </a>
            <a href="{{route('zboruri')}}" class="blocks"> Zboruri </a>

            <a href="{{route('gfrt')}}" class="blocks"> Grafice Rute </a>
            <a href="{{route('gfav')}}" class="blocks"> Grafice Avion </a>  
            <a href="{{route('gfzb')}}" class="blocks"> Ierarhie Zboruri</a>
            <a href="{{route('gfpl')}}" class="blocks"> Grafice Piloti </a>
            <a href="{{route('gfst')}}" class="blocks"> Grafice Steward </a>
            <a href="{{route('programpiloti')}}" class="blocks"> Program Piloti </a>
            <a href="{{route('programstewarzi')}}" class="blocks"> Program Steward </a>
            <a href="{{route('programzboruri')}}" class="blocks"> Program Zboruri </a> 
        </div>
          @endif
         
        @if($nivel_acc ==='Pilot')
        <div class="grid2">
            <a href="{{route('profil')}}" class="blocks"> Profil </a>
            <a href="{{route('documents')}}" class="blocks"> Documente </a>
            <a href="{{route('orar')}}" class="blocks"> Program - Lista </a>
           <!-- // <a href="{{route('angajati')}}" class="blocks"> Grafice </a> -->
        </div>
          @endif
         
        @if($nivel_acc ==='Steward')
        <div class="grid2">
            <a href="{{route('profil')}}" class="blocks"> Profil </a>
            <a href="{{route('documents')}}" class="blocks"> Documente </a>
            <a href="{{route('orar')}}" class="blocks"> Program - Lista </a>
         <!-- //   <a href="{{route('angajati')}}" class="blocks"> Grafice </a> -->
        </div>
          @endif
          
        @if($nivel_acc ==='Serviciul suport tehnic zboruri')
        <div class="grid2">
            <a href="{{route('profil')}}" class="blocks"> Profil </a>
            <a href="{{route('documents')}}" class="blocks"> Documente </a>
            <a href="{{route('avioane')}}" class="blocks"> Avioane </a>
            <a href="{{route('gfav')}}" class="blocks"> Grafice Avioane </a>
        
        </div>
          @endif
        
        @if($nivel_acc ==='Serviciul planificari')
        <div class="grid">
            <a href="{{route('profil')}}" class="blocks"> Profil </a>
            <a href="{{route('documents')}}" class="blocks"> Documente </a>
            <a href="{{route('zboruri')}}" class="blocks"> Zboruri </a>
            <a href="{{route('programzboruri')}}" class="blocks"> Program Zboruri </a> 
            <a href="{{route('gfzb')}}" class="blocks"> Ierarhie Zboruri </a>
            <a href="{{route('programpiloti')}}" class="blocks"> Program piloti </a>
            <a href="{{route('programstewarzi')}}" class="blocks"> Program steward </a>
            <a href="{{route('gfpl')}}" class="blocks"> Grafice piloti </a>
            <a href="{{route('gfst')}}" class="blocks"> Grafice steward </a>
        </div>
          @endif
         
        @if($nivel_acc ==='Serviciul gestiune si analiza operatiuni zboruri')
        <div class="grid2">
            <a href="{{route('profil')}}" class="blocks"> Profil </a>
            <a href="{{route('documents')}}" class="blocks"> Documente </a>
            <a href="{{route('ruta')}}" class="blocks"> Rute </a>
            <a href="{{route('gfrt')}}" class="blocks"> Grafice Rute </a>
        </div>
          @endif
         
        @if($nivel_acc ==='Director piloti')
        <div class="grid2">
            <a href="{{route('profil')}}" class="blocks"> Profil </a>
            <a href="{{route('documents')}}" class="blocks"> Documente </a>
            <a href="{{route('angajati')}}" class="blocks"> Angajati </a>
            <a href="{{route('programpiloti')}}" class="blocks"> Program Piloti  </a>
            <a href="{{route('gfpl')}}" class="blocks"> Grafice Piloti </a>
        </div>
          @endif
        
        @if($nivel_acc ==='Director stewarzi')
        <div class="grid2">
            <a href="{{route('profil')}}" class="blocks"> Profil </a>
            <a href="{{route('documents')}}" class="blocks"> Documente </a>
            <a href="{{route('angajati')}}" class="blocks"> Angajati </a>
            <a href="{{route('programstewarzi')}}" class="blocks"> Program Stewarzi </a>
            <a href="{{route('gfst')}}" class="blocks"> Grafice Stewarzi</a>
        </div>
          @endif
        
        @if($nivel_acc ==='Director servicii')
        <div class="grid">
            <a href="{{route('profil')}}" class="blocks"> Profil </a>
            <a href="{{route('documents')}}" class="blocks"> Documente </a>
            <a href="{{route('angajati')}}" class="blocks"> Angajati </a>
            <a href="{{route('ruta')}}" class="blocks"> Rute </a>
            <a href="{{route('avioane')}}" class="blocks"> Avioane </a>
            <a href="{{route('zboruri')}}" class="blocks"> Zboruri </a>
            <a href="{{route('gfrt')}}" class="blocks"> Grafice Rute </a>
            <a href="{{route('gfav')}}" class="blocks"> Grafice Avion </a>  
            <a href="{{route('gfzb')}}" class="blocks"> Ierarhie Zboruri</a>
            <a href="{{route('gfpl')}}" class="blocks"> Grafice Piloti </a>
            <a href="{{route('gfst')}}" class="blocks"> Grafice Steward </a>
            <a href="{{route('programpiloti')}}" class="blocks"> Program Piloti </a>
            <a href="{{route('programstewarzi')}}" class="blocks"> Program Steward </a>
            <a href="{{route('programzboruri')}}" class="blocks"> Program Zboruri </a> 
        </div>
          @endif
     </div>
     
    <style>
      body{
        
          background-image:url('7.jpeg');
          background-size:1600px 1100px; 
   
                background-attachment: fixed;
      }
      
          .blocks{
            background:#7B68EE;
          }
            .block{
             background:#7B68EE;
          }
          
          
      .grid {
    
          margin:0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: .5rem;
            padding: .5rem;
            grid-auto-rows: minmax(100px, auto);
   
      }
             .grid2 {
  
             margin:0 auto;
             display: grid;
             
             grid-template-columns: repeat(2, 1fr);
               grid-gap: .5rem;
            padding: .5rem;
            grid-auto-rows: minmax(100px, auto);
      
            
         
            }
            

       .gridMaster{
             width:40%;
  
        margin:0 auto;
        margin-top: 30px;
 
         grid-gap: .5rem;
         padding: .7rem;
   
           /* box-shadow:0px 10px 50px 0px black;*/
            
        }


 .blocks{
     font-family: monospace;
     text-decoration: none;;
     user-select: none;
     cursor: pointer;
    margin:10px;
    transition:.2s ease-in-out;
    color:white;
    text-align: center;
    padding:50px ;
}
 .blocks:hover{
         transform:scale(1.1);
    }
    
    
    
    .block{
     font-family: monospace;
     text-decoration: none;;
     user-select: none;
     cursor: pointer;
    margin:10px;
    transition:.2s ease-in-out;
    color:white;
    text-align: center;
    padding:50px 0;
}
 .block:hover{
         transform:scale(1.1);
    }
      </style>
  </body>
  
</html>