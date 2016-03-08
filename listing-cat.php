<?php
	$thisPage = 'cat';
    include_once "newapp/web/logincheck2.php";
	include_once "newapp/lib/sm-constant.php";
	include_once "newapp/lib/sm-connection.php";
	include_once "newapp/lib/web.php";
	
	$thisPage = 'pricing';
	include "header.php";
	include "menu.php";
	
	$cat = $_REQUEST['cat']; // debug 27
	$ok = getByCat($cat);
	$ok1 = getCat($cat);
	
?>
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="content">
                    
    <div class="document-title">
    <?php 
        print_r($ok);
    ?>
        <h1>
			<?php echo $ok1[0]['category_name']; ?>
		</h1>

        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Listing</a></li>
        </ul>
    </div><!-- /.document-title -->
	
	<?php
		include "search.php";
	?>

	

<h2 class="page-title">
    <?php echo count($ok); ?> results matching your query
	
    <form method="get" action="?" class="filter-sort">
        <div class="form-group">
            <select title="Sort by">
                <option name="price">Price</option>
                <option name="rating">Rating</option>
                <option name="title">Title</option>
            </select>
        </div><!-- /.form-group -->
                
        <div class="form-group">
            <select title="Order">
                <option name="ASC">Asc</option>
                <option name="DESC">Desc</option>
            </select>
        </div><!-- /.form-group -->
    </form>
</h2><!-- /.page-title -->

<div class="cards-row">
    
        <div class="card-row">
			<?php 
				for($i = 0; $i < count($ok); $i++){
					
					$img = "newapp/process/singleent/".$ok[$i]['id']."_cover.JPEG";
			?>		
			<div class="card-row-inner">
				<div class="card-row-image" data-background-image="<?php  echo $img ?>">
		
            
                
                    <div class="card-row-label"><a href="listing-detail.html"><?php echo $ok1[0]['name']; ?></a></div><!-- /.card-row-label -->
                    
                        <!--<div class="card-row-price">$100 / night</div> -->
                    
                </div><!-- /.card-row-image -->

                <div class="card-row-body">
                    <h2 class="card-row-title"><a href="#"><?php echo $ok[$i]['name']; ?></a></h2>
                    <div class="card-row-content"><p><?php echo $ok[$i]['details']; ?></p></div><!-- /.card-row-content -->
                </div><!-- /.card-row-body -->

                <div class="card-row-properties">
                    <dl>
                                                
							<dd>Category</dd><dt><?php echo $ok1[0]['category_name']; ?></dt>
                      
                        
                            <!-- <dd>Location</dd><dt><?php echo $ok[$i]['city']; ?></dt> -->
                        

                        <!-- <dd>Rating</dd>
                        <dt>
                            <div class="card-row-rating">
								<?php 
									$rates = $ok[$i]['avg_rating']; 
									if($rates == 1){
										echo '<i class="fa fa-star"></i>';
									} else if($rates == 2){
										echo '<i class="fa fa-star"></i> <i class="fa fa-star"></i>';
									} else if($rates == 3){
										echo '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>';
									} else if($rates == 4){
										echo '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>';
									} else if($rates == 5){
										echo '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>';
									} else if($rates == 0){
										echo 'Yet to be Rated';
									}
									
								?>
                                
                            </div>
                        </dt> -->
                    </dl>
                </div><!-- /.card-row-properties -->
            </div><!-- /.card-row-inner -->
        
		<?php
		}
		?>
	</div><!-- /.card-row -->
</div><!-- /.cards-row -->

<!--
<div class="pager">
    <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">5</a></li>
        <li class="active"><a>6</a></li>
        <li><a href="#">7</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div><!-- /.pagination -->


   
<?php
include "footer.php";
include "js.php";
?>
