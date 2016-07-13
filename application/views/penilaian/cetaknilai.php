<div class="container">
    <div class="row">
    <form method="POST" action="insert_query.php">
        <div class="input-field col s12 l3 form-group">
            <select name="type" id="type" required="required">
                <option value="" disabled selected>Choose          <option value="1">Matematika</option>
                <option value="2">Fisika</option>
                <option>Geografi</option>
                <option>Ekonomi</option>
                <option>Kimia</option>
              </select>
          </div>
        <!--pake php kalo valuenya 1 misal ntar keluar kelasnya yang available!-->
        <div class="input-field col s12 l3 form-group">
           <select name="type1" id="type1" required="required">
            <option value="" disabled selected>Choose Subcategory</option>
           </select>
        </div>
        <div class="input-field col s12 l3 form-group">
            <button type="submit" class="waves-effect waves-light btn grey darken-1">Cek Nilai</button>
        </div>
    </form>
    <table>
        <thead>
          <tr>
              <th data-field="id">NISN</th>
              <th data-field="id">Nama Siswa</th>
              <th data-field="price">Nilai</th>
              <th data-field="id">Ubah Nilai</th>
              <th data-field="id">Hapus Nilai</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>5114100192</td>
            <td>Alvin</td>
            <td>100</td>
            <td><button class="modal-trigger" href="#ubahnilai">Ubah</button></td>
            <td><button class="modal-trigger" href="#konfirmasihapus">Hapus</button></td>
          </tr>
          <tr>
            <td>5114100111</td>
            <td>Alan</td>
            <td>100</td>
            <td><button class="modal-trigger" href="#ubahnilai">Ubah</button></td>
            <td><button class="modal-trigger" href="#konfirmasihapus">Hapus</button></td>
          </tr>
          <tr>
            <td>5114100100</td>
            <td>Jonathan</td>
            <td>100</td>
            <td><button class="modal-trigger" href="#ubahnilai">Ubah</button></td>
            <td><button class="modal-trigger" href="#konfirmasihapus">Hapus</button></td>
          </tr>
        </tbody>
      </table>
        <button class="modal-trigger" href="#inputnilai">Input Nilai</button>
    </div>
</div>
<div id="inputnilai" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="<?php echo base_url();?>penilaian/verifikasi_penilaian" method="post">
                      <div class="input-field col s12">
                         <input name="nisn" type="text" class="validate">
                         <label>NISN</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="name" type="text" class="validate">
                         <label>Nama Siswa</label>
                      </div>
                      <div class="input-field col s12">
                         <input  name="score" type="text" class="validate">
                         <label>Nilai</label>
                      </div>
                      <div class="col s12" style="margin-top: 1.25em">
                         <button type="submit" class="waves-effect waves-light btn">TAMBAH</button>
                      </div>
            </form>
         </div>
      </div>
 
    </div>
</div>
<div id="ubahnilai" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="<?php echo base_url();?>penilaian/verifikasi_penilaian" method="post">
                      <div class="input-field col s12">
                         <input name="nisn" type="text" class="validate" placeholder="e.g. Fikry Khairytamim">
                         <label>NISN</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="name" type="text" class="validate" placeholder="e.g. fikry@seveid.com">
                         <label>Nama Siswa</label>
                      </div>
                      <div class="input-field col s12">
                         <input  name="score" type="text" class="validate" placeholder="+6281703434377">
                         <label>Nilai</label>
                      </div>
                      <div class="col s12" style="margin-top: 1.25em">
                         <button type="submit" class="waves-effect waves-light btn">UBAH</button>
                      </div>
            </form>
         </div>
      </div>
 
    </div>
</div>
<div id="konfirmasihapus" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
             <p>APAKAH ANDA YAKIN INGIN MENGHAPUS DATA?</p>
         </div>
          <div class="col s6" style="padding: 1em 1em 0 1em">
             <button>IYA</button>
         </div>
          <div class="col s6" style="padding: 1em 1em 0 1em">
             <button>TIDAK</button>
         </div>
      </div>
 
    </div>
</div>

<script>
    	  $(document).ready(function(){
	    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
	    $('.modal-trigger').leanModal();
        complete: function() { alert('Closed'); } 
	  });
</script>