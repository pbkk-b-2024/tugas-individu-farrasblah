<template>
    <div class="counter-container">
      <h4 class="mb-5">Counter Page</h4>
      <div class="button-container">
        <button @click="decrement" class="counter-button">Decrement</button>
        <button @click="increment" class="counter-button">Increment</button>
      </div>
      <p class="count-display">Current Count: {{ count }}</p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        count: 0,
      };
    },
    methods: {
      increment() {
        this.count++;
      },
      decrement() {
        this.count--; // Mengurangi nilai count
      },
    },
  };
  </script>
  
  <style scoped>
  .counter-container {
    text-align: center;
    margin-top: 20px;
  }
  
  .button-container {
    margin-bottom: 20px; /* Jarak di bawah tombol */
  }
  
  .counter-button {
    margin: 0 10px; /* Jarak antar tombol */
    padding: 10px 20px; /* Padding untuk tombol */
    font-size: 1.2em; /* Ukuran font untuk tombol */
    color: #ffffff; /* Warna teks tombol */
    background-color: #007bff; /* Warna latar belakang tombol */
    border: none; /* Menghilangkan border default */
    border-radius: 5px; /* Sudut tombol melengkung */
    cursor: pointer; /* Menunjukkan pointer saat hover */
    transition: background-color 0.3s; /* Efek transisi saat hover */
  }
  
  .counter-button:hover {
    background-color: #0056b3; /* Warna latar belakang saat hover */
  }
  
  .count-display {
    font-size: 1.5em; /* Ukuran font untuk tampilan count */
  }
  </style>
  