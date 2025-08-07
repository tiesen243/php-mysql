<main id="app" class="container py-4 min-h-[calc(100dvh-4rem)] flex flex-col items-center justify-center gap-4">
  <h1 class="text-2xl font-bold">{{ message }}</h1>

  <p>Counter: {{ counter }}</p>
  <button 
    @click="increment"
    class="h-9 bg-primary text-primary-foreground rounded-md inline-flex items-center justify-center text-sm font-medium px-4 hover:bg-primary/80 transition-colors"
  >
    Increment Counter
  </button>
</main>

<script>
  Vue.createApp({
    data() {
      const counter = Vue.ref(0);

      return {
        counter: counter,
        message: 'Welcome to the About Page!',
      };
    },
    methods: {
      increment() {
        this.counter++;
      }
    },
  }).mount('#app');
</script>
