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
import { mapGetters, mapActions } from 'vuex'

export default {
  computed: {
    ...mapGetters({
      qweets: 'timeline/qweets'
    })
  },
  mounted () {
    this.getQweets()
  },
  methods: {
    ...mapActions({
      getQweets: 'timeline/getQweets'
    })
  }
}
</script>