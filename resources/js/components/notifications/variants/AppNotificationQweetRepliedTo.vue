<template>
  <div class="p-4">
    <div class="text-gray-300 mb-4">
      <app-qweet-username :user="notification.data.user" />
      replied to your qweet
    </div>

    <p class="text-gray-600">
      {{ qweetContent }}
    </p>

  </div>
</template>

<script>
export default {
  props: {
    notification: {
      type: Object,
      required: true
    }
  },
  computed: {
    qweetContent () {
      return this.notification.data.qweet.body
    }
  }
}
</script>
