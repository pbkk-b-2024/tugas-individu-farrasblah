<!-- resources/js/Pages/App.vue -->
<template>
  <div class="app-container">
      <h1 class="app-title">Welcome to My App</h1>
      <div class="nav-links">
          <router-link to="/counter" class="nav-link">Go to Counter Page</router-link>
          <router-link to="/home" class="nav-link">Go to Home Page</router-link>
      </div>
      <router-view />
  </div>
</template>

<script>
export default {
  name: "App",
};
</script>

<style scoped>
.app-container {
  text-align: center;
  margin-top: 50px;
  padding: 20px;
  background-color: #f8f9fa;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.app-title {
  font-size: 2.5em;
  color: #343a40;
  margin-bottom: 20px;
}

.nav-links {
  margin-bottom: 30px;
}

.nav-link {
  display: block;
  margin: 10px 0;
  font-size: 1.2em;
  color: #007bff;
  text-decoration: none;
  transition: color 0.3s ease;
}

.nav-link:hover {
  color: #0056b3;
}
</style>
