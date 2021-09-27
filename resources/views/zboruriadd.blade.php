<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Zbor nou</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script> 

    <style>
    html {
      font-size: 12px;
   
    }
    .title {
      font-size: 14px;
    }
    </style>
  </head>
  <body style='font-family: Arial; background-color: #cde8f9; font-size: 14px;'>


<div class="header" style="padding:10px; border-bottom:1px solid black;">
  <div class="clockk" style="position:absolute;top:10px;left:10px;">

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
        $('.clockk').html(time.toLocaleString());
  window.onload = function(){
   
    setInterval(function(){
      var time = new Date();
        $('.clockk').html(time.toLocaleString());
    },1000);
  }
</script>

   
    <div class='container text-center'>
        
        <a href="{{route('home')}}" class='btn btn-lg btn-info mt-4 title'>Acasa</a>
 
       
     
        <form class='text-left' id="edit-form" action="{{route('zboruriadd')}}" method='post' enctype="multipart/form-data">
        @csrf
    <div class="tur">
            <div class="group">
            <div class="form-group">
                <label class='title'>Ruta</label>
                   <select class="ruta" name="ruta">
                   <option  selected  value="-1">
                       Selectati
                    </option>
                    @foreach($rute as $ruta)
                       
                            <option  value="{{$ruta->idRuta}}" class="">
                            {{$ruta->aeroport_plecare.' '.$ruta->aeroport_sosire}}
                            </option>
                         
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class='title'>Avion</label>
               <select class="avion" name="avion">  
                    <option  selected  value="-1">
                       Selectati
                    </option>
                    @foreach($avioane as $avion)
                       
                            <option ang="{{$avion->idAvion}}" value="{{$avion->idAvion}}" class="" calificare = "{{$avion->model}}">
                            {{$avion->nume.' '.$avion->model}}
                            </option>
                         
                    @endforeach
                </select>
            </div>
            </div>
           
            <div class="form-group">
                <label class='title'>Numar zbor</label>
                <input type="text"  class="form-control nume nrzb" name='nrZbor' >
            </div>
               

            <div class="group">
            <div class="form-group">
                <label class='title'>Informatii plecare*</label>
                <input type="date" id="data_plecare" class="form-control" name='data_plecare' >
             
             
            </div>

            <div class="form-group">
                <label class='title'>Informatii plecare*</label>
                <input type="text" id="ora_plecare" name="ora_plecare" class=" form-control hidden">
                <input type="text" class="clock">
             
            </div>

          
            </div>
      
            <div class="form-group">
                <label class='title'>Informatii sosire*</label>
                <input type="date" id="data_sosire" class="form-control" name='data_sosire' >
              
            </div>

            <div class="form-group">
                <label class='title'>Informatii sosire*</label>
                <input type="text" id="ora_sosire" name='ora_sosire' class="form-control hidden" >
                <input type="text" class="clock">
            </div>

            <div class="form-group">
                <label class='title'>Observatii</label>
                <input type="text"  class="form-control nume obs"  name='Observatii' >
            </div>

            <div class="form-group">
                <label class="title"> Retur? </label>
                <input type="checkbox" class="retur-check" />
           </div>
</div>
      <div class="retur hidden">   
          
           <div class="form-group">
                <label class='title'>Informatii plecare retur</label>
                <input type="date" id="data_plecare" class="form-control" name='data_plecare2' >
            </div>

            <div class="form-group">
                <label class='title'>Informatii plecare retur</label>
                <input type="text" id="ora_plecare" name="ora_plecare2" class=" form-control hidden">
                <input type="text" class="clock">
            </div>

          

      
            <div class="form-group">
                <label class='title'>Informatii sosire retur</label>
                <input type="date" id="data_sosire" class="form-control" name='data_sosire2' >
              
            </div>

            <div class="form-group">
                <label class='title'>Informatii sosire retur</label>
                <input type="text" id="ora_sosire2" name='ora_sosire2' class="form-control hidden" >
                <input type="text" class="clock">
            </div>
</div>

                <div class='d-flex justify-content-end'>
                <button type='submit' id="submit_button" class='btn btn-lg btn-success my-3 title'>Adauga zbor</button>
            </div>

            
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="/jquery-clock-timepicker.min.js"></script>
    
      <script>
      $('#submit_button').on('click',function(ev){
            ev.preventDefault();
            $('.clock').toArray().forEach(clock=>{
              var value = $(clock).val();
              $(clock).closest('.form-group').find('.form-control').val(value);
            })

          

            var selecturi = $('.tur select,.tur input').toArray();
            var ok = true;
            selecturi.forEach(em=>{
                ok = (em.value != -1) && ok;
                if((!$(em).val()||em.value == -1) && !$(em).hasClass('obs') && !$(em).hasClass('retur-check') ){
                  $(em).addClass('wrong');
                }else{
                  $(em).removeClass('wrong');
                }
            })

            if($('.retur-check').is(':checked')){
              var selecturi = $('.retur input').toArray();
            
              selecturi.forEach(em=>{
                  ok = (em.value != -1) && ok;
                  if(!$(em).val()||em.value == -1 ){
                    $(em).addClass('wrong');
                  }else{
                    $(em).removeClass('wrong');
                  }
              })
            }else{
              var selecturi = $('.retur input').toArray();
            
              selecturi.forEach(em=>{    $(em).removeClass('wrong'); });

            }

            if($('.wrong').length == 0){
              var form = document.getElementById('edit-form');
              form.submit();
            } else{
                alert("Nu toate campurile sunt ok!");
            }
      })

 

      $(document).ready(function(ev){
            $('.clock').clockTimePicker();
      })
      $('.retur-check').on('click',function(){
          $('.retur').toggleClass('hidden');
      });
   
   $('.nrzb').on('change',function(ev){
        $.ajax({
          url:'/nrcheck',
          type:'post',
          data:{attempt:$(ev.target).val()},
          success:function(data){
              if(!data.scs){
                  $(ev.target).addClass("wrong");
              }else{
                $(ev.target).removeClass("wrong");
              }
          },error:function(err){

          }
        })
   })

    
   
    </script> 

    <style>
      input{
        outline:none;
        
      }
      input:focus {outline:0;}
      .wrong{
        border-color:red;
        border:1px solid red;
      }
      .hidden{
          display:none;
      }
</style>
      <script>
     /* $('#submit_button').on('click',function(ev){
            ev.preventDefault();

            var selecturi = $('select').toArray();
            var ok = true;
            selecturi.forEach(select=>{
                ok = ok && (select.value != -1);
            })
       
            if($('.wrong').length == 0 && ok){
              var form = document.getElementById('edit-form');
              form.submit();
            } else{
                alert("Nu toate campurile sunt ok!");
            }
            
      })*/
    </script>
 
  </body>
</html>