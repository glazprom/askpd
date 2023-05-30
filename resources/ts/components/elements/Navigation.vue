<template>
  <div class="navigation">
    <div class="title">
      <h1>АСКДП</h1>
      <h2>Автоматизированная система контроля показаний датчиков ЖКХ</h2>
    </div>
    <div class="user">
      <div class="info">Глазунов Андрей</div>
      <div class="info">admin@askpd.local</div>
      <a href="#" class="exit">Выйти</a>
    </div>
    <div class="list">
      <a
        v-for="item in navigationItems"
        @click="showRoute($event, item.route)"
        :class="`${item.isActive ? 'active' : ''}`"
        href="#"
      >
        <font-awesome-icon :icon="item.icon"/>
        <span>{{ item.name }}</span>
      </a>
    </div>
  </div>
</template>
<script lang="ts">
import {defineComponent} from 'vue'
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {library} from '@fortawesome/fontawesome-svg-core'
import {faHouseLaptop, faTableColumns} from '@fortawesome/free-solid-svg-icons'
import {faBell, faFileLines} from '@fortawesome/free-regular-svg-icons'

library.add(faTableColumns, faHouseLaptop, faFileLines, faBell)
export default defineComponent({
  name: "Navigation",
  components: {FontAwesomeIcon},

  methods: {
    showRoute(e, route: string): void {
      e.preventDefault()
      this.$router.push(route);
      this.setActiveNavigationItem(route);
    },

    setActiveNavigationItem(route: string | null = null): void {
      if (!route) {
        route = window.location.pathname;
      }

      for (let index in this.navigationItems) {
        if (this.navigationItems[index].route === route) {
          this.navigationItems[index].isActive = true;
          continue;
        }
        this.navigationItems[index].isActive = false;
      }
    },
  },

  mounted() {
    this.setActiveNavigationItem();
  },

  data() {
    return {
      navigationItems: [
        {
          name: "Дашборд",
          route: "/",
          icon: faTableColumns,
          isActive: true,
        },
        {
          name: "Устройства",
          route: "/devices",
          icon: faHouseLaptop,
          isActive: false,
        },
        {
          name: "Уведомления",
          route: "/notifications",
          icon: faBell,
          isActive: false,
        },
        {
          name: "Документация / API",
          route: "/docs",
          icon: faFileLines,
          isActive: false,
        },
      ],
    };
  },
})
</script>
