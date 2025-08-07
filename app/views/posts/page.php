<main class="container py-4 grid gap-4">
  <form class="grid gap-4" action="/posts/create" method="post">
    <div class="grid gap-2">
      <label for="title">Title</label>
      <input 
        type="text" 
        name="title"
        class="flex h-9 w-full min-w-0 rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none selection:bg-primary selection:text-primary-foreground file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm dark:bg-input/30"
      />
    </div>

    <div class="grid gap-2">
      <label for="content">Content</label>
      <textarea 
        name="content"
        class="flex field-sizing-content min-h-16 w-full rounded-md border border-input bg-transparent px-3 py-2 text-base shadow-xs transition-[color,box-shadow] outline-none placeholder:text-muted-foreground focus-visible:border-ring focus-visible:ring-[3px] focus-visible:ring-ring/50 disabled:cursor-not-allowed disabled:opacity-50 aria-invalid:border-destructive aria-invalid:ring-destructive/20 md:text-sm dark:bg-input/30 dark:aria-invalid:ring-destructive/40"
      ></textarea>
    </div>

    <button type="submit" class="bg-primary text-primary-foreground rounded-md px-4 py-2">
      Create Post
    </button>
  </form>

  <div class="grid grid-cols-3 gap-4">
    <?php foreach ($posts as $post): ?>
      <div class="bg-card text-card-foreground rounded-lg p-6 shadow-md border grid gap-6"> 
        <div class="relative">
          <h2 class="text-xl font-bold">
            <?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?>
          </h2>
          <p class="text-sm text-muted-foreground">
            <?= htmlspecialchars($post['createdAt'], ENT_QUOTES, 'UTF-8') ?>
          </p>

          <form class="absolute top-0 right-0" action="/posts/delete/<?= $post[
            'id'
          ] ?>" method="post">
            <button class="[&_svg]:size-4 size-9 bg-transparent hover:bg-accent transition-colors inline-flex items-center justify-center rounded-md">
              <?php require dirname(__DIR__) .
                '/_components/icons/trash.php'; ?>
            </button>
          </form>
        </div>

        <div>
          <p>
            <?= htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8') ?>
          </p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>
