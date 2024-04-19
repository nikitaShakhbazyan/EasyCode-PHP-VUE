<template>
  <div>
    <h1>Добавить пользователя</h1>
    <form @submit.prevent="submitForm" class="user-form">
      <label for="name">Имя:</label>
      <input type="text" id="name" v-model="userData.name" required>
      <br>
      <label for="surname">Фамилия:</label>
      <input type="text" id="surname" v-model="userData.surname" required>
      <br>
      <label for="email">Email:</label>
      <input type="email" id="email" v-model="userData.email" required>
      <br>
      <button type="submit">Добавить</button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const userData = ref({
  name: '',
  surname: '',
  email: ''
});

async function submitForm() {
  try {
    const response = await fetch('http://localhost:8000/users', {
      method: 'POST',
      mode:"cors",
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(userData.value)
    });
    const data = await response.json();
    console.log(data);
  } catch (error) {
    console.error(error);
  }
}
</script>

<style>
.user-form label {
  display: block;
  margin-bottom: 0.5rem;
}

.user-form input[type="text"],
.user-form input[type="email"] {
  width: 100%;
  padding: 0.5rem;
  margin-bottom: 1rem;
}

.user-form button {
  padding: 0.5rem 1rem;
  background-color: #007bff;
  color: #fff;
  border: none;
  cursor: pointer;
}

.user-form button:hover {
  background-color: #0056b3;
}
</style>
