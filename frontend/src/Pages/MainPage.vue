<template>
  <div>
    <div class="center">
      <h1>Вітаємо на сайті нашого блогу!</h1>
      <h4>Посміхніться, вам личе!</h4>
      <h5>(для взаэмодії с постами потрібно авторизуватися)</h5>
      <h6>(вийти з профілю можливо у списку постів)</h6>
    </div>
  </div>
</template>

<script>
export default {
  name: 'MainPage',
  data() {
    return {
    }
  },
  props: {

  },
  methods:{

  },
}
</script>


<style scoped>
.center {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: 250px;
}
</style>
