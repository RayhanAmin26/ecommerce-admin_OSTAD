<template>
  <div style="padding:20px;">
    <h2>Categories</h2>

    <form @submit.prevent="addCategory">
      <input v-model="newCategory" placeholder="Category Name" />
      <button type="submit">Add</button>
    </form>

    <ul>
      <li v-for="c in categories" :key="c.id">
        {{ c.name }}
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const categories = ref([]);
const newCategory = ref('');

const fetchCategories = async () => {
  const res = await axios.get('http://127.0.0.1:8000/api/categories');
  categories.value = res.data;
};

const addCategory = async () => {
  await axios.post('http://127.0.0.1:8000/api/categories', { name: newCategory.value });
  newCategory.value = '';
  fetchCategories();
};

onMounted(fetchCategories);
</script>
