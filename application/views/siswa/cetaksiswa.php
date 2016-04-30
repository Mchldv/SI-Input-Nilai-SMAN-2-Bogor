<div class="container">
    <h1>SISWA SMAN 2 BOGOR</h1>
    <button class="modal-trigger" href="#inputnilai">Tambah Siswa</button>
    <table>
        <thead>
          <tr>
              <th data-field="id">NISN</th>
              <th data-field="id">Nama Siswa</th>
              <th data-field="id">Kelas</th>
              <th data-field="id">Ubah Data Siswa</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>5114100192</td>
            <td>Alvin</td>
            <td>12</td>
            <td><button class="modal-trigger" href="#ubahnilai">Ubah</button></td>
          </tr>
          <tr>
            <td>5114100111</td>
            <td>Alan</td>
            <td>12</td>
            <td><button class="modal-trigger" href="#ubahnilai">Ubah</button></td>
          </tr>
          <tr>
            <td>5114100100</td>
            <td>Jonathan</td>
            <td>12</td>
            <td><button class="modal-trigger" href="#ubahnilai">Ubah</button></td>
          </tr>
        </tbody>
      </table>
</div>
<div id="inputnilai" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="" method="post">
                      <div class="input-field col s12">
                         <input name="nisn" type="text" class="validate">
                         <label>NISN</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nama" type="text" class="validate">
                         <label>Nama Siswa</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="kelas" type="text" class="validate">
                         <label>Kelas</label>
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
            <form class="col s12" action="" method="post">
                      <div class="input-field col s12">
                         <input name="nisn" type="text" class="validate" placeholder="e.g. Fikry Khairytamim">
                         <label>NISN</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nama" type="text" class="validate" placeholder="e.g. fikry@seveid.com">
                         <label>Nama Siswa</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="kelas" type="text" class="validate">
                         <label>Kelas</label>
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