<template>
  <span class="font-bold text-gray-300">
    {{ user.name }}
    <span class="font-normal text-gray-600">
      @{{ user.username }}
    </span>
  </span>
</template>

<script>
export default {
  props: {
    user: {
      type: Object,
      required: true
    }
  }
}
</script>