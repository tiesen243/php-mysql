<main class="container py-4" id="app">
</main>

<script>
  Vue.createApp({
    data() {
      const counter = Vue.ref(0);

      return {
        message: 'Welcome to the About Page!',
        counter: counter
      };
    },
    methods: {
      incrementCounter() {
        this.counter++;
      }
    },

    template: /* HTML */`
      <div class="text-center flex flex-col items-center justify-center gap-4">
        <h1 class="text-2xl font-bold">{{ message }}</h1>

        <p>Counter: {{ counter }}</p>
        <button 
        @click="incrementCounter"
          class="h-9 bg-primary text-primary-foreground rounded-md inline-flex items-center justify-center text-sm font-medium px-4 hover:bg-primary/80 transition-colors"
        >
          Increment Counter
        </button>
      </div>
    `
  }).mount('#app');
</script>
