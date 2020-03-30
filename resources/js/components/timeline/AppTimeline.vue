<template>
  <div>

    <app-qweet
      v-for="qweet in qweets"
      :key="qweet.id"
      :qweet="qweet"
    />

    <div
      v-if="qweets.length"
      v-observe-visibility="{
        callback: handleScrolledToBottomOfTimeline
      }"
    />

  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data () {
    return {
      page: 1,
      lastPage: 1
    }
  },
  computed: {
    ...mapGetters({
      qweets: 'timeline/qweets'
    }),
    atLastPage () {
      return this.page === this.lastPage
    },
    urlWithPage () {
      return `/api/timeline?page=${this.page}`
    }
  },
  mounted () {
    this.loadQweets()
  },
  methods: {
    ...mapActions({
      getQweets: 'timeline/getQweets'
    }),
    loadQweets () {
      this.getQweets(this.urlWithPage).then((res) => {
        this.lastPage = res.data.meta.last_page
      })
    },
    handleScrolledToBottomOfTimeline (isVisible) {
      if (!isVisible || this.atLastPage) {
        return
      }

      this.page++

      this.loadQweets()
    }
  }
}
</script>