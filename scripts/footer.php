<?php
$footers=new Footers();
$footers->initFooters();
?>
<div id="footer-content-wrapper">
	<div id="footer-content">
                    <?php
                    $k=1;
                    for($i=0; $i<3; $i++) {
                        ?>
            <div id="fbox<?php echo $k; ?>">
                    <h2><?php echo $footers->getArrayTitles($i); ?></h2>
                    <ul class="style1">
                    <?php
                    $j=0;
                    foreach($footers->getArrayCols($i) as $array) {
                        ?>
                        <li<?php if(empty($j)) { echo ' class="first"'; } ?>><a href="<?php echo $array[0]; ?>"><?php echo $array[1]; ?></a></li>
                        <?php
                        $j++;
                    }
                    ?>
                    </ul>
		</div>
                    <?php
                    $k++;
                    }
                    ?>
	</div>
</div>
<div id="footer">
    <p>Copyright (c) <?php echo date("Y", time()); ?> <a href="http://www.freelancecoiffure.net">FreelanceCoiffure.net</a>.</p>
</div>
    <div id="copyright"><a href="http://apycom.com/"></a></div>

