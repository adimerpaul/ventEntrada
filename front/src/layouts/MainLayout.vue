<template>
  <q-layout view="lHh Lpr lFf">
    <q-header class="bg-white">
      <div class="bg-grey-4 q-px-md row items-center">
        <q-btn type="a" target="_blank" href="https://www.facebook.com/MultiCinesPLAZA" flat dense round icon="fa-brands fa-facebook" size="12px" color="grey" class="q-mr-sm"/>
        <q-btn type="a" target="_blank" href="https://www.facebook.com/MultiCinesPLAZA" flat dense round icon="fa-brands fa-instagram" size="12px" color="grey" class="q-mr-sm"/>
        <q-space/>
        <q-tabs dense v-model="tab" class="text-grey-9">
          <q-route-tab v-if="!$q.screen.lt.sm" icon="o_home" to="/"/>
          <q-route-tab v-if="!$q.screen.lt.sm" label="Conócenos" to="/conocenos" no-caps class="text-caption" />
          <q-route-tab v-if="!$q.screen.lt.sm" label="Formatos" to="/formatos" no-caps class="text-caption" />
          <q-route-tab v-if="!$q.screen.lt.sm" label="Publicidad & Marketing" to="/publicidad" no-caps class="text-caption" />
          <q-route-tab v-if="!$q.screen.lt.sm">
            <q-btn dense label="Registrate" size="12px" color="grey-10" no-caps/>
          </q-route-tab>
          <q-route-tab>
            <q-btn dense label="Iniciar Sesión" size="12px" color="red-10" no-caps/>
          </q-route-tab>
        </q-tabs>
      </div>
      <div v-if="!$q.screen.lt.sm">
        <div class="text-red-6 text-bold text-h5" style="float: left;margin: 10px 0px 0px 10px;position: absolute;">
          Multicines Plaza
        </div>
        <q-tabs v-model="tab" class="text-red-10">
          <q-route-tab name="peliculas" to="/" >
            <div class="text-bold">Peliculas</div>
          </q-route-tab>
          <q-route-tab name="cartelera" to="/cartelera" >
            <div class="text-bold">Cartelera</div>
          </q-route-tab>
          <q-route-tab name="promociones" to="/promociones" >
            <div class="text-bold">Promociones</div>
          </q-route-tab>
          <q-route-tab name="confiteria" to="/confiteria" >
            <div class="text-bold">Confiteria</div>
          </q-route-tab>
        </q-tabs>
      </div>
      <div v-else>
        <q-toolbar >
          <q-btn flat round dense color="red" icon="menu" aria-label="Menu" @click="toggleLeftDrawer" />
              <div class="text-red-6 text-bold text-h5 text-center full-width">Multicines Plaza</div>
        </q-toolbar>
      </div>
    </q-header>
    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent, ref } from 'vue'
// import EssentialLink from 'components/EssentialLink.vue'

export default defineComponent({
  name: 'MainLayout',

  // components: {
  //   EssentialLink
  // },

  setup () {
    const leftDrawerOpen = ref(false)

    return {
      tab: 'images',
      // essentialLinks: linksList,
      leftDrawerOpen,
      toggleLeftDrawer () {
        leftDrawerOpen.value = !leftDrawerOpen.value
      }
    }
  }
})
</script>
