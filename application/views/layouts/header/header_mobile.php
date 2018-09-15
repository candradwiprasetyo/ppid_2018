<!-- header mobile -->
  	<div class="c-header-mobile" style="background: #eee">
  		<nav class="navbar navbar-inverse c-menu-mobile">
	      <div>
	        <div class="navbar-header">
	        	<div class="new-icon"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/mlogo.png"></a></div>
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#" id="search-mobile"><span class="fa fa-search fa-2x home-button-mobile"></span></a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
	          <ul class="nav navbar-nav">
			            <?php 
									$c_header = $this->library->get_header_category(); 
									foreach($c_header as $key => $row_c_header){ 
									?>
			            <li class="dropdown menu-dropdown">
			            	<a href="<?= base_url().$row_c_header->SEO ?>">
					            <div class="menu-dropdown__left">
					              	<?= ucwords(strtolower($row_c_header->CATEGORY_NAME)) ?>
						        	</div>
					        	</a>
				            <div href="#" class="dropdown-toggle  menu-dropdown__right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">  
					            <span class="fa fa-plus"></span>
				            </div>
				            <div class="u-clear"></div>
				            <ul class="dropdown-menu">
			              	<?php
											$sc_header = $this->library->get_header_subcategory($row_c_header->ID); 
											foreach($sc_header as $key => $row_sc_header){ 
											?>
			                <!-- <li class="dropdown-header">Nav header</li> -->
			                <li>
			                	<?php if(($row_sc_header->ID >= 22 && $row_sc_header->ID <= 25)  || ($row_sc_header->ID >= 35 && $row_sc_header->ID <= 36)){ ?>
												<a href="<?= $row_sc_header->URL; ?>">
													<?= ucwords($row_sc_header->SUBCATEGORY_NAME); ?>
												</a>
												<?php } else { ?>
												<a href="<?= base_url().$row_c_header->SEO."/".$row_sc_header->SEO; ?>">
													<?= ucwords($row_sc_header->SUBCATEGORY_NAME); ?>
												</a>
												<?php } ?>
			                </li>
			                <?php } ?>
			                <!-- <li role="separator" class="divider"></li> -->
			              </ul>
			            </li>
			            <?php 
			            	if($row_c_header->SEO=='review'){ 
			            	?>
			            		<li class="fokus"><a href="<?= base_url() ?>fokus">Fokus</a></li>
			            	<?php
			        			}
			          	}
			            ?>
									<li class="fokus"><a href="<?= base_url() ?>review/reportase">Reportase</a></li>
			            <li class="dropdown menu-dropdown">
			              <a href="<?= base_url().'indeks/all' ?>">
					            <div class="menu-dropdown__left">
					              	Indeks
						        </div>
					      		</a>
				            <div href="#" class="dropdown-toggle  menu-dropdown__right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">  
					            <span class="fa fa-plus"></span>
				            </div>
				            <div class="u-clear"></div>

			              <ul class="dropdown-menu dropdown-scroll">
			              	
			              	<?php
											$c_header = $this->library->get_header_category(); 
											foreach($c_header as $key => $row_c_header){
											?>
			                <!-- <li class="dropdown-header">Nav header</li> -->
			                <li class="li-header">
			                	<a href="<?= base_url().'indeks/'.$row_c_header->SEO ?>"><?= ucfirst(strtolower($row_c_header->CATEGORY_NAME)) ?></a>
			                </li>
			                	
		              		<?php
											$sc_header = $this->library->get_header_subcategory($row_c_header->ID); 
											foreach($sc_header as $key => $row_sc_header){ 
											?>
											<?php if(($row_sc_header->ID >= 22 && $row_sc_header->ID <= 25)  || ($row_sc_header->ID >= 35 && $row_sc_header->ID <= 36)){ ?>
											<li><a href="<?= $row_sc_header->URL; ?>">&nbsp;&nbsp;&nbsp;<?= ucfirst(strtolower($row_sc_header->SUBCATEGORY_NAME)) ?></a></li>
											<?php } else { ?>
											<li><a href="<?= base_url().'indeks/'.$row_sc_header->SEO ?>">&nbsp;&nbsp;&nbsp;<?= ucfirst(strtolower($row_sc_header->SUBCATEGORY_NAME)) ?></a></li>
											<?php } ?>
											<?php } ?>
											<?php } ?>
			                	
			            </li>
	                
	            
	                <!-- <li role="separator" class="divider"></li> -->
	          </ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>
	    <div class="c-header-mobile-shadow"></div>
	    <div class="c-search-mobile">
	    	<form action='<?= base_url() ?>search' method='get'>
	    		<div class="container">
	    			<input type="text" class="searchfield" placeholder="Ketikkan kata kunci" required name="q">
	    		</div>
	    	</form>
	    </div>
  	</div>