<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Documente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script></div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
    <style>

    html {
      font-size: 12px;
   
    }
    .title {
      font-size: 14px;
    }
    .hideContent {
      overflow: hidden;
      line-height: auto;
      height: auto;
    }

    .showContent {
      line-height: auto;
      height: auto;
    }

    td,th {
      min-width: 3em; /* the normal 'fixed' width */
      width: 10em; /* the normal 'fixed' width */
      max-width: 7em; /* the normal 'fixed' width, to stop the cells expanding */
    }



    .break {
    word-wrap: break-word !important;
    display: inline-block !important;
    max-width: 11em !important;
    padding-right: 3px;
  }

  .search-input {
      width: 100px !important;
    }
    tfoot {
    display: table-header-group;
    }
    body {
    background-color: #cde8f9;
  }
  .logo {
    width: 250px;
  }
  .center {
   
    margin-left:auto; 
    margin-right:auto;
   
  }
  .centru {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
  </style>
  
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


<div class="d-flex justify-content-between">
        <a href="{{route('home')}}" class='btn btn-lg btn-info my-4'>Acasa</a>
        <a style="cursor:pointer;color:white;" class='btn btn-lg btn-info my-4 add'>Adauga</a>
      </div>
      <div class="section upload" style="display:none; text-align:center;margin-top:50px;">
  <form method="POST" action="/uploadDoc" enctype="multipart/form-data">
   <input type="file"  name="doc">
   <input type="text" name="nume">
   @csrf
   <input type="submit" value="Uploadeaza" class="start-upload"/>
   </form>
</div>

<div class="hidden">
    <form method="POST" id="exc" action="/changeDoc" enctype="multipart/form-data">
        <input type="file" name="doc">
        <input type="number" name="idDoc">
        @csrf
    </form>
</div>

<table class="table table-sm px-0 " id='entry-table'>
       <thead>
            <tr>
              @if(count($documente)>0 && property_exists($documente[0],'nume_ang') && property_exists($documente[0],'prenume_ang'))
                <th>Nume</th>
                <th>Prenume</th>
              @endif
                <th>Tip Document</th>
                <th>Optiuni</th>
            </tr>
            </thead>
            

            @foreach($documente as $doc)
            <tr ref="{{$doc->idDocument}}">
                @if(property_exists($doc,'nume_ang') && property_exists($doc,'prenume_ang'))
                    <td>
                        {{$doc->nume_ang}}
                    </td>
                    <td>
                    {{$doc->prenume_ang}}
                    </td>
                    
                @endif
                <td>
                {{$doc->nume}}
                </td>
                <td>
                <a href="/downloadDoc?idDoc={{$doc->idDocument}}" target="_blank">Descarca</a> | <a class="schimba">Schimba</a> <a class="confirma hidden"> Confirma </a> <a class="hidden anuleaza-sc">Anuleaza</a> | <a href="/deleteDoc?idDoc={{$doc->idDocument}}">Sterge</a>
                </td>
            </tr>
            @endforeach
            
        </table>
  </div>

  



   
  
  <script>
  $('.add').on('click',function(){
      if(!$(this).hasClass('cancel')){
        $('.upload').fadeIn(500);
        $(this).html("Anuleaza Upload");
        $(this).addClass('cancel');
      }else{
        $('.upload').fadeOut(500);
        $(this).removeClass('cancel');
        $(this).html("Adauga");
      }

  })
  $('.schimba').on('click',function(){
      $('#exc input').click();
      $('#exc input').attr("ref",$(this).closest('tr').attr("ref"));
      $('#exc input')[1].value = $(this).closest('tr').attr("ref");
      $(this).addClass('hidden');
  })

  $('#exc input').on('change',function(){
      window.onchange_fired = true;
      if(this.files.length > 0){
          var attr = $(this).attr('ref');
        $('tr[ref="'+attr+'"]').find('.anuleaza-sc').removeClass('hidden');
        $('tr[ref="'+attr+'"]').find('.confirma').removeClass('hidden');
        $('tr[ref="'+attr+'"]').find('.schimba').addClass('hidden');
      }else{
        $('tr[ref="'+attr+'"]').find('.schimba').removeClass('hidden');
        $('tr[ref="'+attr+'"]').find('.anuleaza-sc').addClass('hidden');
        $('tr[ref="'+attr+'"]').find('.confirma').addClass('hidden');
      }
  })

  $('.confirma').on('click',function(){
    $('#exc')[0].submit();
  });

  $('.anuleaza-sc').on('click',function(){
    $('#exec input').val("");
    $(this).addClass('hidden');
    $(this).closest('tr').find('.schimba').removeClass('hidden');
    $(this).closest('tr').find('.confirma').addClass('hidden');
  })

document.body.onfocus = function(){ 
    setTimeout(function(){
        if(!window.onchange_fired){
            $('#exec input').val("");
            $('.anuleaza-sc').addClass('hidden');
            $('.schimba').removeClass('hidden');
            $('.confirma').addClass('hidden'); 
        }
    },500);   
 }
 



  

 
        $(document).ready(function() {
         

            var table = $('#entry-table').DataTable( {
                orderCellsTop: true,
                fixedHeader: true
            });
        });
    </script>
  <style>
  .hidden{
      display:none;
  }
  td a{
      cursor:pointer;
  }
  </style>

  </body>
</html>