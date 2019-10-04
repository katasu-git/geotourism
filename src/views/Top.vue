<template>
  <div id="top">
      topPage!
  </div>
</template>

<script>
export default {
  name: 'top',
  data () {
    return {
    }
  },
  methods: {
    goVotePage: function() {
      setTimeout(() => {
          this.$router.push({
          name: 'vote',
          params: {
            routerPeopleNum: this.peopleNum,
          }
        })
      }, 300);
    }
  }
}
</script>

<style lang="scss" scoped>
</style>