<?php
	$unu = getAllCat();
?>
<form class="filter" method="post" action="?">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <input type="text" placeholder="Find Anything, Anywhere" class="form-control">
            </div><!-- /.form-group -->
        </div><!-- /.col-* -->

        <!--<div class="col-sm-12 col-md-4">
            <div class="form-group">
				<input type="text" class='Autocomplete' placeholder="" class="form-control">
				<!--<span class="input-group-addon"><i class="fa fa-map-marker geolocation" data-toggle="tooltip" data-placement="bottom" title="Find my position"></i></span>    -->
          <!--  </div><!-- /.form-group -->
        <!--</div><!-- /.col-* -->

        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <select class="form-control" title="Select Category">
				<?php
					for($u = 0; $u < count($unu); $u++ ){
							echo '<option value="'.$unu[$u]['category_id'].'">'.$unu[$u]['category_name'].'</option>';
					}
				?>
                   
                </select>
            </div><!-- /.form-group -->
        </div><!-- /.col-* -->
    </div><!-- /.row -->

    <hr>

    <div class="row">
        <div class="col-sm-8"></div>
        <!--     <div class="filter-actions">
                <a href="#"><i class="fa fa-close"></i> Reset Filter</a>
                <a href="#"><i class="fa fa-save"></i> Save Search</a>
            </div>/.filter-actions 
        </div> /.col-* -->

        <div class="col-sm-4">
            <button type="submit" class="btn btn-primary">Redefine Search Result</button>
        </div><!-- /.col-* -->
    </div><!-- /.row -->
</form>
