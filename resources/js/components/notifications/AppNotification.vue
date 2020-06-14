<template>
  <div class="w-full flex border-b border-gray-800">
    <component
      :is="`AppNotification${notification.type}`"
      :notification="notification"
    />
  </div>
</template>

<script>
export default {
  props: {
    notification: {
      type: Object,
      required: true
    }
  }
}
</script>
