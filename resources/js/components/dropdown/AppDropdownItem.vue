<template>
  <a
    @click.prevent="handleClick"
    href="#"
    class="block text-base hover:bg-gray-600 text-gray-300 px-4 py-3"
  >
    <slot/>
  </a>
</template>

<script>
export default {
  methods: {
    handleClick (event) {
      this.$emit('click', event)
      this.$parent.close()
    }
  }
}
</script>
