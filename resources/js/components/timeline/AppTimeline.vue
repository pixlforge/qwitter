<template>
  <div>

    <app-qweet
      v-for="qweet in qweets"
      :key="qweet.id"
      :qweet="qweet"
    />

  </div>
</template>

<script>
import axios from 'axios'

export default {
  data () {
    return {
      qweets: []
    }
  },
  mounted () {
    this.getQweets()
  },
  methods: {
    async getQweets () {
      const res = await axios.get('/api/timeline')
      this.qweets = res.data.data
    }
  }
}
</script>