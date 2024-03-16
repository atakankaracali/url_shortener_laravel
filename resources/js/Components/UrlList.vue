<template>
  <div>
    <h1 class="title">URL Shortener</h1>
    <form @submit.prevent="shortenUrl" class="form">
      <div class="form-group">
        <label for="url" class="label">URL:</label>
        <input type="text" class="input" id="url" v-model="originalUrl" required>
      </div>
      <button type="submit" class="button">Shorten</button>
    </form>
    <url-list :urls="urls" />
  </div>
</template>

<script>
import UrlList from './components/UrlList.vue';

export default {
  components: {
    UrlList
  },
  data() {
    return {
      originalUrl: '',
      urls: [] // URL list will be stored here
    }
  },
  methods: {
    shortenUrl() {
      // URL shortening functionality will be implemented here
    }
  }
}
</script>

<style scoped>
.title {
  text-align: center;
  color: #333;
  margin-bottom: 20px;
}

.form {
  max-width: 400px;
  margin: 0 auto;
}

.form-group {
  margin-bottom: 20px;
}

.label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.input {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.button {
  padding: 10px 20px;
  font-size: 16px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.button:hover {
  background-color: #0056b3;
}
</style>
