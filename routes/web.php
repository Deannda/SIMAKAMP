<?php

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



Route::get('/', 'loginController@index')->name('login');
Route::get('/logout', 'loginController@logout')->name('logout');

// Route::get('/pesan','NotifController@index');
// Route::get('/pesan/sukses','NotifController@sukses');

// Route::get('createStorage', function(){
//     Artisan::call('storage:link');
//     return 'success';
// });

Route::get('/surat', function(){
 return view('layouts/surat');
});

Route::post('/login/checklogin', 'loginController@checklogin');


Route::group(['middleware' => 'auth'], function (){

    Route::get('/rekapsurat', 'rekapsuratController@index');
    Route::post('/rekapsurat', 'rekapsuratController@rekap');


    Route::get('/dashboard', 'AdminController@dashboard');
    Route::post('/password/edit/{id}', 'loginController@editpassword')->name('editpassword');

    // KABUPATEN
    Route::get('/kabupaten', 'masterkabupatenController@index');
    Route::post('/kabupaten/create', 'masterkabupatenController@create');
    Route::post('/kabupaten/edit/{id}', 'masterkabupatenController@edit'); //terima data f/ get
    Route::get('/kabupaten/hapus/{id}', 'masterkabupatenController@hapus'); //terima data f/ get

    Route::get('/agama', 'masteragamaController@index');
    Route::post('/agama/create', 'masteragamaController@create');
    Route::post('/agama/edit/{id}', 'masteragamaController@edit'); //terima data f/ get
    Route::get('/agama/hapus/{id}', 'masteragamaController@hapus'); //terima data f/ get

    Route::get('/kecamatan', 'masterkecamatanController@index');
    Route::post('/kecamatan/create', 'masterkecamatanController@create');
    Route::post('/kecamatan/edit/{id}', 'masterkecamatanController@edit'); //terima data f/ get
    Route::get('/kecamatan/hapus/{id}', 'masterkecamatanController@hapus');

    Route::get('/desa', 'masterdesaController@index');
    Route::post('/desa/create', 'masterdesaController@create');
    Route::post('/desa/edit/{id}', 'masterdesaController@edit'); //terima data f/ get
    Route::get('/desa/hapus/{id}', 'masterdesaController@hapus');

    Route::get('/jeniskelamin', 'masterjeniskelaminController@index');
    Route::post('/jeniskelamin/create', 'masterjeniskelaminController@create');
    Route::post('/jeniskelamin/edit/{id}', 'masterjeniskelaminController@edit');
    Route::get('/jeniskelamin/hapus/{id}', 'masterjeniskelaminController@hapus');

    Route::get('/golongandarah', 'mastergolongandarahController@index');
    Route::post('/golongandarah/create', 'mastergolongandarahController@create');
    Route::post('/golongandarah/edit/{id}', 'mastergolongandarahController@edit');
    Route::get('/golongandarah/hapus/{id}', 'mastergolongandarahController@hapus');

    Route::get('/statusperkawinan', 'masterstatusperkawinanController@index');
    Route::post('/statusperkawinan/create', 'masterstatusperkawinanController@create');
    Route::post('/statusperkawinan/edit/{id}', 'masterstatusperkawinanController@edit');
    Route::get('/statusperkawinan/hapus/{id}', 'masterstatusperkawinanController@hapus');

    Route::get('/pendidikan', 'masterpendidikanterakhirController@index');
    Route::post('/pendidikan/create', 'masterpendidikanterakhirController@create');
    Route::post('/pendidikan/edit/{id}', 'masterpendidikanterakhirController@edit');
    Route::get('/pendidikan/hapus/{id}', 'masterpendidikanterakhirController@hapus');

    Route::get('/pekerjaan', 'masterpekerjaanController@index');
    Route::post('/pekerjaan/create', 'masterpekerjaanController@create');
    Route::post('/pekerjaan/edit/{id}', 'masterpekerjaanController@edit');
    Route::get('/pekerjaan/hapus/{id}', 'masterpekerjaanController@hapus');

    Route::get('/hubungankeluarga', 'masterhubungankeluargaController@index');
    Route::post('/hubungankeluarga/create', 'masterhubungankeluargaController@create');
    Route::post('/hubungankeluarga/edit/{id}', 'masterhubungankeluargaController@edit');
    Route::get('/hubungankeluarga/hapus/{id}', 'masterhubungankeluargaController@hapus');

    Route::get('/kewarganegaraan', 'masterkewarganegaraanController@index');
    Route::post('/kewarganegaraan/create', 'masterkewarganegaraanController@create');
    Route::post('/kewarganegaraan/edit/{id}', 'masterkewarganegaraanController@edit');
    Route::get('/kewarganegaraan/hapus/{id}', 'masterkewarganegaraanController@hapus');

    Route::get('/pengguna', 'penggunaController@index');
    Route::post('/pengguna/create', 'penggunaController@create');
    Route::post('/pengguna/edit/{id}', 'penggunaController@edit');
    Route::get('/pengguna/hapus/{id}', 'penggunaController@hapus');
    Route::get('/desaPengguna/{idkab}/{idkec}','penggunaController@desa');
    Route::get('/kecamatanPengguna/{id}','penggunaController@kecamatan');

    Route::get('/jenissurat', 'jenissuratController@index');
    Route::post('/jenissurat/create', 'jenissuratController@create');
    Route::post('/jenissurat/edit/{id}', 'jenissuratController@edit');
    Route::get('/jenissurat/hapus/{id}', 'jenissuratController@hapus');

    Route::get('/nomorsurat', 'nomorsuratController@index');
    Route::post('/nomorsurat/create', 'nomorsuratController@create');
    Route::post('/nomorsurat/edit/{id}', 'nomorsuratController@edit');

    Route::get('/jabatan', 'perangkatKampungController@index');
    Route::post('/jabatan/create', 'perangkatKampungController@create');
    Route::post('/jabatan/edit/{id}', 'perangkatKampungController@edit');

    Route::get('/home', 'AdmindesaController@home');
    Route::get('/permohonan_surat', 'AdmindesaController@permohonan_surat');
    Route::get('/datapenduduk', 'AdmindesaController@datapenduduk');
    Route::post('/tampil/desa', 'AdmindesaController@tampildesa');
    Route::post('/penduduk/create', 'AdmindesaController@create');
    Route::post('/penduduk/edit/{id}', 'AdmindesaController@edit');
    Route::get('/penduduk/hapus/{id}', 'AdmindesaController@hapus'); 
    Route::post('/penduduk/import_excel', 'AdmindesaController@import_excel');

    Route::get('/sddp', 'sddpController@sddp');
    Route::get('/sddp', 'sddpController@datapenduduk');

    Route::get('/surat', 'suratController@index');

    Route::get('/edit_profile', 'AdmindesaController@dataprofil');
    Route::post('/profil/edit/{id}', 'AdmindesaController@editprofil'); 

    Route::get('/panduanprintsurat', 'panduansuratController@cetakpanduansurat');

    // Surat Kematian
    Route::get('/SuratKeteranganKematian/{id_no}','suratkematianController@index');
    Route::post('/suratkematian/{id_no}', 'suratkematianController@cetaksuratkematian');
    Route::get('/SuratPermohonanKematian/{namasurat}','suratkematianController@permohonan');
    Route::post('/cetakPermohonanKematian/{id}/{noFormat}','suratkematianController@permohonanCetak');

    Route::get('/SuratPengantarSitu/{id_no}','suratsituController@index');
    Route::post('/suratsitu/{nik}', 'suratsituController@cetaksuratsitu');
    Route::get('/SuratPermohonanSitu/{namasurat}','suratsituController@permohonan');
    Route::post('/cetakPermohonanSitu/{id}/{noFormat}','suratsituController@permohonanCetak');

    Route::get('/SuratDomisili/{id_no}','suratdomisiliController@index');
    Route::post('/suratdomisili/{nik}', 'suratdomisiliController@cetaksuratdomisili');
    Route::get('/SuratPermohonanDomisili/{namasurat}','suratdomisiliController@permohonan');
    Route::post('/cetakPermohonanDomisili/{id}/{noFormat}','suratdomisiliController@permohonanCetak');

    Route::get('/SuratBedaNama/{id_no}','suratbedanamaController@index');
    Route::post('/suratbedanama/{nik}', 'suratbedanamaController@cetaksuratbedanama');
    Route::get('/SuratPermohonanBedanama/{namasurat}','suratbedanamaController@permohonan');
    Route::post('/cetakPermohonanBedanama/{id}/{noFormat}','suratbedanamaController@permohonanCetak');

    Route::get('/SuratKeteranganJalan/{id_no}','suratjalanController@index');
    Route::post('/suratjalan/{nik}', 'suratjalanController@cetaksuratjalan');
    Route::get('/SuratPermohonanJalan/{namasurat}','suratjalanController@permohonan');
    Route::post('/cetakPermohonanJalan/{id}/{noFormat}','suratjalanController@permohonanCetak');

    Route::get('/SuratIzinKeramaian/{id_no}','suratizinkeramaianController@index');
    Route::post('/suratizinkeramaian/{nik}', 'suratizinkeramaianController@cetaksuratkeramaian');
    Route::get('/SuratPermohonanIzinKeramaian/{namasurat}','suratizinkeramaianController@permohonan');
    Route::post('/cetakPermohonanIzinKeramaian/{id}/{noFormat}','suratizinkeramaianController@permohonanCetak');

    Route::get('/SuratIMB/{id_no}','suratimbController@index');
    Route::post('/suratimb/{nik}', 'suratimbController@cetaksuratimb');
    Route::get('/SuratPermohonanIMB/{namasurat}','suratimbController@permohonan');
    Route::post('/cetakPermohonanIMB/{id}/{noFormat}','suratimbController@permohonanCetak');

    Route::get('/SuratKeteranganKTP/{id_no}','suratktpController@index');
    Route::post('/suratktp/{nik}', 'suratktpController@cetaksuratktp');
    Route::get('/SuratPermohonanKTP/{namasurat}','suratktpController@permohonan');
    Route::post('/cetakPermohonanKTP/{id}/{noFormat}','suratktpController@permohonanCetak');

    Route::get('/SuratKeteranganNonPNS/{id_no}','suratnonpnsController@index');
    Route::post('/SuratKeteranganNonPNS/{nik}', 'suratnonpnsController@cetaksuratnonpns');
    Route::get('/SuratPermohonanNonPNS/{namasurat}','suratnonpnsController@permohonan');
    Route::post('/cetakPermohonanNonPNS/{id}/{noFormat}','suratnonpnsController@permohonanCetak');

    Route::get('/SuratPengantarPindah/{id_no}','suratpindahController@index');
    Route::post('/SuratPengantarPindah/{nik}', 'suratpindahController@cetaksuratpindah');
    Route::get('/SuratPermohonanPindah/{namasurat}','suratpindahController@permohonan');
    Route::post('/cetakPermohonanPindah/{id}/{noFormat}','suratpindahController@permohonanCetak');
    Route::get('/SuratPengantarPindah/ortu/{nik}', 'suratpindahController@ortu');

    Route::get('/SuratPengantarSKCK/{id_no}','suratskckController@index');
    Route::post('/SuratPengantarSKCK/{nik}', 'suratskckController@cetaksuratskck');
    Route::get('/SuratPermohonanSKCK/{namasurat}','suratskckController@permohonan');
    Route::post('/cetakPermohonanSKCK/{id}/{noFormat}','suratskckController@permohonanCetak');

    Route::get('/SuratKeteranganTidakMampuUntukBerobat/{id_no}','suratsktmbdtController@index');
    Route::post('/SKTMBDT/{nik}', 'suratsktmbdtController@cetaksuratsktmbdt');
    Route::get('/SuratPermohonanSKTMBDT/{namasurat}','suratsktmbdtController@permohonan');
    Route::post('/cetakPermohonanSKTMBDT/{id}/{noFormat}','suratsktmbdtController@permohonanCetak');
    Route::get('/SKTMBDT/ortu/{nik}', 'suratsktmbdtController@ortu');

    Route::get('/SuratKeteranganTidakMampuUntukSekolah/{id_no}','suratsktmsekolahController@index');
    Route::post('/SKTMSekolah/{nik}', 'suratsktmsekolahController@cetaksuratsktmsekolah');
    Route::get('/SuratPermohonanSKTMSekolah/{namasurat}','suratsktmsekolahController@permohonan');
    Route::post('/cetakPermohonanSKTMSekolah/{id}/{noFormat}','suratsktmsekolahController@permohonanCetak');
    Route::get('/SKTMSekolah/ortu/{nik}', 'suratsktmsekolahController@ortu');

    Route::get('/SuratUsaha/{id_no}','suratusahaController@index');
    Route::post('/SuratUsaha/{nik}', 'suratusahaController@cetaksuratusaha');
    Route::get('/SuratPermohonanUsaha/{namasurat}','suratusahaController@permohonan');
    Route::post('/cetakPermohonanUsaha/{id}/{noFormat}','suratusahaController@permohonanCetak');

    Route::get('/SuratAhliWaris/{id_no}','suratahliwarisController@index');
    Route::post('/SuratAhliWaris/{nik}', 'suratahliwarisController@cetaksuratahliwaris');
    Route::get('/SuratPermohonanAhliWaris/{namasurat}','suratahliwarisController@permohonan');
    Route::post('/cetakPermohonanAhliwaris/{id}/{noFormat}','suratahliwarisController@permohonanCetak');

    Route::get('/SuratRekomendasiPindahNikah/{id_no}','suratpindahnikahController@index');
    Route::post('/SuratRekomendasiPindahNikah/{nik}', 'suratpindahnikahController@cetaksuratpindahnikah');
    Route::get('/SuratPermohonanPindahNikah/{namasurat}','suratpindahnikahController@permohonan');
    Route::post('/cetakPermohonanPindahNikah/{id}','suratpindahnikahController@permohonanCetak');

    Route::get('/SuratKeteranganPenghasilan/{id_no}','suratpenghasilanController@index');
    Route::post('/SuratKeteranganPenghasilan/{nik}', 'suratpenghasilanController@cetaksuratpenghasilan');
    Route::get('/SuratPermohonanPenghasilan/{namasurat}','suratpenghasilanController@permohonan');
    Route::post('/cetakPermohonanPenghasilan/{id}/{noFormat}','suratpenghasilanController@permohonanCetak');

    Route::get('/SuratKeteranganProfesi/{id_no}','suratprofesiController@index');
    Route::post('/SuratKeteranganProfesi/{nik}', 'suratprofesiController@cetaksuratprofesi');
    Route::get('/SuratPermohonanProfesi/{namasurat}','suratprofesiController@permohonan');
    Route::post('/cetakPermohonanProfesi/{id}/{noFormat}','suratprofesiController@permohonanCetak');

    Route::get('/SuratDispensasiWaktuPernikahan/{id_no}','suratdispensasinikahController@index');
    Route::post('/SuratDispensasiWaktuPernikahan/{nik}', 'suratdispensasinikahController@cetaksuratdispensasinikah');
    Route::get('/SuratPermohonanDispensasi/{namasurat}','suratdispensasinikahController@permohonan');
    Route::post('/cetakPermohonanDispensasi/{id}/{noFormat}','suratdispensasinikahController@permohonanCetak');


    Route::get('/SuratKeteranganAsetSMK/{id_no}','suratasetsmkController@index');
    Route::post('/SuratKeteranganAsetSMK/{id_no}', 'suratasetsmkController@cetaksuratasetsmk');

    Route::get('/SuratKeteranganDomisiliLSM/{id_no}','suratdomisililsmController@index');
    Route::post('/SuratKeteranganDomisiliLSM/{id_no}', 'suratdomisililsmController@cetaksuratdomisililsm');

    Route::get('/SuratMohonPenguji/{id_no}','suratpengujiController@index');
    Route::post('/SuratMohonPenguji/{id_no}', 'suratpengujiController@cetaksuratpenguji');

    Route::get('/SuratPermohonanJagaDesa/{id_no}','suratjagadesaController@index');
    Route::post('/SuratPermohonanJagaDesa/{id_no}', 'suratjagadesaController@cetaksuratjagadesa');

    Route::get('/SuratPernyataanBelumPernahMenikah/{id_no}','suratbelumnikahController@index');
    Route::post('/SuratPernyataanBelumPernahMenikah/{nik}', 'suratbelumnikahController@cetaksuratbelumnikah');
    Route::get('/SuratPernyatanBelumNikah/{namasurat}','suratbelumnikahController@permohonan');
    Route::post('/cetakPernyatanBelumNikah/{id}/{noFormat}','suratbelumnikahController@permohonanCetak');
 
    
    Route::get('/SuratTeguranI/{id_no}','suratteguraniController@index');
    Route::post('/SuratTeguranI/{id_no}', 'suratteguraniController@cetaksurattegurani');

    Route::get('/SuratKeteranganKelahiran/{id_no}','suratkelahiranController@index');
    Route::post('/SuratPernyataanKelahiran/{nik}', 'suratkelahiranController@cetaksuratkelahiran');
    Route::get('/SuratPermohonanKelahiran/{namasurat}','suratkelahiranController@permohonan');
    Route::post('/cetakPermohonanKelahiran/{id}','suratkelahiranController@permohonanCetak');

    Route::get('/SuratPengajuanKKN/{id_no}','suratkknController@index');
    Route::post('/SuratPengajuanKKN/{id_no}', 'suratkknController@cetaksuratkkn');

    Route::get('/SuratPengantarPernikahan/{id_no}','suratpengantarnikahController@index');
    Route::post('/SuratPengantarPernikahan/{nik}', 'suratpengantarnikahController@cetaksuratpengantarnikah');
    Route::get('/SuratPermohonanPengantar/{namasurat}','suratpengantarnikahController@permohonan');
    Route::post('/cetakPermohonanPengantarNikah/{id}/{noFormat}','suratpengantarnikahController@permohonanCetak');

    Route::get('/SuratIzinOrangtua/{id_no}','suratizinorangtuaController@index');
    Route::post('/SuratIzinOrangtua/{nik}', 'suratizinorangtuaController@cetaksuratizinorangtua');
    Route::get('/SuratPermohonan/{namasurat}','suratizinorangtuaController@permohonan');
    Route::post('/cetakPermohonanIzinOrangtua/{id}/{noFormat}','suratizinorangtuaController@permohonanCetak');

    Route::get( '/statistik', 'statistikController@index');
    Route::get( '/datastatistik', 'statistikController@dataStatistik');


});
