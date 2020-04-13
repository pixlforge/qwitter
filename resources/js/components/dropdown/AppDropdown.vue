<template>
  <div
    v-click-outside="close"
    class="relative"
  >
    <div @click.prevent="open = !open">
      <slot name="trigger"/>
    </div>
    <div
      v-show="open"
      class="w-56 absolute z-50 bg-gray-900 rounded-lg shadow-light overflow-hidden"
    >
      <slot/>
    </div>
  </div>
</template>

<script>
import ClickOutside from 'vue-click-outside'

export default {
  data () {
    return {
      open: false
    }
  },
  methods: {
    close() {
      this.open = false
    }
  },
  directives: {
    ClickOutside
  }
}
</script>
