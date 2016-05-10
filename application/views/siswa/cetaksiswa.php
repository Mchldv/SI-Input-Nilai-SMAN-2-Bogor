<div class="container">
    <h1>SISWA SMAN 2 BOGOR</h1>
    <button class="modal-trigger" href="#inputsiswa">Tambah Siswa</button>
    <table>
        <thead>
          <tr>
              <th data-field="id">NISN</th>
              <th data-field="id">NIS</th>
              <th data-field="id">Nama Siswa</th>
              <th data-field="id">Ubah Data Siswa</th>
          </tr>
        </thead>

        <tbody>
            <td>5114100192</td>
            <td>39120319731</td>
            <td>Alvin</td>
            <td>12</td>
            <td><button class="modal-trigger" href="#ubahsiswa">Ubah</button></td>
          <tr>
            <td>5114100111</td>
            <td>39120319731</td>
            <td>Alan</td>
            <td>12</td>
            <td><button class="modal-trigger" href="#ubahsiswa">Ubah</button></td>
          </tr>
          <tr>
            <td>5114100100</td>
            <td>39120319731</td>
            <td>Jonathan</td>
            <td>12</td>
            <td><button class="modal-trigger" href="#ubahnilai">Ubah</button></td>
          </tr>
        </tbody>
      </table>
</div>
<div id="inputsiswa" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="" method="post">
                      <div class="input-field col s12">
                         <input name="nisn" type="text" class="validate">
                         <label>NISN</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nis" type="text" class="validate">
                         <label>NIS</label>
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
<div id="ubahsiswa" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="" method="post">
                      <div class="input-field col s12">
                         <input name="nisn" type="text" class="validate" value="5114100192">
                         <label>NISN</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nis" type="text" class="validate" value="39120319731">
                         <label>NIS</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nama" type="text" class="validate" value="Alvin">
                         <label>Nama Siswa</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="kelas" type="text" class="validate" value="12">
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