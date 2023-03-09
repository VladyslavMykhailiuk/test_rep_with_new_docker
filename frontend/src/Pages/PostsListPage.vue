<template>
  <div class="main">
    <h2>Список постів</h2>
    <ul class="list">
      <li class="item" v-for="post in posts" :key="post.id">
        <router-link class="link" :to="{ name: 'post', params: { id: post.id } }">{{ post.title }}</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
import axiosInstance from "@/assets/AxiosInstance";

export default {
  name: 'MainPage',
  data() {
    return {
      posts: []
    }
  },
  mounted() {
    this.getPosts();

  },
  props: {

  },
  methods:{
    getPosts() {
      axiosInstance.get('/posts.php')
          .then(response => {
            this.posts = response.data;
            // console.log(response.data);
          })
          .catch(error => {
            console.log(error);
          });
    },
  },
}
</script>


<style scoped>
h2 {
  text-align: center;
}

.link {
  text-decoration: none;
  color: black;
  font-size: 25px;
  transition: all 0.5s ease-in-out;
  display:block;
  max-width: 80%;
  margin-top: 25px;
}
.link:hover {
  color: blueviolet;
}
.list {
  list-style-type: none;
}

.main {
  max-width: 100%;
  overflow: hidden;
  word-break: break-word;
}

</style>