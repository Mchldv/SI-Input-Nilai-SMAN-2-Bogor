<div class="container">
    <div class="row">
    <form method="POST" action="insert_query.php">
        <!--div class="input-field col s12 l3 form-group">
            <select name="type" id="type" required="required">
                <option value="" disabled selected>Mata Pelajaran
                <?php foreach ($subject as $row)
                { ?>
                    <option value="<?php echo $row->kode_mapel; ?>"><?php echo $row->nama; ?></option>
                <?php } ?>
            </select>
          </div-->
        <!--pake php kalo valuenya 1 misal ntar keluar kelasnya yang available!-->
        <div class="input-field col s12 l3 form-group">
           <select name="type1" id="type1" required="required">
            <option value="" disabled selected>Kelas</option>
           </select>
        </div>
        <!--div class="input-field col s12 l3 form-group">
            <a type="submit" class="waves-effect waves-light btn grey darken-1">Cek Nilai</a>
        </div-->
    </form>
    <table>
        <thead>
          <tr>
              <th data-field="id">NISN</th>
              <th data-field="id">Nama Siswa</th>
              <th data-field="price">Nilai Akhir</th>
              <th data-field="id">Detail</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>5114100192</td>
            <td>Alvin</td>
            <td>100</td>
            <td><a class="modal-trigger waves-effect waves-light btn grey darken-1" href="<?php echo base_url();?>nilai/individu">Detail</a></td>
          </tr>
          <tr>
            <td>5114100111</td>
            <td>Alan</td>
            <td>100</td>
            <td><a class="modal-trigger waves-effect waves-light btn grey darken-1" href="<?php echo base_url();?>nilai/individu">Detail</a></td>
          </tr>
          <tr>
            <td>5114100100</td>
            <td>Jonathan</td>
            <td>100</td>
            <td><a class="modal-trigger waves-effect waves-light btn grey darken-1" href="<?php echo base_url();?>nilai/individu">Detail</a></td>
          </tr>
        </tbody>
      </table>
        <!--a class="modal-trigger waves-effect waves-light btn grey darken-1" href="#inputnilai">Input Nilai</a-->
    </div>
</div>

<script>
    	  $(document).ready(function(){
	    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
	    $('.modal-trigger').leanModal();
        complete: function() { alert('Closed'); } 
	  });
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#type').on("change",function () {
    		$('#size').html("");
            var categoryId = $(this).find('option:selected').val();
        $.ajax({
            url: "<?php echo base_url();?>Penilaian/pilihkelas",
            type: "POST",
            data: "categoryId="+categoryId,
            success: function (response) {
                $('#type1').html(response);
                console.log(response);
            },
        });
    }); 
});
</script>