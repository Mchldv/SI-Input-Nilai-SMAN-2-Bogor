<!--p>12 ipa sekian sama ada list nama setelah di klik kelasnya dan juga ada tahun kelas ajaran</p-->
<div class="container">
    <h1>Daftar Kelas</h1>
    <button class="modal-trigger" href="#tambahkelas">Tambah Kelas</button>
    <table>
        <thead>
          <tr>
            <th data-field="id">Tingkat</th>
            <th data-field="id">Jurusan</th>
            <th data-field="id">Nomor Kelas</th>
            <th data-field="id">Tahun Ajaran</th>
            <th data-field="id">Wali Kelas</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($kelas as $row) { ?>
          <tr>
            <td><?php echo $row->tingkat; ?></td>
            <td><?php echo $row->jurusan; ?></td>
            <td><?php echo $row->nomor_kelas; ?></td>
            <td><?php echo $row->tahun_ajar; ?></td>
            <td><?php echo $row->wali_kelas; ?></td>
            <td><button class="modal-trigger" href="#loginmodal">Detil</button></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
</div>

<div id="tambahkelas" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="" method="post">
                      <div class="input-field col s12">
                         <input name="nik_wali" type="text" class="validate">
                         <label>NIK Wali</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nisn" type="text" class="validate">
                         <label>NISN</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nama" type="text" class="validate">
                         <label>Nama Siswa</label>
                      </div>
                      <div class="input-field col s2">
                          <span>Tingkat</span>
                          <select name="bank" class="browser-default">
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                          </select>
                      </div>
                      <div class="input-field col s3">
                          <span>Jurusan</span>
                          <select name="bank" class="browser-default">
                            <option>IPA</option>
                            <option>IPS</option>
                          </select>
                      </div>
                      <div class="input-field col s2">
                          <span>Nomor Kelas</span>
                          <select name="bank" class="browser-default">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                          </select>
                      </div>
                      <div class="input-field col s12">
                         <input name="tahun" type="text" class="validate">
                         <label>Tahun Ajar</label>
                      </div>
                      <div class="col s12" style="margin-top: 1.25em">
                         <button type="submit" class="waves-effect waves-light btn">TAMBAH</button>
                      </div>
            </form>
         </div>
      </div>
 
    </div>
</div>

<div id="loginmodal" class="modal">
    <div class="modal-content">
      <div class="row">
        <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="" method="post">
                      <div class="input-field col s12">
                         <input name="nik_wali" type="text" class="validate" value="2138173912">
                         <label>NIK Wali</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nisn" type="text" class="validate" value="2138173912">
                         <label>NISN</label>
                      </div>
                      <div class="input-field col s12" >
                         <input name="nama" type="text" class="validate" value="aselole ngaceng">
                         <label>Nama Siswa</label>
                      </div>
                      <div class="input-field col s2">
                          <span>Tingkat</span>
                          <select name="bank" class="browser-default">
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                          </select>
                      </div>
                      <div class="input-field col s3">
                          <span>Jurusan</span>
                          <select name="bank" class="browser-default">
                            <option>IPA</option>
                            <option>IPS</option>
                          </select>
                      </div>
                      <div class="input-field col s2">
                          <span>Nomor Kelas</span>
                          <select name="bank" class="browser-default">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                          </select>
                      </div>
                      <div class="input-field col s12">
                         <input name="tahun" type="text" class="validate" value="2015/2016">
                         <label>Tahun Ajar</label>
                      </div>
                      <div class="col s12" style="margin-top: 1.25em">
                         <button type="submit" class="waves-effect waves-light btn">EDIT</button>
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