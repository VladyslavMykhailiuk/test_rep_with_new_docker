<template>
  <div >
   <div class="main" v-for="post in post" :key="post.id">
     <strong>ID</strong>
     <div>{{post.id}}</div>
     <strong>Назва</strong>
     <div>{{post.title}}</div>
     <strong>Анотація</strong>
     <div>{{post.annotation}}</div>
     <strong>Контент</strong>
     <div>{{post.content}}</div>
     <strong>Пошта</strong>
     <div>{{post.email}}</div>
     <strong>Перегляди</strong>
     <div>{{post.views}}</div>
     <strong>Дата публікації</strong>
     <div>{{post.date}}</div>
     <strong>Чи публікується на головній</strong>
     <div>{{post.publish_in_index}}</div>
     <strong>Показник категорії</strong>
     <div>{{post.category_id}}</div>
   </div>
    <button @click="editPost">Редагувати пост</button>
    <button @click="deletePost">Видалити пост</button>
  </div>
</template>

<script>
import axiosInstance from "@/assets/AxiosInstance";
import router from "@/router/router";

export default {
  name: 'OnePost',
  data() {
    return {
      post: {},
    }
  },
  props: {

  },
  methods:{
deletePost(){
  const id = this.$route.params.id;
  axiosInstance.get(`deletePost.php`,{
    params:{
      "id":id,
    }
  }).then(() => {
    router.push('/posts');
  });
},
    editPost(){
      const id = this.$route.params.id;
      router.push(`/post/${id}/edit`);
    }
  },
  mounted(){
    const id = this.$route.params.id;
    axiosInstance.get(`post.php`,{
      params:{
        "id":id,
      }
    }).then((response) => {
      this.post = response.data;
    });
  }
}
</script>


<style scoped>
.main {
  max-width: 95%;
  overflow: hidden;
  word-break: break-word;
}

button {
  padding: 15px;
  margin-top: 30px;
  margin-left: 20px;
  border-radius: 15px;
  width: 150px;
  background-color: aquamarine;
  font-size: 15px;
  transition: all 0.3s ease-in-out;
  border: none;
}

button:hover {
  color: #fff;
  background-color: #000;
}

</style>