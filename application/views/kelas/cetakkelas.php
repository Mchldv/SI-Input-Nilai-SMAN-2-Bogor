<!--p>12 ipa sekian sama ada list nama setelah di klik kelasnya dan juga ada tahun kelas ajaran</p-->
<div class="container">
    <h1>Daftar Kelas</h1>
    <a class="waves-effect waves-light btn" href="<?php echo base_url();?>penilaian/input">Tambah Kelas</a>
    <table>
        <thead>
          <tr>
              <th data-field="id">Kelas</th>
              <th data-field="id">Tahun Ajaran</th>
              <th data-field="id">Wali Kelas</th>
              <th data-field="price">Detil Murid</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>XII IPA A</td>
            <td>2015/2016</td>
            <td>Similikiti Hareera</td>
            <td><button class="modal-trigger" href="#loginmodal">Detil</button></td>
          </tr>
          <tr>
            <td>XII IPA A</td>
            <td>2015/2016</td>
            <td>Similikiti Hareera</td>
            <td><button class="modal-trigger" href="#loginmodal">Detil</button></td>
          </tr>
          <tr>
            <td>XII IPA A</td>
            <td>2015/2016</td>
            <td>Similikiti Hareera</td>
            <td><button class="modal-trigger" href="#loginmodal">Detil</button></td>
          </tr>
        </tbody>
      </table>
</div>
<div id="loginmodal" class="modal">
    <div class="modal-content">
      <div class="row">
        kunyuk
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