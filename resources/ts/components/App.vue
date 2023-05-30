<template>
  <workspace>
    <navigation></navigation>
    <router-view></router-view>
  </workspace>
</template>

<script lang="ts">
import {defineComponent} from 'vue'
import Workspace from "./elements/Workspace.vue";
import Navigation from "./elements/Navigation.vue";

export default defineComponent({
  name: "App",
  components: {Navigation, Workspace}
});
</script>
