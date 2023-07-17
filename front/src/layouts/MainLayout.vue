<template>
  <q-layout view="lHh Lpr fff">
    <q-header class="bg-white">
<!--      <div class="bg-grey-4 q-px-md row items-center">-->
<!--        <q-btn type="a" target="_blank" href="https://www.facebook.com/MultiCinesPLAZA" flat dense round icon="fa-brands fa-facebook" size="12px" color="grey" class="q-mr-sm"/>-->
<!--        <q-btn type="a" target="_blank" href="https://www.facebook.com/MultiCinesPLAZA" flat dense round icon="fa-brands fa-instagram" size="12px" color="grey" class="q-mr-sm"/>-->
<!--        <q-space/>-->
<!--        <q-tabs dense v-model="tab" class="text-grey-9">-->
<!--          <q-route-tab v-if="!$q.screen.lt.sm" icon="o_home" to="/"/>-->
<!--          <q-route-tab v-if="!$q.screen.lt.sm" label="Conócenos" to="/conocenos" no-caps class="text-caption" />-->
<!--          <q-route-tab v-if="!$q.screen.lt.sm" label="Formatos" to="/formatos" no-caps class="text-caption" />-->
<!--          <q-route-tab v-if="!$q.screen.lt.sm" label="Publicidad & Marketing" to="/publicidad" no-caps class="text-caption" />-->
<!--          <q-route-tab v-if="!$q.screen.lt.sm">-->
<!--            <q-btn dense label="Registrate" size="12px" color="grey-10" no-caps/>-->
<!--          </q-route-tab>-->
<!--          <q-route-tab>-->
<!--            <q-btn dense label="Iniciar Sesión" size="12px" color="primary" no-caps/>-->
<!--          </q-route-tab>-->
<!--        </q-tabs>-->
<!--      </div>-->
      <q-toolbar v-if="!$q.screen.lt.sm">
<!--        <div class="text-black">-->
          <q-img src="/logoLargo.png" width="100px" class="cursor-pointer"
                 @click="$router.push('/')"
          />
        <q-space/>
<!--        </div>-->
<!--        <div class="text-black" style="outline: 1px solid blue">-->
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
        <q-space/>
<!--        <pre class="text-black">{{$store.user}}</pre>-->
<!--        </div>-->
<!--        <div class="text-black flex flex-center" style="outline: 1px solid red">-->
        <q-btn dense label="Iniciar Sesión" size="12px" color="primary" no-caps
               @click="useAuthProvider('google')" v-if="!$store.isLoggedIn"/>
        <q-avatar v-else class="cursor-pointer">
          <q-img :src="`${$url}../images/${$store.user.avatar}`" alt="Avatar"/>
          <q-menu>
            <q-list dense>
              <q-item>
                <q-item-section avatar>
                  <q-avatar>
                    <q-img :src="`${$url}../images/${$store.user.avatar}`" alt="Avatar" width="40px"/>
                  </q-avatar>
                </q-item-section>
                <q-item-section>
                  <q-item-label>{{$store.user.name}}</q-item-label>
                  <q-item-label caption>{{$store.user.email}}</q-item-label>
                </q-item-section>
              </q-item>
              <q-item clickable @click="logout" v-ripple>
                <q-item-section avatar>
                  <q-avatar>
                    <q-icon color="grey" name="logout" />
                  </q-avatar>
                </q-item-section>
                <q-item-section>
<!--                  <q-item-section avatar>-->
<!--                    <q-icon color="grey" name="logout" />-->
<!--                  </q-item-section>-->
                  <q-item-section>Salir</q-item-section>
                </q-item-section>
              </q-item>
            </q-list>
          </q-menu>
        </q-avatar>

<!--          <q-btn dense label="Cerrar Sesión" size="12px" color="primary" no-caps-->
<!--                  @click="logout" v-else/>-->
<!--        </div>-->
<!--        <span class="text-red-6 text-bold text-h5 cursor-pointer" style="float: left;margin: 10px 0px 0px 10px;position: absolute;cursor: pointer;outline: 1px solid red;z-index: 10;">-->
<!--          <q-img src="/logoLargo.png" width="100px" class="cursor-pointer"-->
<!--                 style="float: left;margin: 10px 0px 0px 10px;position: absolute;z-index: 10;"-->
<!--                 @click="$router.push('/')"-->
<!--          />-->
<!--        </span>-->
<!--        <q-tabs v-model="tab" class="text-primary">-->
<!--          <q-route-tab name="peliculas" to="/" >-->
<!--            <div class="text-bold">Peliculas</div>-->
<!--          </q-route-tab>-->
<!--          <q-route-tab name="cartelera" to="/cartelera" >-->
<!--            <div class="text-bold">Cartelera</div>-->
<!--          </q-route-tab>-->
<!--          <q-route-tab name="promociones" to="/promociones" >-->
<!--            <div class="text-bold">Promociones</div>-->
<!--          </q-route-tab>-->
<!--          <q-route-tab name="confiteria" to="/confiteria" >-->
<!--            <div class="text-bold">Confiteria</div>-->
<!--          </q-route-tab>-->
<!--        </q-tabs>-->
      </q-toolbar>
      <q-toolbar v-else>
        <q-btn flat round dense color="red" icon="menu" aria-label="Menu" />
        <q-space/>
        <q-img src="/logoLargo.png" width="100px" class="cursor-pointer"
               @click="$router.push('/')"/>
        <q-space/>
        <q-btn dense label="Iniciar Sesión" size="12px" color="primary" no-caps
                @click="useAuthProvider('google')" v-if="!$store.isLoggedIn"/>
        <q-avatar v-else class="cursor-pointer">
          <q-img :src="`${$url}../images/${$store.user.avatar}`" alt="Avatar"/>
          <q-menu>
            <q-list>
              <q-item clickable v-if="$store.isLoggedIn" @click="logout">
                <q-item-section>
                  <q-item-label>Logout</q-item-label>
                </q-item-section>
              </q-item>
            </q-list>
          </q-menu>
        </q-avatar>
<!--        <q-toolbar >-->
<!--          <q-btn flat round dense color="red" icon="menu" aria-label="Menu" />-->
<!--              <div class="text-red-6 text-bold text-h5 text-center full-width">-->
<!--                <q-img src="/logoLargo.png" width="100px" class="cursor-pointer"-->
<!--                       style="z-index: 10;"-->
<!--                       @click="$router.push('/')"-->
<!--                />-->
<!--              </div>-->
<!--        </q-toolbar>-->
      </q-toolbar>
    </q-header>
    <q-page-container>
      <router-view />
    </q-page-container>
    <q-footer>
      <div class="bg-grey-3">
        <div class="row q-pb-lg">
          <div class="col-6 flex flex-center">
            <q-btn type="a" target="_blank" href="https://www.facebook.com/MultiCinesPLAZA" flat dense
                   size="22px" color="primary" class="q-ma-md"
            >
              <div class="row items-center no-wrap">
                <q-icon left name="fa-brands fa-facebook" />
                <div class="text-left text-grey text-subtitle2 text-bold " style="line-height: 1.2;">
                  Facebook<br>/MultiCinesPLAZA
                </div>
              </div>
            </q-btn>
<!--            <q-btn type="a" target="_blank" href="https://www.facebook.com/MultiCinesPLAZA" flat dense-->
<!--                   size="22px" color="red-8" class="q-ma-md"-->
<!--            >-->
<!--              <div class="row items-center no-wrap">-->
<!--                <q-icon left name="fa-brands fa-instagram" />-->
<!--                <div class="text-left text-grey text-subtitle2 text-bold " style="line-height: 1.2;">-->
<!--                  Instagram<br>/MultiCinesPLAZA-->
<!--                </div>-->
<!--              </div>-->
<!--            </q-btn>-->
          </div>
          <div class="col-6"></div>
          <div class="col-12">
            <div class="row">
              <div class="col-12 col-md-1"></div>
              <div class="col-12 col-md-2 flex flex-center">
                <div class="text-red-6 text-bold text-h5">
                  <q-img src="/logoLargo.png" width="100px" class="cursor-pointer"
                         @click="$router.push('/')"
                  />
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
import { Providers } from 'universal-social-auth'
export default {
  data () {
    return {
      tab: 'peliculas',
      drawerState: true,
      drawerLinks: [
        { icon: 'home', label: 'Inicio', to: '/' },
        { icon: 'movie', label: 'Cartelera', to: '/cartelera' },
        { icon: 'local_offer', label: 'Promociones', to: '/promociones' },
        { icon: 'local_dining', label: 'Confiteria', to: '/confiteria' },
        { icon: 'info', label: 'Nosotros', to: '/nosotros' },
        { icon: 'contact_phone', label: 'Contacto', to: '/contacto' }
      ]
    }
  },
  methods: {
    logout () {
      this.$q.dialog({
        message: '¿Quieres cerrar sesión?',
        title: 'Salir',
        ok: {
          push: true
        },
        cancel: {
          push: true,
          color: 'negative'
        }
      }).onOk(() => {
        this.$q.loading.show()
        this.$axios.post('logout').then(() => {
          this.$axios.defaults.headers.common.Authorization = ''
          this.$store.user = {}
          localStorage.removeItem('tokenPlaza')
          this.$store.isLoggedIn = false
          this.$q.loading.hide()
        })
      })
    },
    useAuthProvider (provider) {
      const ProData = Providers[provider]
      this.$q.loading.show()
      this.$Oauth.authenticate(provider, ProData).then((response) => {
        if (response.code) {
          this.$axios.post(`sociallogin/${provider}`, response).then((res) => {
            // console.log(res.data)
            this.$q.loading.hide()
            this.$alert.success(`Bienvenido ${res.data.user.name}`)
            this.$emit('closeDialog', res.data.token)
            // this.$router.push('/')
            this.$store.user = res.data.user
            this.$store.isLoggedIn = true
            this.$axios.defaults.headers.common.Authorization = `Bearer ${res.data.token}`
            localStorage.setItem('tokenPlaza', res.data.token)
            // this.loginDialog = false
          }).catch((err) => {
            this.$alert.error(err.response.data.message)
          }).finally(() => {
            this.$q.loading.hide()
          })
        } else {
          this.$q.loading.hide()
        }
      }).catch((err) => {
        this.$alert.error(err.response.data.message)
        // console.log(err)
      }).finally(() => {
        // this.$q.loading.hide()
      })
    }
  }
}
</script>
