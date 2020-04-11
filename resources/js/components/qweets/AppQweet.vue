<template>
  <div class="hover:bg-gray-800 border-b border-gray-800 cursor-pointer p-4">

    <component
      :is="`app-qweet-variant-${qweet.type}`"
      :qweet="qweet"
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