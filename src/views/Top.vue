<template>
  <div id="top">
      <button v-on:click="accessDb()">心クリック！</button>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'top',
  data () {
    return {
    }
  },
  methods: {
    accessDb: function() {
        axios.post('./PHP/api.php').then(response => {
        console.log(response.data.area);
        console.log(response.data.num);
      }).catch(error => {
        // エラーを受け取る
        console.log(error);
      });
    }
  }
}
</script>

<style lang="scss" scoped>
</style>