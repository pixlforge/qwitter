<template>
  <div>

    <!-- Compose a qweet -->
    <div class="w-full border-b-8 border-gray-800 p-4">
      <app-qweet-compose/>
    </div>

    <app-qweet
      v-for="qweet in qweets"
      :key="qweet.id"
      :qweet="qweet"
    />

    <div
      v-if="qweets.length"
      class="mb-10"
      v-observe-visibility="{
        callback: handleScrolledToBottomOfTimeline
      }"
    />

  </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from 'vuex'

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

    Echo.private(`timeline.${this.$user.id}`)
      .listen('.QweetWasCreated', (event) => {
        this.setQweets([event])
      })
  },
  methods: {
    ...mapActions({
      getQweets: 'timeline/getQweets'
    }),
    ...mapMutations({
      setQweets: 'timeline/SET_QWEETS'
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