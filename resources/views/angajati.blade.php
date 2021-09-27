<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Angajati</title>
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

         <!-- <div class='d-flex justify-content-start'>
          <img src='images/sigla.png' class='logo'>
      </div> -->
   

      <div class="d-flex justify-content-between">
        <a href="{{route('home')}}" class='btn btn-lg btn-info my-4'>Acasa</a>
                @if(Session::get("user")->tip_angajat == "Administrator")  
        <a href="{{route('angajati.form')}}" class='btn btn-lg btn-info my-4'>Adauga angajat</a>
        @endif
      </div>
  
      <table class="table table-sm px-0 " id='entry-table'>
          <thead>
              <tr>
              <th scope="col">Nr. angajat</th>
                  <th scope="col">Nume</th>
                  <th scope="col">Prenume</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">CNP</th>
                  <th scope="col">Data angajarii</th>
                  <th scope="col">Salariu </th>
                  <th scope="col">Tip angajat</th>
                  <th scope="col">Calificare </th>
                  <th scope='col'>Optiuni</th>
                  
              </tr>
          </thead>
          <tfoot>
              <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  
            
              </tr>
          </tfoot>
          <tbody>
          @foreach($angajati as $key => $angajati)
              <tr>
              <td>{{$angajati-> idAngajat}}</td>
                  <td>{{$angajati-> nume}}</td>
                  <td>{{$angajati-> prenume}}</td>
                  <td>{{$angajati-> email}}</td>
                  <td>{{$angajati-> cnp}}</td>
                  <td>{{$angajati-> data_angajare}}</td>
                  <td>{{$angajati-> salariu}}</td>
                  <td>{{$angajati-> tip_angajat}}</td>
                  <td>{{$angajati-> calificari}}</td>

                  <td>
                

                       
               
                  <a href="/angajatiedit/{{$angajati->idAngajat}} "class='btn btn-md btn-info'>Editeaza</a>

                  

                @if(Session::get("user")->tip_angajat == "Administrator")                 
                  <a href="/stergeangajati?id={{$angajati->idAngajat}}"class='btn btn-danger'>Delete</a>
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
        alert("Editare efectuata cu succes.");
        window.location.href = "/angajati";
      }
      if(scs_add){
        alert("Adaugare efectuata cu succes.");
        window.location.href = "/angajati";
      }
     
      
     
    </script>
  
  <script>
        $(document).ready(function() {
         

            var table = $('#entry-table').DataTable( {
                orderCellsTop: true,
                fixedHeader: true
            });
        });
    </script>
  

  </body>
</html>