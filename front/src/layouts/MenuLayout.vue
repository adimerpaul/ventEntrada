<template>
  <q-layout view="lHh Lpr lFf">
    <q-header
      class=""
    >
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="leftDrawerOpen = !leftDrawerOpen"
        />
        <q-toolbar-title>
          <div class="text-bold" style="line-height: 1">
            <div>{{ user.name}}</div>
<!--            <div class="text-subtitle2">{{agencia.nombre}}<q-chip dense color="yellow" size="10px" :label="user.type"/></div>-->
          </div>
        </q-toolbar-title>
        <div>
          <q-btn
            dense
            round
            icon="logout"
            color="red"
            aria-label="Logout"
            @click="logout()"
          />
        </div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      :width="200"
    >
      <!--      :breakpoint="400"-->
      <q-layout>
        <q-header class="bg-white">
          <q-list class="text-black">
            <q-item-label header class="text-bold q-pa-none q-ma-none text-center" >
              <q-item clickable v-ripple class="q-pa-none q-ma-none">
                <q-item-section avatar class="q-pa-none q-ma-none">
                  <q-avatar class="q-pa-none q-ma-none q-pl-md">
                    <q-img :src="user.avatar.includes('http')?user.avatar:`${$url}../images/${user.avatar}`" width="50px" />
                  </q-avatar>
                </q-item-section>
                <q-item-section>
                  <q-item-label>{{user.name}}</q-item-label>
                  <q-item-label caption>{{user.email}}</q-item-label>
                </q-item-section>
              </q-item>
            </q-item-label>
<!--            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="empresa" v-if="$store.user.id=='1'">-->
<!--              <q-item-section avatar><q-icon name="o_factory" /></q-item-section>-->
<!--              <q-item-section>-->
<!--                <q-item-label>-->
<!--                  Empresas-->
<!--                  <q-tooltip anchor="top middle" self="bottom middle">-->
<!--                    Configuración de empresas-->
<!--                  </q-tooltip>-->
<!--                </q-item-label>-->
<!--              </q-item-section>-->
<!--            </q-item>-->
            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/admin">
              <q-item-section avatar><q-icon name="o_store" /></q-item-section>
              <q-item-section>
                <q-item-label>
                  Movimientos
                  <q-tooltip anchor="top middle" self="bottom middle">
                    Movimientos de caja
                  </q-tooltip>
                </q-item-label>
              </q-item-section>
            </q-item>
            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/sale">
              <q-item-section avatar><q-icon name="o_shopping_cart" /></q-item-section>
              <q-item-section>
                <q-item-label>
                  Ventas aceptadas
                  <q-tooltip anchor="top middle" self="bottom middle">
                    Ventas aceptadas
                  </q-tooltip>
                </q-item-label>
              </q-item-section>
              <q-item-section side>
              </q-item-section>
            </q-item>
            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/productos" >
              <q-item-section avatar><q-icon name="o_unarchive" /></q-item-section>
              <q-item-section>
                <q-item-label>Ventas rechazadas</q-item-label>
                <q-tooltip anchor="top middle" self="bottom middle">
                  Ventas rechazadas
                </q-tooltip>
              </q-item-section>
            </q-item>
            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/movie">
              <q-item-section avatar><q-icon name="o_movie" /></q-item-section>
              <q-item-section>
                <q-item-label>Peliculas</q-item-label>
                <q-tooltip anchor="top middle" self="bottom middle">
                  Peliculas
                </q-tooltip>
              </q-item-section>
            </q-item>
            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/cartelera">
              <q-item-section avatar><q-icon name="o_local_movies" /></q-item-section>
              <q-item-section>
                <q-item-label>Cartelera</q-item-label>
                <q-tooltip anchor="top middle" self="bottom middle">
                  Cartelera
                </q-tooltip>
              </q-item-section>
            </q-item>
            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/salas">
              <q-item-section avatar><q-icon name="o_inventory" /></q-item-section>
              <q-item-section>
                <q-item-label>Salas</q-item-label>
                <q-tooltip anchor="top middle" self="bottom middle">
                  Salas
                </q-tooltip>
              </q-item-section>
            </q-item>
            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/carousels">
              <q-item-section avatar><q-icon name="o_slideshow" /></q-item-section>
              <q-item-section>
                <q-item-label>Carousels</q-item-label>
                <q-tooltip anchor="top middle" self="bottom middle">
                  Carousels
                </q-tooltip>
              </q-item-section>
            </q-item>
<!--            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/clientes" v-if="$store.user.id=='1'">-->
<!--              <q-item-section avatar><q-icon name="o_face" /></q-item-section>-->
<!--              <q-item-section>-->
<!--                <q-item-label>Clientes</q-item-label>-->
<!--                <q-tooltip anchor="top middle" self="bottom middle">-->
<!--                  Administrar clientes-->
<!--                </q-tooltip>-->
<!--              </q-item-section>-->
<!--            </q-item>-->
<!--            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/proveedores" v-if="$store.user.id=='1'">-->
<!--              <q-item-section avatar><q-icon name="o_assignment_ind" /></q-item-section>-->
<!--              <q-item-section>-->
<!--                <q-item-label>Proveedores</q-item-label>-->
<!--                <q-tooltip anchor="top middle" self="bottom middle">-->
<!--                  Administrar proveedores-->
<!--                </q-tooltip>-->
<!--              </q-item-section>-->
<!--            </q-item>-->
<!--            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/reportes" v-if="$store.user.id=='1'">-->
<!--              <q-item-section avatar><q-icon name="o_print" /></q-item-section>-->
<!--              <q-item-section>-->
<!--                <q-item-label>Reportes</q-item-label>-->
<!--                <q-tooltip anchor="top middle" self="bottom middle">-->
<!--                  Consultar reportes-->
<!--                </q-tooltip>-->
<!--              </q-item-section>-->
<!--            </q-item>-->
<!--            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/users" v-if="$store.user.id=='1'">-->
<!--              <q-item-section avatar><q-icon name="o_manage_accounts" /></q-item-section>-->
<!--              <q-item-section>-->
<!--                <q-item-label>Usuarios</q-item-label>-->
<!--                <q-tooltip anchor="top middle" self="bottom middle">-->
<!--                  Administrar usuarios-->
<!--                </q-tooltip>-->
<!--              </q-item-section>-->
<!--            </q-item>-->
<!--            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/productosPorVencer">-->
<!--              <q-item-section avatar><q-icon name="o_store" /></q-item-section>-->
<!--              <q-item-section>-->
<!--                <q-item-label>Por cencer</q-item-label>-->
<!--                <q-tooltip anchor="top middle" self="bottom middle">-->
<!--                  Productos por cencer-->
<!--                </q-tooltip>-->
<!--              </q-item-section>-->
<!--            </q-item>-->
            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/estadisticas">
              <q-item-section avatar><q-icon name="o_stacked_bar_chart" /></q-item-section>
              <q-item-section>
                <q-item-label>Estadisticas</q-item-label>
                <q-tooltip anchor="top middle" self="bottom middle">
                  Estadisticas
                </q-tooltip>
              </q-item-section>
            </q-item>
<!--            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" :href="'/'+$store.agencia.web" target="_blank">-->
<!--              <q-item-section avatar><q-icon name="o_shopping_cart" /></q-item-section>-->
<!--              <q-item-section>-->
<!--                <q-item-label>Delyvery</q-item-label>-->
<!--                <q-tooltip anchor="top middle" self="bottom middle">-->
<!--                  Delyvery online-->
<!--                </q-tooltip>-->
<!--              </q-item-section>-->
<!--            </q-item>-->
<!--            <q-item clickable v-ripple exact active-class="bg-primary text-white text-bold" to="/menu">-->
<!--              <q-item-section avatar><q-icon name="o_menu_book" /></q-item-section>-->
<!--              <q-item-section>-->
<!--                <q-item-label>Menu</q-item-label>-->
<!--                <q-tooltip anchor="top middle" self="bottom middle">-->
<!--                  Creacion de menu-->
<!--                </q-tooltip>-->
<!--              </q-item-section>-->
<!--            </q-item>-->
          </q-list>
        </q-header>
        <q-footer class="bg-white">
          <q-list bordered padding dense class="rounded-borders text-red">
            <q-item clickable v-ripple @click="logout()">
              <q-item-section avatar>
                <q-icon name="o_logout" />
              </q-item-section>
              <q-item-section> Cerrar sesión</q-item-section>
            </q-item>
          </q-list>
        </q-footer>
      </q-layout>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
// import EssentialLink from 'components/EssentialLink.vue'

export default {
  name: 'MenuLayout',
  components: {
    // EssentialLink: EssentialLink
  },
  data () {
    return {
      user: JSON.parse(localStorage.getItem('user')),
      // agencia: JSON.parse(localStorage.getItem('agencia')),
      leftDrawerOpen: false,
      essentialLinks: [
        {
          title: 'Home',
          icon: 'home',
          to: '/'
        },
        {
          title: 'About',
          icon: 'info',
          to: '/about'
        },
        {
          title: 'Contact',
          icon: 'phone',
          to: '/contact'
        }
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
          localStorage.removeItem('tokenMiGanancia')
          localStorage.removeItem('user')
          this.$store.isLoggedIn = false
          this.$q.loading.hide()
          this.$router.push('/login')
        })
      })
    }
  }
}
</script>
