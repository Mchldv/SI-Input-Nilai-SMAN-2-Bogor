<div class="container">
    <div class="row">
        <h1>IMPORT FILE NILAI</h1>
        <form action="#">
          <div class="file-field input-field">
            <div class="btn">
              <span>File</span>
              <input type="file" multiple>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Upload one or more files">
            </div>
          </div>
        </form>
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