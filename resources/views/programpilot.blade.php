<head>
    <meta charset="UTF-8">
    <title>Program pilot</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script></div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
    <link rel="stylesheet" href="/calendar.css" />
    <script src="/calendar.js"></script>
    <style>
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
  
      </div>
  
      <div class="modal-wrapper hidden">
        <div class="modal ">
            <div class="row">
            </div>
            <div class="row">
               <input class="" value="Radoi">
               <input class="" value="Manuel">
               <select>
               <option selected>
                ZBOR
               </option>
                 <option >
                   DUTY
                 </option>

                 <option >
                   FREE
                 </option>
               </select>
               
             <input type="text" readonly style="width:120px;" value="EAP-300">
            </div>

            <div class="row">
              <button class="" onclick="ascundeModal()">Adauga</button>
            </div>

            <div class="row">
              <select>
                <option> Pilot1 </option>
                <option> Pilot2 </option>
                <option> Pilot3 </option>
              </select>
              <input type="text" readonly value="DUTY">
            </div>
            <div class="row">
              <select>
                <option> Pilot1 </option>
                <option> Pilot2 </option>
                <option> Pilot3 </option>
              </select>
              <input type="text" readonly value="DUTY">
            </div>
            <div class="row">
                <button class="cancel" onclick="ascundeModal()">Cancel</button>
                <button class="cancel" onclick="ascundeModal()">Salveaza</button>
            </div>
        </div>
    </div>
    


   
<div class="container-calendar">

  <h3 id="monthAndYear"></h3>

  <div class="button-container-calendar">
    <button id="previous" onclick="previous()">&#8249;</button>
    <button id="next" onclick="next()">&#8250;</button>
  </div>

  <table class="table-calendar" id="calendar" data-lang="en">
    <thead id="thead-month"></thead>
    <tbody id="calendar-body">
    
    
    </tbody>
  </table>

  <div class="footer-container-calendar">
    <label for="month">Jump To: </label>
    <select id="month" onchange="jump()">
      <option value=0>Ianuarie</option>
      <option value=1>Februarie</option>
      <option value=2>Martie</option>
      <option value=3>Aprilie</option>
      <option value=4>Mai</option>
      <option value=5>Iunie</option>
      <option value=6>Iulie</option>
      <option value=7>August</option>
      <option value=8>Septembrie</option>
      <option value=9>Octombrie</option>
      <option value=10>Noiembrie</option>
      <option value=11>Decembrie</option>
    </select>
    <select id="year" onchange="jump()"></select>
  </div>
  
</div>
<style>
  .container-calendar{
    margin-top:10vh;
    width:90%;
    max-width:none!important;

  }
  .container-calendar table{
    height:60vh;
  }
</style>
<script>

var today = new Date();
var currentMonth = today.getMonth();
var currentYear = today.getFullYear();
var selectYear = document.getElementById("year");
var selectMonth = document.getElementById("month");


var createYear = generate_year_range(1970, 2050);
/** or
* createYear = generate_year_range( 1970, currentYear );
*/

document.getElementById("year").innerHTML = createYear;

var calendar = document.getElementById("calendar");
var lang = calendar.getAttribute('data-lang');

var months = ["Ianuarie", "Februarie", "Martie", "Aprilie", "Mai", "Iunie", "Iulie", "August", "Septembrie", "Octombrie", "Noiembrie", "Decembrie"];
var days = ["Duminica", "Luni", "Marti", "Miercuri", "Joi", "Vineri", "Sambata"];


var dayHeader = "<tr>";
for (day in days) {
  dayHeader += "<th data-days='" + days[day] + "'>" + days[day] + "</th>";
}
dayHeader += "</tr>";

document.getElementById("thead-month").innerHTML = dayHeader;


monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);

$('#calendar-body > tr > td').on('click',function(ev){
   var zi = $(this).attr('data-date');
   var luna = $(this).attr('data-month');
   var an = $(this).attr('data-year');
  arataModal();
   $.ajax({
     url:'/getInfoAvioane',
     type:'POST',
     data:{zi:zi,luna:luna,an:an},
     success:function(data){
       if(data.scs){
        arataModal(data.rezultate);
       }
     },
     error:function(err){

     }
   })
})

function ascundeModal(){
                        $('.modal-wrapper').addClass('hidden');
}
                    
                    function arataModal(date){
                     
                       $('.modal-wrapper').removeClass("hidden")
                       $('.modal').css('display','block');
                    }
                    

</script>

<style>
   
        .modal-wrapper{
          z-index:99;
        }
        .hidden{display:none;}
        .modal-wrapper{
            top:0;
            left:0;
            width:100%;
            height:100%;
            position:fixed;

            background: rgba(0,0,0,0.5);
        }
        .modal{
            background:white;
            margin:0 auto;
            margin-top:15%;
            height:300px;
            width:300px;
            padding:30px;
            position:relative;
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
            grid-template-columns: repeat(7, 1fr);
            grid-gap: .5rem;
            padding: .5rem;
            grid-auto-rows: minmax(100px, auto);
   
      }
             .grid2 {
  
          margin:0 auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
           grid-gap: .5rem;
            padding: .5rem;
            grid-auto-rows: minmax(100px, auto);
      
            
         
            }

       .gridMaster{
             width:40%;
  
    margin-left: 450px;
        margin-top: 120px;
 
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
