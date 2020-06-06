<template>
  <div>

    <!-- Parent -->
    <component
      v-if="qweet"
      :is="`app-qweet-variant-${qweet.type}`"
      :qweet="qweet"
    />

    <!-- Compose reply -->
    <app-qweet-reply-compose
      @reply:success="$emit('close')"
      :qweet="qweet"
      class="mt-4"
    />

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
