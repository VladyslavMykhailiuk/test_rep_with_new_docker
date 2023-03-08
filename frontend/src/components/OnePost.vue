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
    <button @click="editPost" class="nav-link px-2 text-black">Редагувати пост</button>
    <button @click="deletePost" class="nav-link px-2 text-black">Видалити пост</button>
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
      console.log(response.data)
    });
  }
}
</script>


<style scoped>
.main {
  width: 800px;
}

</style>