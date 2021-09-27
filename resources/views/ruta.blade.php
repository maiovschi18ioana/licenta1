<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Rute</title>
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
  </style>
  </head> <body style='font-family: Arial; background-color: #cde8f9; font-size: 14px;'>


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

         <!-- <div class='d-flex justify-content-start'>
          <img src='images/sigla.png' class='logo'>
      </div> -->
      
      
      <div class="d-flex justify-content-between">
        <a href="{{route('home')}}" class='btn btn-lg btn-info my-4'>Acasa</a>
        <a href="{{route('ruta.form')}}" class='btn btn-lg btn-info my-4'>Adauga ruta</a>
      </div>
  
      <table class="table table-sm px-0 " id='entry-table'>
          <thead>
              <tr>
                  <th scope="col" class='px-1'>Nr. ruta</th>
                  <th scope="col">Aeroport plecare</th>
                  <th scope="col">Aeroport sosire</th>
                  <th scope='col'>Optiuni</th>
                
              </tr>
          </thead>
          <tfoot>
              <tr>
                 

                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  
            
              </tr>
          </tfoot>
          <tbody>
          @foreach($ruta as $key => $ruta)
              <tr>
                  <th scope="row">{{$ruta->idRuta}}</th>
                  <td>{{$ruta->aeroport_plecare}}</td>
                  <td>{{$ruta->aeroport_sosire}}</td>
                
                  <td>
                

                        <!--button type="submit" class="btn btn-danger">Delete</button-->
                     
                  <a href="{{route('rutaedit.form',['idruta' => $ruta->idRuta])}} "class='btn btn-md btn-info'>Editeaza</a>

                  

                  @if(Session::get("user")->tip_angajat == "Administrator"||Session::get("user")->tip_angajat == "Director servicii" )    
                  <a href="/stergeruta?id={{$ruta->idRuta}}"class='btn btn-danger'>Delete</a>
                  @endif
                  </td>
                  
                  
               </tr>
           @endforeach
          </tbody>
          
      </table>
    </div> 

    <script>
      var scs_edit = <?php echo $edit_scs ?>;
      var scs_add = <?php echo $add_scs ?>;
      if(scs_edit){
        alert("Editare efectuata cu succes");
        window.location.href = "/ruta";
      }
      if(scs_add){
        alert("Adaugare efectuata cu succes");
        window.location.href = "/ruta";
      }
     
    </script>
  
 
  <script>
        $(document).ready(function() {
           /* $('#mytable thead tr').clone(true).appendTo( '#mytable thead' );
            $('#mytable thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder=" Search '+title+'" />' );

                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                });
            });*/

            var table = $('#entry-table').DataTable( {
                orderCellsTop: true,
                fixedHeader: true
            });
        });
    </script>

  </body>
</html>