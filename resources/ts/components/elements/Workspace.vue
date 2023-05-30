<template>
  <div class="workspace">
    <div class="whitespace"></div>
    <div class="content">
      <slot></slot>
    </div>
    <div class="whitespace"></div>
  </div>
</template>
<script lang="ts">
import {defineComponent} from 'vue'

export default defineComponent({
  name: "Workspace"
})
</script>
