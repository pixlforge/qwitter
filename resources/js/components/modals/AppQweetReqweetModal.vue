<template>
  <div>

    <!-- Composition -->
    <app-qweet-reqweet-compose
      @quote:success="$emit('close')"
      :qweet="qweet"
    />
    
    <!-- Reqweet -->
    <component
      v-if="qweet"
      :is="`app-qweet-variant-${qweet.type}`"
      :qweet="qweet"
      class="border border-solid border-gray-700 rounded-lg p-4 mt-4"
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
