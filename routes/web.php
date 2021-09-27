<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Controller@index')->name('home');
    
    //rute
    Route::get('/rutaadd', 'Controller@rutaForm')->name('ruta.form'); //adauga
    Route::post('/rutaadd', 'Controller@addruta')->name('rutaadd'); //adauga
    Route::get('/ruta', 'Controller@getRuta')->name('ruta'); //pag rute
    Route::post('/rutaedit/{idruta}', 'Controller@editruta')->name('rutaedit'); //edit
    Route::get('/rutaedit/{idruta}', 'Controller@editrutaForm')->name('rutaedit.form');//edit 
    Route::get('/stergeruta','Controller@deleteruta');//delete
  
    //avion
    Route::get('/avioaneadd', 'Controller@avioaneForm')->name('avioane.form'); //adauga
    Route::post('/avioaneadd', 'Controller@addavioane')->name('avioaneadd'); //adauga
    Route::get('/avioane', 'Controller@getAvioane')->name('avioane'); //pag avion
    Route::post('/avioaneedit/{idavion}', 'Controller@editavioane')->name('avioaneedit'); //edit
    Route::get('/avioaneedit/{idavion}', 'Controller@editavioaneForm')->name('avioaneedit.form');//edit 
    Route::get('/stergeavioane','Controller@deleteavioane');//delete
    
     
    
    //angajati
    Route::get('/angajatieadd', 'Controller@angajatiForm')->name('angajati.form'); //adauga
    Route::post('/angajatiadd', 'Controller@addangajati')->name('angajatiadd'); //adauga
    Route::get('/angajati', 'Controller@getAngajati')->name('angajati'); //pag angajati
    Route::post('/angajatiedit/{idangajat}', 'Controller@editangajati')->name('angajatiedit'); //edit
    Route::get('/angajatiedit/{idangajat}', 'Controller@editangajatiForm')->name('angajatiedit.form');//edit 
    Route::get('/stergeangajati','Controller@deleteangajati');//delete
   
    // program
    Route::get('/programadd', 'Controller@programForm')->name('program.form'); //adauga
    Route::post('/programadd', 'Controller@addprogram')->name('programadd'); //adauga
    Route::get('/program', 'Controller@getProgram')->name('program'); //pag echipaje
    Route::post('/programedit/{idechipaj}', 'Controller@editprogram')->name('programedit'); //edit
    Route::get('/programedit/{idechipaj}', 'Controller@editprogramForm')->name('programedit.form');//edit 
    Route::get('/stergeprogram','Controller@deleteprogram');//delete
    
   
    // zboruri
    Route::get('/zboruriadd', 'Controller@zboruriForm')->name('zboruri.form'); //adauga
    Route::post('/zboruriadd', 'Controller@addzboruri')->name('zboruriadd'); //adauga
    Route::get('/zboruri', 'Controller@getZboruri')->name('zboruri'); //pag echipaje
    Route::post('/zboruriedit/{idzbor}', 'Controller@editzboruri')->name('zboruriedit'); //edit
    Route::get('/zboruriedit/{idzbor}', 'Controller@editzboruriForm')->name('zboruriedit.form');//edit 
    Route::get('/stergezboruri','Controller@deletezboruri');//delete
    Route::get('/addechipaj','Controller@addechipaj')->name('addechipaj');
    Route::post('/addechipaj','Controller@addechipajPOST');
    Route::get('/editechipaj','Controller@editechipaj')->name('editechipaj');
    Route::post('/editechipaj','Controller@editechipajPOST');
    
    //Login 

    Route::get('/login','Controller@login')->name('login');
    Route::post('/login','Controller@loginform')->name('login.form');
    Route::post('/resetpass','Controller@resetpass')->name('resetpass');
    Route::post('/resetuser','Controller@resetuser')->name('resetuser');
    Route::get('/delogare','Controller@delogare')->name('delogare');


    //programe
    Route::get('/programpiloti','Controller@programpiloti')->name('programpiloti');
    Route::get('/programstewarzi','Controller@programstewarzi')->name('programstewarzi');
    Route::get('/programavioane','Controller@programavioane')->name('programavioane');
    Route::get('/programzboruri','Controller@programzboruri')->name('programzboruri');
    Route::post('/getInfoPiloti','Controller@getInfoPiloti');
    Route::post('/saveProgramPiloti','Controller@saveProgramPiloti');
    Route::post('/getInfoStewarzi','Controller@getInfoStewarzi');
    Route::post('/getInfoZboruri','Controller@getInfoZboruri');
    Route::post('/saveProgramStewarzi','Controller@saveProgramStewarzi');

    //profil

    Route::get('/profil','Controller@profil')->name('profil');
    Route::post('/profil','Controller@saveprofil')->name('saveprofil');

    //orar 
    Route::get('/orar','Controller@orar')->name('orar');
    
   
    //Documente
    Route::get('/documents','Controller@arataDocumente')->name('documents');
    Route::get('/downloadDoc','Controller@descarcaDocument');
    Route::post('/uploadDoc','Controller@uploadeazaDocument');
    Route::post('/changeDoc','Controller@schimbaDocument');
    Route::get('/deleteDoc','Controller@stergeDocument');

    //Grafice
    Route::get('/graficpiloti','Controller@gfpiloti')->name('gfpl');
    Route::get('/graficzboruri','Controller@gfzboruri')->name('gfzb');
    Route::get('/graficstewardzi','Controller@gfstewards')->name('gfst');
    Route::get('/graficrute','Controller@gfrute')->name('gfrt');
    Route::get('/graficavioane','Controller@gfavioane')->name('gfav');

    Route::post('/nrcheck','Controller@nrcheck');

    
   