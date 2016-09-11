<h2>Modifier une page</h2>
<p>Choisissez la page à modifier, puis utilisez le formulaire.</p>
<?php
$pages=new Pages();
$page=new Page();
$page->getGetNumPage();
$page->initInfosPage();
$page->verifFormUpdate();
?>
<div id="form">
    <?php
    if($page->getTest()==1) {
        ?>
    <p></p>
    <div class="info">
        <p><?php echo $page->getMessage(); ?></p>
    </div>
    <p></p>
    <?php
    }
    ?>
    <form action="edit-page-<?php echo $page->getNumPage(); ?>-<?php echo $page->getId(); ?>.html#form" method="POST">
        <fieldset>
            <legend>Page</legend>
            <?php
            $error=$page->getValidator("numPage")->getErrorMsg();
            if(!empty($error)) {
                ?>
            <p></p>
            <div class="error">
                <p><?php echo $error; ?></p>
            </div>
            <p></p>
            <?php
            }
            ?>
            <label for="numPage">Choisissez la page à modifier : </label>
            <?php
            $pages->dispListNumPages($page->getNumPage());
            ?>
        </fieldset>
        <p></p>
        <?php
        if($page->getNumPage()!=0) {
            ?>
    <p></p>
    <div class="info">
        <p>Dernières modifications <?php echo $page->getDateTxt(); ?>.</p>
    </div>
    <p></p>
        <fieldset>
            <legend>Contenu de la page</legend>
                <label for="content">Contenu de la page : </label>
                <br/>
                <?php
                $error=$page->getValidator("content")->getErrorMsg();
                if(!empty($error)) {
                    ?>
            <div class="error">
                <p><?php echo $error; ?></p>
            </div>
            <p></p>
            <?php
                }
                ?>
                <textarea name="content" id="content" rows="4" cols="20"><?php echo $page->getContent(); ?></textarea>
        </fieldset>
        <p></p>
        <fieldset>
            <legend>Référencement</legend>
                <label for="title">Balise TITLE (titre dans google) :</label>
                <br/>
                <?php
                $error=$page->getValidator("title")->getErrorMsg();
                if(!empty($error)) {
                    ?>
                <div class="error">
                    <p><?php echo $error; ?></p>
                </div>
                <p></p>
                <?php
                }
                ?>
                <input type="text" name="title" id="title" value="<?php echo $page->getTitle(); ?>" size="40" maxlength="200" />
                <br/>
                <label for="description">Balise DESCRIPTION (Description dans google) :</label>
                <br/>
                <?php
                $error=$page->getValidator("description")->getErrorMsg();
                if(!empty($error)) {
                    ?>
                <div class="error">
                    <p><?php echo $error; ?></p>
                </div>
                <p></p>
                <?php
                }
                ?>
                <textarea name="description" id="description" rows="4" cols="60"><?php echo $page->getDescription(); ?></textarea>
                <br/>
        </fieldset>
        <p></p>
        <p>
            <br/>
            <input type="submit" value="Enregistrer" name="subm" />
            <br/>
        </p>
        <?php
        }
        ?>
    </form>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'content' );
CKFinder.setupCKEditor( editor, '../datas/ckfinder/' );
</script>
</div>