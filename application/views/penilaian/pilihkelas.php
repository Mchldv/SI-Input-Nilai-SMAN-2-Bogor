<option disabled selected>Select Subcategory</option> 
 <?php  
      foreach ($sub->result() as $row)  
      {  
    ?>
<option value="<?php echo $row->nisn;?>"><?php echo $row->nama_kelas;?></option>
<?php } ?>