
<section class="pojemnik">

    <article>
    <header>
    <h1>Example: <?php echo $example->getNumber() ?></h1>
    <h2><?php echo $example->getTitle() ?></h2>
    <p>
    <?php echo $example->getLead() ?>
    </p>
    </header>


    <?php echo $example->getContents() ?>


    <footer>
    <?php echo $example->getUpdatedAt() ?>
    </footer>


      <?php include_partial('global/comments', array('comments' => $example->getComments())) ?>

    </article>

</section>


<?php if ($sf_user->isAuthenticated()): ?>
    <?php include_partial('comment/form', array('form' => $form)) ?>
<?php endif; ?>


