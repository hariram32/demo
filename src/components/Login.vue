<template src="../views/login.html"/>
<script>
import axios from 'axios'
export default {
  name: 'Login',
  data () {
    return {
      email: '',
      password: '',
      errors: []
    }
  },
  methods: {

    login () {
      let rawData = {
        email: this.email,
        password: this.password,
        login: 1
      }
      rawData = JSON.stringify(rawData)
      let formData = new FormData()
      formData.append('data', rawData)
      const config = { headers: { 'Content-Type': 'multipart/form-data' } }

      axios.post('http://localhost/demo-backend/api-call.php', rawData, config)
        .then(res => {
          var resp = Array.isArray(res.data) ? res.data : [res.data]
          if (resp.length !== 0) {
            localStorage.setItem('loginData', JSON.stringify(resp[0]))
            this.$emit('authenticated', true)

            if (resp[0].role !== 0) {
              this.$router.push({name: 'dashboard'})
            } else {
              this.$router.push({name: 'user-dashboard'})
            }
          } else {
            this.errors.push('account not exist!!!')
          }
        }).catch((err) => {
          this.errors.push(err)
        })
    }
  }
}
</script>

<style src="../assets/css/float-label.css" scoped></style>
