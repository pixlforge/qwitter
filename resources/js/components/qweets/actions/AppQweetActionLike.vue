<template>
  <a
    @click.prevent="likeOrUnlike"
    href="#"
    :class="{
      'text-red-600': liked,
      'text-gray-600 hover:text-gray-200': !liked
    }"
    class="flex items-center transition-colors duration-100 ease-out"
  >
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      width="24"
      height="24"
      class="w-5 fill-current mr-1"
    >
      <path d="M12.76 3.76a6 6 0 0 1 8.48 8.48l-8.53 8.54a1 1 0 0 1-1.42 0l-8.53-8.54a6 6 0 0 1 8.48-8.48l.76.75.76-.75zm7.07 7.07a4 4 0 1 0-5.66-5.66l-1.46 1.47a1 1 0 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z"/>
    </svg>
    <span>
      {{ qweet.likes_count }}
    </span>
  </a>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  props: {
    qweet: {
      type: Object,
      required: true
    }
  },
  computed: {
    ...mapGetters({
      likes: 'likes/likes'
    }),
    liked () {
      return this.likes.includes(this.qweet.id)
    }
  },
  methods: {
    ...mapActions({
      likeQweet: 'likes/likeQweet',
      unlikeQweet: 'likes/unlikeQweet'
    }),
    likeOrUnlike () {
      if (this.liked) {
        this.unlikeQweet(this.qweet)
        return
      }

      this.likeQweet(this.qweet)
    }
  }
}
</script>
