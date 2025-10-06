<template>
  <nav style="background:#2d3748;color:white;padding:10px">
    <h2>E-commerce Admin</h2>
    <ul style="display:flex;gap:15px;list-style:none;">
      <li><router-link to="/">Dashboard</router-link></li>
      <li><router-link to="/products">Products</router-link></li>
      <li><router-link to="/categories">Categories</router-link></li>
      <li><router-link to="/orders">Orders</router-link></li>
    </ul>
  </nav>
</template>

<style>
a {
  color: white;
  text-decoration: none;
}
a.router-link-active {
  text-decoration: underline;
}
</style>
