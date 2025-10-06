<template>
  <div style="padding:20px;">
    <h2>All Products</h2>

    <form @submit.prevent="addProduct">
      <input v-model="newProduct.name" placeholder="Name" />
      <input v-model="newProduct.price" placeholder="Price" type="number" />
      <input v-model="newProduct.category_id" placeholder="Category ID" type="number" />
      <button type="submit">Add</button>
    </form>

    <ul>
      <li v-for="p in products" :key="p.id">
        {{ p.name }} - ${{ p.price }}
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const products = ref([]);
const newProduct = ref({ name: '', price: '', category_id: '' });

const fetchProducts = async () => {
  const res = await axios.get('http://127.0.0.1:8000/api/products');
  products.value = res.data;
};

const addProduct = async () => {
  await axios.post('http://127.0.0.1:8000/api/products', newProduct.value);
  newProduct.value = { name: '', price: '', category_id: '' };
  fetchProducts();
};

onMounted(fetchProducts);
</script>
