<div class="container">
    <h1>MATEMATIKA</h1>
    <button class="modal-trigger" href="#inputnilai">Input Nilai</button>
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
            <td><button class="waves-effect waves-light btn" href="<?php echo base_url();?>penilaian/hapus">Hapus</button></td>
          </tr>
          <tr>
            <td>5114100111</td>
            <td>Alan</td>
            <td>100</td>
            <td><button class="modal-trigger" href="#ubahnilai">Ubah</button></td>
            <td><button class="waves-effect waves-light btn" href="<?php echo base_url();?>penilaian/hapus">Hapus</button></td>
          </tr>
          <tr>
            <td>5114100100</td>
            <td>Jonathan</td>
            <td>100</td>
            <td><button class="modal-trigger" href="#ubahnilai">Ubah</button></td>
            <td><button class="waves-effect waves-light btn" href="<?php echo base_url();?>penilaian/hapus">Hapus</button></td>
          </tr>
        </tbody>
      </table>
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

<script>
    	  $(document).ready(function(){
	    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
	    $('.modal-trigger').leanModal();
        complete: function() { alert('Closed'); } 
	  });
</script>