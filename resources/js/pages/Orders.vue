<template>
  <div style="padding:20px;">
    <h2>Orders</h2>

    <ul>
      <li v-for="o in orders" :key="o.id">
        {{ o.customer_name }} - {{ o.status }} (${{ o.total_price }})
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const orders = ref([]);

onMounted(async () => {
  const res = await axios.get('http://127.0.0.1:8000/api/orders');
  orders.value = res.data;
});
</script>
