<template>
  <div style="padding:40px;">
    <h2>Admin Login</h2>
    <form @submit.prevent="loginUser">
      <input v-model="email" placeholder="Email" type="email" />
      <input v-model="password" placeholder="Password" type="password" />
      <button type="submit">Login</button>
    </form>
    <p v-if="error" style="color:red">{{ error }}</p>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import router from '../router';

const email = ref('');
const password = ref('');
const error = ref('');

const loginUser = async () => {
  try {
    const res = await axios.post('http://127.0.0.1:8000/api/login', {
      email: email.value,
      password: password.value,
    });
    localStorage.setItem('token', res.data.token);
    router.push('/');
  } catch (err) {
    error.value = 'Invalid credentials';
  }
};
</script>
