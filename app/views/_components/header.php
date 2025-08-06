<header class="bg-background/70 backdrop-blur-xl backdrop-saturate-150 border-b h-16 flex items-center inset-0 sticky z-50">
  <div class="container flex items-center justify-between gap-4">
    <a href="/" class="text-2xl font-bold grow">
      PHP MVC App
    </a>

    <nav class="flex items-center gap-4">
    <?php
    $routes = [
        'home' => ['label' => 'Home', 'path' => '/'],
        'about' => ['label' => 'About', 'path' => '/about'],
        'contact' => ['label' => 'Contact', 'path' => '/contact'],
    ];

    foreach ($routes as $route => $data) {
        $isActive = ($_SERVER['REQUEST_URI'] === $data['path']) ? 'text-primary' : 'text-muted-foreground';
        echo "<a href=\"{$data['path']}\" class=\"{$isActive} hover:text-primary transition-colors\">{$data['label']}</a>";
    }
    ?>
    </nav>

    <button 
      id="theme-toggle" 
      onclick="toggleTheme()" 
      class="size-9 shrink-0 inline-flex bg-background hover:bg-accent items-center justify-center rounded-md transition-colors [&_svg]:size-4 data-[theme='light']:[&_.lucide-moon]:hidden data-[theme='dark']:[&_.lucide-sun]:hidden"
    >
      <?php require_once 'icons/moon.php'; ?>
      <?php require_once 'icons/sun.php'; ?>
    </button>
  </div>
</header>

<script src="/js/theme.js" defer></script>
