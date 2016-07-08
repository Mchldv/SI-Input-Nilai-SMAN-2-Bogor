<div class="container">
    <div class="row">
    <div class="input-field col s3">
          <span>Mata Pelajaran</span>
          <select name="bank" class="browser-default">
            <option>Matematika</option>
            <option>Fisika</option>
            <option>Geografi</option>
            <option>Ekonomi</option>
            <option>Kimia</option>
          </select>
    </div>
    <div class="input-field col s3">
          <span>Kelas</span>
          <select name="bank" class="browser-default">
            <option>X-1</option>
            <option>X-2</option>
            <option>X-3</option>
            <option>X-4</option>
            <option>X-5</option>
            <option>X-6</option>
          </select>
    </div>
    <div class="input-field col s3">
        <a>lihat</a>
        </div>
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