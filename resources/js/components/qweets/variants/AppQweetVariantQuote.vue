<template>
  <div class="flex">

    <!-- Avatar -->
    <div class="flex-shrink-0 mr-3">
      <img
        :src="qweet.user.avatar_url"
        class="w-12 rounded-full"
      >
    </div>

    <div class="flex-grow">

      <!-- Handle & username -->
      <app-qweet-username :user="qweet.user"></app-qweet-username>

      <!-- Body -->
      <app-qweet-body :qweet="qweet" />

      <!-- Original qweet -->
      <app-qweet
        :qweet="qweet.original_qweet"
        class="border border-gray-700 rounded-lg mt-4"
      />

      <!-- Actions -->
      <app-qweet-actions-group :qweet="qweet"/>

    </div>
  </div>
</template>

<script>
export default {
  props: {
    qweet: {
      type: Object,
      required: true
    }
  }
}
</script>
