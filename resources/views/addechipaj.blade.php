<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Echipaj nou</title>
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
   
    }<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Avion nou</title>
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
  <?php error_log("test") ?>
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

    <div class='container text-center'>
        
        <a href="{{route('home')}}" class='btn btn-lg btn-info mt-4 title'>Acasa</a>
        <!-- <div class='px-5'><a href="{{route('ruta')}}">&#9679;Rute</div> -->
       
        
     
        <form class='text-left' id="edit-form" action="/addechipaj" method='post' enctype="multipart/form-data">
        @csrf
            <div class="group">
            <div class="form-group">
                <input type="hidden" value="{{$zbor->idZbor}}" name="zbor"/>
                <label class='title'>Pilot</label>
                   <select class="pilot" name="pilot">
                   <option value="-1">
                    Selectati
                   </option>
                  <?php error_log("asdasfa") ?>
                    @foreach($angajati as $ang)
                        @if($ang->tip_angajat == "Pilot" && $ang->idAngajat )
                            <option ang="{{$ang->idAngajat}}" value="{{$ang->idAngajat}}" class="" calificari="{{$ang->calificari}}">
                                {{$ang->nume.' '.$ang->prenume}}
                            </option>
                         @endif
                    @endforeach
                </select>
            </div>
            <?php error_log("linia 78"); ?>
            <div class="form-group">
                <label class='title'>Copilot</label>
               <select class="copilot" name="copilot">  
               <option value="-1">
                    Selectati
                   </option>
                    @foreach($angajati as $ang)
                        @if($ang->tip_angajat == "Pilot" )
                            <option ang="{{$ang->idAngajat}}"  value="{{$ang->idAngajat}}" class=""  calificari="{{$ang->calificari}}">
                                {{$ang->nume.' '.$ang->prenume}}
                            </option>
                         @endif
                    @endforeach
                </select>
            </div>
            </div>
   
            <div class="group">
            <div class="form-group">
                <label class='title'>Steward1</label>
                 <select class="steward1" name="steward1">
                 <option value="-1">
                    Selectati
                   </option>
                    @foreach($angajati as $ang)
                        @if($ang->tip_angajat == "Steward" )
                            <option ang="{{$ang->idAngajat}}"  value="{{$ang->idAngajat}}"  class="" >
                                {{$ang->nume.' '.$ang->prenume}}
                            </option>
                         @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class='title'>Steward2</label>
                <select class="steward2" name="steward2">
                <option value="-1">
                    Selectati
                   </option>
                    @foreach($angajati as $ang)
                        @if($ang->tip_angajat == "Steward" )
                            <option ang="{{$ang->idAngajat}}"  value="{{$ang->idAngajat}}"  class="" >
                                {{$ang->nume.' '.$ang->prenume}}
                            </option>
                         @endif
                    @endforeach
                </select>
            </div>
            </div>
         

           <div class='d-flex justify-content-end'>
             <a href="/zboruriedit/{{$zbor->idZbor}}" class='btn btn-lg btn-success my-3 title'> Inapoi </a>
                <button type='submit' id="submit_button" class='btn btn-lg btn-success my-3 title'>Adauga Echipaj</button>
            </div>

            
        </form>
    </div>

    

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    
     <script>
      $('#submit_button').on('click',function(ev){
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
            
      })

      $('select').on('change',function(){
             var selected_option = this.options[this.options.selectedIndex];
             var id_angajat = $(selected_option).attr('ang');
            $(this).closest('.group').find('option').each(function(index,element){
                    if($(element).attr('ang') == id_angajat && element != selected_option){
                        $(element).addClass('hidden');
                    }else{
                        $(element).removeClass('hidden');
                    }
            });

            var calificare = $(selected_option).attr("calificari");
            if($(this).hasClass('pilot')){
                var selected_option_copilot = $('.copilot')[0].options[$('.copilot')[0].options.selectedIndex];
                    if($(selected_option_copilot).attr("calificari") != calificare){
                        $(selected_option_copilot).parent().addClass("wrong");
                    }else{
                        $(selected_option_copilot).parent().removeClass("wrong");
                    }
            }

            if($(this).hasClass('copilot')){
                var selected_option_pilot = $('.pilot')[0].options[$('.pilot')[0].options.selectedIndex];
                console.log(selected_option_pilot);
                console.log($(selected_option_pilot).attr("calificari"), calificare,this.attributes)
                if($(selected_option_pilot).attr("calificari") != calificare){
                        $(selected_option_pilot).parent().addClass("wrong");
                    }else{
                        $(selected_option_pilot).parent().removeClass("wrong");
                    }
            }

            if($(this).hasClass('copilot') || $(this).hasClass('pilot'))
                    $(this).removeClass('wrong');








      })
   
    </script>

    <style>
      .wrong{
        border-color:red;
        border:1px solid red;
      }
      .hidden{
          display:none;
      }
    </style>
 
  </body>

</html>
