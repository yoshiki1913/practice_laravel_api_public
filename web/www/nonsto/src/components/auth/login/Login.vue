<template>
  <div class="">
    {{ id }}
    <from>
      <input type="email" name="email" v-model="email">
      <input type="password" name="password" v-model="password">
      <button value="send" @click="login()">login</button>
    </from>
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
        xsrfHeaderName: 'X-CSRF-Token',
        withCredentials: true
      })

      axiosPost.post('http://localhost:8000/api/login', param).then(response => {
        console.log(response)
      }).catch(error => {
        console.log(error)
      })
    },
    hoge: function () {
      fetch('http://localhost:8000/api/hoge', {
        // credentials: 'include',
        mode: 'cors',
        headers: {
          'Content-Type': 'application/json; charset=utf-8'
        }}).then(response => {
        console.log(response)
      })
      // const axiosPost = axios.create({
      //   xsrfHeaderName: 'X-CSRF-Token',
      //   withCredentials: true
      // })

      // axiosPost.get('http://localhost:8000/api/hoge', {hoge: 'gggggg', huga: 'jjjjjj'}).then(response => {
      //   console.log(response)
      // })
    }
  }
}
</script>
