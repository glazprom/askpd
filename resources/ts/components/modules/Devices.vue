<template>
  <div class="workspace-area">
    <h2>
      <font-awesome-icon :icon="faHouseLaptop()"></font-awesome-icon>
      Устройства
    </h2>
    <div class="devices">
      <div class="tools"></div>
      <div class="list">
        <a href="#" class="add-new">
          <span>
            Добавить устройство
          </span>
        </a>
        <div class="device">

        </div>
      </div>
    </div>
  </div>
</template>
<script lang="ts">
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {library} from '@fortawesome/fontawesome-svg-core'
import {faHouseLaptop} from '@fortawesome/free-solid-svg-icons'

library.add(faHouseLaptop)
import {defineComponent} from 'vue'

export default defineComponent({
  name: "Devices",
  methods: {
    faHouseLaptop() {
      return faHouseLaptop
    }
  },
  components: {FontAwesomeIcon}
})
</script>
