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
      <label>Выберите метод подтверждения:</label>
      <select v-model="selectedMethod">
        <option value="email">Email</option>
        <option value="sms">СМС</option>
        <option value="telegram">Телеграм</option>
      </select>
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

const selectedMethod = ref('email');

async function submitForm() {
  try {
    const confirmationCode = generateConfirmationCode();
    console.log('Confirmation code:', confirmationCode);

    if (selectedMethod.value === 'email') {
      console.log('Отправка кода на Email:', userData.value.email);
    } else if (selectedMethod.value === 'sms') {
      console.log('Отправка кода по СМС на номер телефона');
    } else if (selectedMethod.value === 'telegram') {
      console.log('Отправка кода в Телеграм');
    }

    const userEnteredCode = prompt('Введите код подтверждения:');

  } catch (error) {
    console.error(error);
  }
}

function generateConfirmationCode() {
  return Math.floor(100000 + Math.random() * 900000).toString();
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

.user-form select {
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
