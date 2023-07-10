<template>
  <q-layout view="lHh Lpr fff">
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
            <q-btn dense label="Iniciar Sesión" size="12px" color="primary" no-caps/>
          </q-route-tab>
        </q-tabs>
      </div>
      <div v-if="!$q.screen.lt.sm">
<!--        <span class="text-red-6 text-bold text-h5 cursor-pointer" style="float: left;margin: 10px 0px 0px 10px;position: absolute;cursor: pointer;outline: 1px solid red;z-index: 10;">-->
          <q-img src="/logoLargo.png" width="100px" class="cursor-pointer"
                 style="float: left;margin: 10px 0px 0px 10px;position: absolute;z-index: 10;"
                 @click="$router.push('/')"
          />
<!--        </span>-->
        <q-tabs v-model="tab" class="text-primary">
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
    <q-footer>
      <div class="bg-grey-3">
        <div class="row q-pb-lg">
          <div class="col-6 flex flex-center">
            <q-btn type="a" target="_blank" href="https://www.facebook.com/MultiCinesPLAZA" flat dense
                   size="22px" color="red-8" class="q-ma-md"
            >
              <div class="row items-center no-wrap">
                <q-icon left name="fa-brands fa-facebook" />
                <div class="text-left text-grey text-subtitle2 text-bold " style="line-height: 1.2;">
                  Facebook<br>/MultiCinesPLAZA
                </div>
              </div>
            </q-btn>
            <q-btn type="a" target="_blank" href="https://www.facebook.com/MultiCinesPLAZA" flat dense
                   size="22px" color="red-8" class="q-ma-md"
            >
              <div class="row items-center no-wrap">
                <q-icon left name="fa-brands fa-instagram" />
                <div class="text-left text-grey text-subtitle2 text-bold " style="line-height: 1.2;">
                  Instagram<br>/MultiCinesPLAZA
                </div>
              </div>
            </q-btn>
          </div>
          <div class="col-6"></div>
          <div class="col-12">
            <div class="row">
              <div class="col-12 col-md-1"></div>
              <div class="col-12 col-md-2 flex flex-center">
                <div class="text-red-6 text-bold text-h5">
                  Multicines Plaza
                </div>
              </div>
              <div class="col-6 col-md-2 q-pa-md">
                <div class=" text-grey text-bold">PROGRAMACIÓN</div>
                <q-separator />
                <div class="text-grey">Cartelera</div>
                <div class="text-grey">Próximos Estrenos</div>
                <div class="text-grey">Venta anticipada</div>
              </div>
              <div class="col-6 col-md-2 q-pa-md">
                <div class=" text-grey text-bold">SOBRE NOSOTROS</div>
                <q-separator />
                <div class="text-grey">Nosotros</div>
                <div class="text-grey">Salas y formatos</div>
                <div class="text-grey">Terminos y condiciones</div>
              </div>
              <div class="col-6 col-md-2 q-pa-md">
                <div class=" text-grey text-bold">PUBLICIDAD & MARKETING</div>
                <q-separator />
                <div class="text-grey">Eventos especiales</div>
                <div class="text-grey">Corporativo</div>
                <div class="text-grey">Publicidad</div>
              </div>
              <div class="col-6 col-md-2 q-pa-md">
                <div class=" text-grey text-bold">CONTACTOS</div>
                <q-separator />
                <div class="text-grey">Escribenos</div>
                <div class="text-grey">Trabaja con nosotros</div>
                <div class="text-grey">Celular: 099 999 9999</div>
              </div>
              <div class="col-12 col-md-1"></div>
            </div>
          </div>
        </div>
      </div>
    </q-footer>
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
