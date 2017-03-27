<div class="container">
    <div class="row">
    <h2>Semester 1</h2>
    <table>
        <thead>
          <tr>
              <th data-field="id">Kode</th>
              <th data-field="id">Mata Pelajaran</th>
              <th data-field="price">Nilai Akhir</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>KI0001</td>
            <td>Matematika</td>
            <td>100</td>
          </tr>
          <tr>
            <td>KI0002</td>
            <td>Fisika</td>
            <td>100</td>
          </tr>
          <tr>
            <td>KI0003</td>
            <td>Bahasa Inggris</td>
            <td>100</td>
          </tr>
        </tbody>
      </table>
        <!--a class="modal-trigger waves-effect waves-light btn grey darken-1" href="#inputnilai">Input Nilai</a-->
        <h2>Semester 2</h2>
    <table>
        <thead>
          <tr>
              <th data-field="id">Kode</th>
              <th data-field="id">Mata Pelajaran</th>
              <th data-field="price">Nilai Akhir</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>KI0001</td>
            <td>Matematika</td>
            <td>100</td>
          </tr>
          <tr>
            <td>KI0002</td>
            <td>Fisika</td>
            <td>100</td>
          </tr>
          <tr>
            <td>KI0003</td>
            <td>Bahasa Inggris</td>
            <td>100</td>
          </tr>
        </tbody>
      </table>
        <!--a class="modal-trigger waves-effect waves-light btn grey darken-1" href="#inputnilai">Input Nilai</a-->
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