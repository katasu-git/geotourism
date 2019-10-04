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
        axios.post('https://www2.yoslab.net/~nishimura/geotour/PHP/api.php').then(response => {
        console.log(response.data.tour_name);
        console.log(response.data.group_name);
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