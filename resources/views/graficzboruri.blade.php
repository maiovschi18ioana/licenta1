<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Avioane</title>
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


<div class='d-flex flex-row'>
        <div class='px-5'>  <a href="{{route('home')}}" class='btn btn-lg btn-info my-4'>Acasa</a>
    </div>
      </div>

     
      <table class="table table-sm px-0 " id='entry-table'>
          <thead>
              <tr>
                
                  <th scope="col">Nr Zbor</th>
                  
                  <th scope="col">Ruta</th>
                  <th scope="col">Durata zbor (minute)</th>
   
                  
              </tr>
          </thead>
       
          <tbody>
          @foreach($results as $result)
            <tr>
                <td> {{$result->nrZbor}} </td>
                <td> {{$result->aeroport_plecare.' - '.$result->aeroport_sosire}}</td>
                <td> {{explode('.',$result->durata)[0]}} </td>
            </tr>

          @endforeach
        
          </tbody>
          
      </table>
    </div> 


    <script>

var table = $('#entry-table').DataTable( {
                orderCellsTop: true,
                fixedHeader: true,
                order:false
            });
        
            </script>


</body>

</html>