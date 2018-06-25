<template>
  <div id="app">
    <!--<div id="nav">-->
      <!--<router-link to="/">Home</router-link> |-->
      <!--<router-link to="/about">About</router-link>-->
    <!--</div>-->
    <router-view/>
  </div>
</template>
<script>
export default {
  name: 'App',
  data () {
    return {
      authenticated: false,
      userAccount: JSON.parse(this.$localStorage.get('loginData'))
    }
  },
  mounted () {
    if (!this.authenticated) {
      this.$router.replace({ name: '' })
    }
  },
  methods: {
    setAuthenticated (status) {
      this.authenticated = status
    },
    logout () {
      this.authenticated = false
    }
  }
}
</script>
<style src="./assets/css/main.css"></style>
