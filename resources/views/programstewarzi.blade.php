<head>
  <meta charset="UTF-8">
  <title>Program stewarzi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
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
      <div class="stewards-list">
     
    </div>
    @if(Session::get('user')->tip_angajat !== 'Director stewarzi')
      <div class="row">
        <button class="add-row">Adauga</button>
      </div>
      @endif
     <div class="new-rows">
 
    </div>

      <div class="row">
        <button class="cancel" onclick="ascundeModal()">Cancel</button>
        @if(Session::get('user')->tip_angajat !== 'Director stewarzi')
        <button class="save">Salveaza</button>
        @endif
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

  <!-- pentru zboruri -->
  <div class="hidden modal-row-blueprint">
    <div class="row">
      <input class="firstname" value="">
      <input class="lastname" value="">
      <select class="activity" {{Session::get('user')->tip_angajat == 'Director stewarzi' ?"disabled":""}}>
        <option value="0">
          ZBOR
        </option>
        <option value="1">
          DUTY
        </option>

        <option value="2">
          FREE
        </option>
      </select>

      <input type="text" class="flight" readonly style="width:120px;" value="">
    </div>
  </div>

  <div class="hidden modal-add-blueprint">
  <div class="row">
        <select class="stewards">
       
        </select>
        <input type="text" readonly value="DUTY">
      </div>
</div>
  <style>
    .container-calendar {
      margin-top: 10vh;
      width: 90%;
      max-width: none !important;

    }

    .container-calendar table {
      height: 60vh;
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
    $('#previous,#next').on('click',function(ev){
      $('#calendar-body > tr > td').on('click',CalendarClickListener);
    })
   
    $('#calendar-body > tr > td').on('click',CalendarClickListener);
    function CalendarClickListener(ev) {
      var zi = $(this).attr('data-date');
      var luna = $(this).attr('data-month');
      var an = $(this).attr('data-year');
    //  arataModal([["test","test2",1,"ASD-400"]]);
      $.ajax({
        url: '/getInfoStewarzi',
        type: 'POST',
        data: { zi: zi, luna: luna, an: an, _token:$('input[name="_token"]').val() },
        success: function (data) {
          if (data.scs) {

            $('.modal-add-blueprint select')[0].innerHTML = ` <option value="-1">
                    Selectati
                   </option>`;
            data.avstewarzi.forEach(steward =>{
               var option = document.createElement('option');
               option.value = steward[0]
               option.innerText = steward[1];
               $('.modal-add-blueprint select')[0].appendChild(option);
            })

            arataModal(data.rezultate,an+"-"+luna+"-"+zi);
          }
        },
        error: function (err) {

        }
      })
    }
    function ascundeModal() {
      $('.stewards-list')[0].innerHTML = "";
      $('.new-rows')[0].innerHTML = "";
      $('.modal').attr("data","");
      $('.modal-wrapper').addClass('hidden');
    }

    function onNewRowModalSelect(ev){
      console.log("change triggered ",ev);
        var id = ev.target.value;
        $(ev.target).closest('.new-rows').find('option').each(function(index,element){
           
            if(element != ev.target && element.value == id){
               $(element).addClass('hidden');
               console.log("hd ",element);
            }else{
               $(element).removeClass('hidden');

            }
          
        })
    }

    function onNewRowModalSelect_fake(ev){
      console.log("change triggered ",ev);
        var id = ev.target.value;
        $(ev.target).closest('.new-rows').find('option[value="'+id+'"]').each(function(index,element){
           
            if(element != ev.target && element.value == id){
               $(element).addClass('hidden');
               console.log("hd ",element);
            }else{
               $(element).removeClass('hidden');

            }
          
        })
    }

    $('.add-row').on('click',function(ev){
       var copy = $('.modal-add-blueprint .row').clone();
       copy.find('select').on('change',onNewRowModalSelect);
       
       window.debug = copy;
       $('.new-rows')[0].appendChild(copy[0]);

       $('.new-rows select').each(function(index,element){ 
         console.log("triggering fake ev >>"); 
         onNewRowModalSelect_fake({target:element}) 
         
       });
    });

    $('.save').on('click',function(ev){
      var payload = {_token:$('input[name="_token"]').val() };

      var stewarzi = []
      var stewarzi_old = $('.modal .stewards-list .row').toArray();
      stewarzi_old.forEach(steward=>{
         if($(steward).find('.activity').val() == '0')
              return;
         else{
           temp = {};
           
           temp.idAngajat = $(steward).attr("aid");
           temp.tip_activitate = $(steward).find('.activity').val();
           stewarzi.push(temp);
         }
      })
    

      payload["stewarzi"]=stewarzi;
      console.log(payload);
      var stewarzi_new = []
      var stewarzi_ = $('.modal .new-rows .row').toArray();
      stewarzi_.forEach(steward=>{
         if($(steward).find('.stewards').val() == '-1')
              return;
         else{
           temp = {};
           temp.idAngajat = $(steward).find('.stewards').val();
           stewarzi_new.push(temp);
         }
      })

      payload['stewarzi_new']=stewarzi_new;
      console.log(payload);
      payload['timestamp']= $('.modal').attr("data");
      $.ajax({
        url:'/saveProgramStewarzi',
        type:"POST",
        data:payload,
        success:function(data){
          
            ascundeModal();
          
        }

      })
   


    /* var rows =  $('.modal .row').filter(function(element){ return $(element).find('input').length>0 }).toArray();

      rows.forEach(row=>{
          if($(row).find('.activity').val()==0)
              return
          else{
            var id = $(row).attr("aid");
            if(id == undefined){

            }
          }
          */
      })

    

    function onActivityChange(ev){
        var selected = $(this).val();
        if(selected > 0){
           var old_val = $(this).closest('.row').find('.flight').val();
           $(this).closest('.row').find('.flight').attr('old_val',old_val);
           $(this).closest('.row').find('.flight').val("");
        }else{
          var old_val = $(this).closest('.row').find('.flight').attr("old_val");
          $(this).closest('.row').find('.flight').val(old_val);
        }
    }

    function arataModal(date,timestamp) {
      date.forEach(function (line) {
         var empty_row = $('.modal-row-blueprint .row').clone();
         empty_row.attr("aid",line[4]); //indicele asta trebuie corectat pentru avioane
         empty_row.find(".firstname").val(line[0]);
         //pt avioane stergi de aici in jos
         empty_row.find(".lastname").val(line[1]);
         empty_row.find(".activity").val(line[2]);
         if(line[2] == 0){
           empty_row.find(".flight").val(line[3]);
         }else{
           empty_row.find('option[value="0"]').remove();
         }
         //pana aici
         $('.stewards-list')[0].appendChild(empty_row[0]);
         empty_row.find('.activity').on('change',onActivityChange)
      })


      $('.modal-wrapper').removeClass("hidden")
      $('.modal').css('display', 'block');
      $('.modal').attr("data",timestamp);


    }


  </script>

  <style>
    .modal-wrapper {
      z-index: 99;
    }

    .hidden {
      display: none;
    }

    .modal-wrapper {
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      position: fixed;

      background: rgba(0, 0, 0, 0.5);
    }

    .modal {
      background: white;
    margin: 0 auto;
    margin-top: 10vh;
    height: auto;
    width: 700px;
    padding: 30px;
    position: relative;
    max-height: 700px;
    overflow-y: auto;
    }

    .blocks {
      background: #7B68EE;
    }

    .block {
      background: #7B68EE;
    }


    .grid {

      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      grid-gap: .5rem;
      padding: .5rem;
      grid-auto-rows: minmax(100px, auto);

    }

    .grid2 {

      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      grid-gap: .5rem;
      padding: .5rem;
      grid-auto-rows: minmax(100px, auto);



    }

    .gridMaster {
      width: 40%;

      margin-left: 450px;
      margin-top: 120px;

      grid-gap: .5rem;
      padding: .7rem;

      /* box-shadow:0px 10px 50px 0px black;*/

    }


    .blocks {
      font-family: monospace;
      text-decoration: none;
      ;
      user-select: none;
      cursor: pointer;
      margin: 10px;
      transition: .2s ease-in-out;
      color: white;
      text-align: center;
      padding: 50px;
    }

    .blocks:hover {
      transform: scale(1.1);
    }



    .block {
      font-family: monospace;
      text-decoration: none;
      
      user-select: none;
      cursor: pointer;
      margin: 10px;
      transition: .2s ease-in-out;
      color: white;
      text-align: center;
      padding: 50px 0;
    }

    .block:hover {
      transform: scale(1.1);
    }

    .row {
      padding: 5px 0px;

    }

    .row>* {
      margin: 0 5px;
    }
  </style>
@csrf
</body>

</html>