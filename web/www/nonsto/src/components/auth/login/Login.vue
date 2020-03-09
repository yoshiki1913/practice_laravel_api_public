<template>
  <div class="">
    {{ id }}
    <form  @submit.prevent="login">
      <input type="email" v-model="email">
      <input type="password" v-model="password">
      <button value="send">login</button>
    </form>
    <button value="send" @click="hoge()">hoge</button>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data () {
    return {
      id: 'hoge',
      email: '',
      password: ''
    }
  },
  methods: {
    login: function () {
      let param = {email: this.email, password: this.password}

      const axiosPost = axios.create({
        xsrfHeaderName: 'X-CSRF-Token'
        // withCredentials: true
      })

      axiosPost.post('http://localhost:8000/api/login', param).then(response => {
        console.log(response)
      }).catch(error => {
        console.log(error)
      })
    },
    hoge: function () {
      // fetchの場合
      fetch('http://localhost:8000/api/hoge', {
        // credentials: 'include',
        mode: 'cors',
        method: 'post',
        headers: {
          'Content-Type': 'application/json; charset=utf-8'
        }}).then(response => {
        console.log(response)
      })

      // axiosの場合
      const axiosPost = axios.create({
        xsrfHeaderName: 'X-CSRF-Token'
        // withCredentials: true
      })
      axiosPost.post('http://localhost:8000/api/hoge', {
        headers: {
          mode: 'cors'
        }
      }).then(response => {
        console.log(response)
      })
    }
  }
}
</script>
