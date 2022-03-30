<?php
$sticky ??= true;
$open   ??= false;
?>
<nav class="sidebar" aria-label="<?= $title ?? '' ?> menu">
  <div class="<?= $sticky? 'sticky' : '' ?>" style="--top: var(--spacing-6)">
    <?php if ($title ?? null): ?>
    <header class="h1 mb-12 color-gray-400">
      <a href="<?= $link ?? '#' ?>"><?= $title ?></a>
    </header>
    <?php endif ?>

    <ul class="sidebar-menu-1">
      <?php foreach ($items as $item): ?>
      <li data-id="<?= $item['id'] ?? $item['title'] ?? null ?>">
        <?php if ($item['children'] ?? null): ?>
        <details
          class="details"
          <?= ($open || $item['open'] ?? false) ? 'open' : '' ?>
        >
          <summary>
            <?php snippet('sidebar/item', [
              'title'   => $item['title'],
              'id'      => $item['id'] ?? null,
              'link'    => $item['link'] ?? null,
              'icon'    => $item['icon'] ?? null,
              'current' => $item['active'] ?? $item['open'] ?? false
            ]) ?>
          </summary>
          <ul class="sidebar-menu-2">
            <?php foreach ($item['children'] as $subitem): ?>
            <li>
              <?php snippet('sidebar/item', [
                'title'   => $subitem['title'],
                'link'    => $subitem['link'] ?? null,
                'current' => $subitem['open'] ?? false
              ]) ?>
            </li>
            <?php endforeach ?>
          </ul>
        </details>
        <?php else: ?>
        <?php snippet('sidebar/item', [
          'title'   => $item['title'],
          'id'      => $item['id'] ?? null,
          'link'    => $item['link'] ?? null,
          'icon'    => $item['icon'] ?? null,
          'current' => $item['active'] ?? $item['open'] ?? false
        ]) ?>
        <?php endif ?>
      </li>
      <?php endforeach ?>
    </ul>

  </div>
</nav>
