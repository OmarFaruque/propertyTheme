<?php 
/*
* Search Form 
*/
?>
                                <div id="searchFormTab" class="tabDiv <?= (is_home())?'mt60 pb60':'mt30 pb30'; ?>">
                                	<div class="tabItems">
                                		 <ul class="nav nav-tabs" role="tablist">
					                        <li class="active">
					                            <a href="#residential" role="tab" data-toggle="tab">Residential
					                            </a>
					                        </li>
					                        <li>
					                            <a href="#student" role="tab" data-toggle="tab">Student
					                            </a>
					                        </li>
					                    </ul>
                                	</div>	
                                	<div class="tab-content">
				                        <div class="tab-pane fade in active" id="residential">
				                            <form action="<?= get_home_url( );  ?>" role="search" method="get" class="form-inline searchform" id="homeSearchForm">
				                            <input type="search" class="hidden search-field form-control" placeholder="Product Search..." value="property" name="s" id="s" title="<?php echo esc_attr_x( 'Product Search:', 'label' ); ?>" />

				                            <input type="hidden" value="residential" name="propertytype">	

				                            	<fieldset class="form-group">
				                            		<?php 
				                            		 $allLocation = get_all_meta('location');
				                            		 ?>
				                            		<label for="location">Location</label>
				                            		<select name="location" class="form-control" id="location">
				                            			<option value="">Select Location</option>
				                            			<?php 
				                            			if(!empty($allLocation)):
				                            				foreach($allLocation as $location):
				                            			 ?>
				                            			<option <?= (isset($_GET['location']) && $_GET['location']==$location->meta_value)?'selected':'';  ?> value="<?= $location->meta_value;  ?>"><?= $location->meta_value;  ?></option>
				                            			<?php endforeach; endif; ?>
				                            		</select>
				                            	</fieldset>
				                            	<fieldset class="form-group">

				                            	<?php 
				                            		$types = get_terms([
													    'taxonomy' => 'property-category',
													    'hide_empty' => true,
													]);

				                            	?>
				                            		<label for="propertytype">Property Type</label>
				                            		<select name="type" class="form-control" id="propertytype">
				                            			<option value="">Select Property Type</option>
				                            			<?php 
				                            			if(!empty($types)):
				                            				foreach($types as $type):
				                            			 ?>
				                            			<option <?= (isset($_GET['type']) && $_GET['type'] == $type->slug)?'selected':''; ?> value="<?= $type->slug;  ?>"><?= $type->name;  ?></option>
				                            			<?php endforeach; endif; ?>
				                            		</select>
				                            	</fieldset>
				                         		<fieldset class="form-group price">
				                            		<label for="price">Price</label>
				                            		<select name="price" class="form-control" id="price">
				                            			<?php $priceArray = array('0-50', '51-100', '201-200', '301-400', '401-500', '501-600'); ?>
				                            			<option value="">Select Price Range</option>
				                            			<?php foreach($priceArray as $priceA): ?>
				                            				<option <?= (isset($_GET['price']) && $_GET['price'] == $priceA)?'selected':''; ?> value="<?= $priceA; ?>">$<?= str_replace('-', '-$', $priceA);  ?></option>
				                            			<?php endforeach; ?>
				                            			
				                            		</select>
				                            	</fieldset>
				                            	<button type="submit" class="btn btn-primary">Search</button>
				                            </form>
				                            <!-- /.popular-list -->
				                        </div>
				                        <!-- /.tab-pane -->
				                        <div class="tab-pane fade" id="student">
				                                <form action="<?= get_home_url( );  ?>" role="search" method="get" class="form-inline searchform" id="homeSearchForm2">
				                                 <input type="search" class="hidden search-field form-control" placeholder="Product Search..." value="property" name="s" id="s" title="<?php echo esc_attr_x( 'Product Search:', 'label' ); ?>" />

				                                 <input type="hidden" value="student" name="propertytype">	

				                            	<fieldset class="form-group">
				                            		<?php 
				                            		 $allLocation = get_all_meta('location');
				                            		 ?>
				                            		<label for="location">Location</label>
				                            		<select name="location" class="form-control" id="location">
				                            			<option value="">Select Location</option>
				                            			<?php 
				                            			if(!empty($allLocation)):
				                            				foreach($allLocation as $location):
				                            			 ?>
				                            			<option <?= (isset($_GET['location']) && $_GET['location']==$location->meta_value)?'selected':'';  ?> value="<?= $location->meta_value;  ?>"><?= $location->meta_value;  ?></option>
				                            			<?php endforeach; endif; ?>
				                            		</select>
				                            	</fieldset>
				                            	<fieldset class="form-group">

				                            	<?php 
				                            		$types = get_terms([
													    'taxonomy' => 'property-category',
													    'hide_empty' => true,
													]);

				                            	?>
				                            		<label for="propertytype">Property Type</label>
				                            		<select name="type" class="form-control" id="propertytype">
				                            			<option value="">Select Property Type</option>
				                            			<?php 
				                            			if(!empty($types)):
				                            				foreach($types as $type):
				                            			 ?>
				                            			<option <?= (isset($_GET['type']) && $_GET['type'] == $type->slug)?'selected':''; ?> value="<?= $type->slug;  ?>"><?= $type->name;  ?></option>
				                            			<?php endforeach; endif; ?>
				                            		</select>
				                            	</fieldset>
				                         		<fieldset class="form-group price">
				                            		<label for="price">Price</label>
				                            		<select name="price" class="form-control" id="price">
				                            			<?php $priceArray = array('0-50', '51-100', '201-200', '301-400', '401-500', '501-600'); ?>
				                            			<option value="">Select Price Range</option>
				                            			<?php foreach($priceArray as $priceA): ?>
				                            				<option <?= (isset($_GET['price']) && $_GET['price'] == $priceA)?'selected':''; ?> value="<?= $priceA; ?>">$<?= str_replace('-', '-$', $priceA);  ?></option>
				                            			<?php endforeach; ?>
				                            			
				                            		</select>
				                            	</fieldset>
				                            	<button type="submit" class="btn btn-primary">Search</button>
				                            </form>
				                        </div>
				                        <!-- /.tab-pane -->
				                    </div>
				                    <!-- /.tab-content -->
                                </div>
