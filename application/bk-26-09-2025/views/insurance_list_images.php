<?php //print_r($list_file)?>
<style>
.flex-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    /*justify-content: space-around;*/
    justify-content:flex-start;
}

.flex-list li {
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    padding: 20px;
    margin: 10px;
    flex: 0 0 300px; /* Grow to fill space, shrink to fit, initial size of 200px */
    text-align: left;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;

}

.flex-list li:hover {
    background-color: #e0e0e0;
}

</style>
<ul class="flex-list">
	<?php $n=1; foreach($list_file AS $images){?>
    <li id="LI<?php echo $images->id?>">
		<div class="row">
			<div class="col-1"><strong><?php echo $n.".";?></strong></div>
			<div class="col-11"><a href="<?php echo base_url('uploadfile/insurance_images/').$images->image_name?>" target="_blank">
			<img src="<?php echo base_url('uploadfile/insurance_images/').$images->image_name?>" class="img-responsive" style="max-width: 240px;max-height: 200px;" align="left"></a></div>
			
		
		</div><br>
		<div><button type="button" class="btn btn-danger btn-sm" onClick="deleteImages('<?php echo $images->id?>','<?php echo $n?>')">ลบ</button></div>
		
	
	</li>
   <?php $n++; }?>
</ul>



<script>
	$(document).ready(function(){
		$('#p2').css('display','none');
	})
</script>