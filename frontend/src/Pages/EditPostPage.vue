<template>
  <div class="dop">
    <EditForm/>
  </div>
</template>

<script>
import EditForm from "@/components/EditForm.vue";

export default {
  name: 'EditPostPage',
  data() {
    return {
    }
  },
  props: {

  },
  methods:{

  },
  components:{
    EditForm
  }
}
</script>


<style scoped>
.dop {
  padding: 50px;
}
</style>