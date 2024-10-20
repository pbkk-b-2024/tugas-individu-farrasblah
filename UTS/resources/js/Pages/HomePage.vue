<template>
  <div class="home-container">
    <h1 class="title">Welcome to Home Page!!</h1>
    <router-link to="/counter" class="button">Go to Counter Page</router-link>
  </div>
</template>

<script>
export default {
  name: "HomePage",
};
</script>

<style scoped>
.home-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh; /* Memusatkan konten secara vertikal */
  background-color: #f8f9fa; /* Warna latar belakang */
}

.title {
  font-size: 2.5em;
  color: #343a40; /* Warna teks */
  margin-bottom: 20px; /* Jarak di bawah judul */
}

.button {
  padding: 10px 20px; /* Padding tombol */
  font-size: 1.2em; /* Ukuran font */
  color: #fff; /* Warna teks */
  background-color: #007bff; /* Warna latar belakang tombol */
  border: none; /* Hapus border */
  border-radius: 5px; /* Sudut tombol melengkung */
  text-decoration: none; /* Hapus garis bawah */
  transition: background-color 0.3s ease; /* Efek transisi */
}

.button:hover {
  background-color: #0056b3; /* Warna latar belakang saat hover */
}
</style>
