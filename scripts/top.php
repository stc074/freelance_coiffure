	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
                            <?php
                            $title=new Title();
                            $title->initTitle();
                            ?>
                            <h1><a href="accueil.html"><?php echo $title->getTitle(); ?></a></h1>
			</div>
                    <?php
                    $flag=($page==0);
                    $numPage=1;
                    if(isset($_GET["numPage"])) {
                        $numPage=  addslashes(htmlspecialchars($_GET["numPage"]));
                    }
                    ?>
			<div id="menu">
				<ul>
					<li<?php if($flag&&$numPage==1) { echo ' class="current_page_item"'; } ?>><a href="accueil.html">Accueil</a></li>
					<li<?php if($flag&&$numPage==2) { echo ' class="current_page_item"'; } ?>><a href="prestations.html">Prestations</a></li>
					<li<?php if($flag&&$numPage==3) { echo ' class="current_page_item"'; } ?>><a href="tarifs.html">Tarifs</a></li>
					<li<?php if($page==1) { echo ' class="current_page_item"'; } ?>><a href="galeries.html">Galeries</a></li>
                                        <li<?php if($page==2) { echo ' class="current_page_item"'; } ?>><a href="carte.html">carte</a></li>
				</ul>
			</div>
		</div>
            <?php
            if($flag&&$numPage==1) { ?>
		<div id="banner">
			<div class="content">
                            <div class="photos">
                            <div class="photoF"></div>
                            <div class="photoE"></div>
                            <div class="photoH"></div>
                            </div>
			</div>
		</div>
            <?php } ?>
	</div>
	<!-- end #header -->
