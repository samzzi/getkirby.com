<?php snippet('cheatsheet.article.header') ?>

  <?php snippet('toc', $page->text()->headlines('h2')) ?>

  <div class="text">
    <?= $page->text()->kt()->anchorHeadlines('h2') ?>
  </div>

  <?php snippet('github.edit') ?>

<?php snippet('cheatsheet.article.footer') ?>
