<template>
  <div class="w-full p-4">
    <app-qweet
      v-if="resolvedQweet"
      :qweet="resolvedQweet"
      class="!border-0"
    />
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  props: {
    notification: {
      type: Object,
      required: true
    }
  },
  computed: {
    ...mapGetters({
      qweet: 'notifications/qweet'
    }),
    qweetContent () {
      return this.notification.data.qweet.body
    },
    resolvedQweet () {
      return this.qweet(this.notification.data.qweet.id)
    }
  }
}
</script>
